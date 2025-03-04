<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\UserStatus;
use App\Helpers\CMail;

class AuthController extends Controller
{
    public function loginForm(Request $request)
    {
        $data = [
            'pageTitle' => 'Login',
        ];
        return view('back.page.auth.login', $data);
    }

    public function forgotForm(Request $request)
    {
        $data = [
            'pageTitle' => 'Forgot Password',
        ];
        return view('back.page.auth.forgot', $data);
    }

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate(
                [
                    'login_id' => 'required|email|exists:users,email',
                    'password' => 'required|min:8',
                ],
                [
                    'login_id.required' => 'Enter your email or username',
                    'login_id.email' => 'Invalid email format',
                    'login_id.exists' => 'Email does not exist',
                ]
            );
        } else {
            $request->validate(
                [
                    'login_id' => 'required|exists:users,username',
                    'password' => 'required|min:8',
                ],
                [
                    'login_id.required' => 'Enter you username or email',
                    'login_id.exists' => 'Username does not exist',
                ]
            );
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );

        if (Auth::attempt($creds)) {
            /**
             * CHECK IF USER STATUS IS INACTIVE
             */
            if (Auth::user() && Auth::user()->status == UserStatus::INACTIVE) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('fail', 'Your account is inactive. Please contact support.');
            }
            /**
             * CHECK IF USER STATUS IS PENDING
             */
            if (Auth::user() && Auth::user()->status == UserStatus::PENDING) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('fail', 'Your account is pending. Please check your email for activation.');
            }
            /**
             * REDIRECT TO DASHBOARD
             */
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->withInput()->with('fail', 'Incorrect Password.');
        }
    }

    /**
     * RESET PASSWORD METHOD.
     */
    public function sendPasswordResetLink(Request $request)
    {
        // 1. Validate the form.
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Enter your email.',
                'email.email' => 'Invalid email format.',
                'email.exists' => 'Email does not exist.',
            ]
        );
        // 2. Get user information.
        $user = User::where('email', $request->email)->first();
        // 3. Generate a unique token.
        $token = base64_encode(Str::random(60));
        // 4. Check if there is an existing token.
        $oldToken = DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->first();
        if ($oldToken) {
            // 5. Update the existing token.
            DB::table('password_reset_tokens')
                ->where('email', $user->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            // 6. Insert a new token.
            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }

        // 7. Create clickable action link.
        $actionLink = route('admin.reset_password_form', ['token' => $token]);

        // 8. clickable link to user email address array data
        $data = array(
            'actionLink' => $actionLink,
            'user' => $user,
        );

        $mail_body = view('email-template.forgot-template', $data)->render();

        $mail_config = array(
            'recipient_address' => $user->email,
            'recipient_name' => $user->name,
            'subject' => 'Reset Password',
            'body' => $mail_body,
        );
        // 9. Send email.
        if (CMail::send($mail_config)) {
            return redirect()
                ->route('admin.forgot')
                ->with('success', 'Password reset link has been sent to your email address.');
        } else {
            return redirect()
                ->route('admin.forgot')
                ->with('fail', 'Failed to send password reset link.');
        }
        ;
    } // END METHOD

    public function resetForm(Request $request, $token = null)
    {
        // CHECK IF TOKEN EXISTS IN DB
        $isTokenExists = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->first();
        if (!$isTokenExists) {
            return redirect()->route('admin.forgot')->with('fail', 'Invalid or expired password reset link.');
        } else {
            // check expire token
            $diffMin = Carbon::createFromFormat('Y-m-d H:i:s', $isTokenExists->created_at)
                ->diffInMinutes(Carbon::now());

            if ($diffMin > 15) {
                return redirect()->route('admin.forgot')->with('fail', 'Invalid or expired password reset link.');
            }

            $data = [
                'pageTitle' => 'Reset Password',
                'token' => $token,
            ];
            return view('back.page.auth.reset', $data);
        }
    }

    public function resetPasswordHandler(Request $request)
    {
        $request->validate(
            [
                'new_password' => 'required|min:8|required_with:confirm_new_password|same:confirm_new_password',
                'confirm_new_password' => 'required|min:8',
            ],
            [
                'new_password.required' => 'Enter a new password.',
                'new_password.min' => 'Password must be at least 8 characters long.',
                'new_password.required_with' => 'Confirm new password is required.',
                'new_password.same' => 'Confirm new password does not match.',
            ]
        );

        $dbTokenExists = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        // GET USER DETAIL
        $user = User::where('email', $dbTokenExists->email)
            ->first();


        // UPDATE USER PASSWORD
        User::where('email', $user->email)->update([
            'password' => Hash::make($request->new_password),
        ]);

        // SEND NOTIFICATION EMAIL TO USER EMAIL ADDRESS
        $data = array(
            'user' => $user,
            'new_password' => $request->new_password,
        );

        $mail_body = view('email-template.password-change-template', $data)->render();

        $mail_config = array(
            'recipient_address' => $user->email,
            'recipient_name' => $user->name,
            'subject' => 'Password Reset Success',
            'body' => $mail_body,
        );

        if (CMail::send($mail_config)) {
            // DELETE TOKEN
            DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->delete();
            return redirect()->route('admin.login')->with('success', 'Password has been reset successfully. Please login.');
        } else {
            return redirect()->route('admin.reset_password_form', ['token' => $dbTokenExists->token])->with('fail', 'Failed to send password reset success email.');
        }
    }


}
