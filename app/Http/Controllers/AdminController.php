<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use SawaStacks\Utils\Kropify;
use App\Models\GeneralSetting;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $data = [
            'pageTitle' => 'Dashboard',
        ];
        return view('back.page.dashboard', $data);
    }
    public function logoutHandler(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('admin.login')->with('fail', 'You are now logged out');
    }
    public function profileView(Request $request)
    {
        $user = User::find($request->user()->id);
        $data = [
            'pageTitle' => 'Profile',
            'user' => $user,
        ];
        return view('back.page.profile', $data);
    }
    public function updateProfilePicture(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $path = 'images/users/';
        $file = $request->input('image');
        $old_picture = $user->getAttributes()['picture'];
        $filename = 'IMG_' . uniqid() . '.png';

        $file = str_replace('data:image/png;base64,', '', $file);
        $file = str_replace(' ', '+', $file);
        $image = base64_decode($file);

        File::put(public_path($path . $filename), $image);

        if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
            File::delete(public_path($path . $old_picture));
        }

        $user->update(['picture' => $filename]);

        return response()->json(['status' => 1, 'message' => 'Your profile picture has been updated successfully.']);
    }
    public function generalSettings()
    {
        $data = [
            'pageTitle' => 'General Settings',
        ];
        return view('back.page.general_settings', $data);



    }

    public function updateLogo(Request $request)
    {
        $settings = GeneralSetting::take(1)->first();
        if (!is_null($settings)) {
            $path = 'images/site/';
            $old_logo = $settings->site_logo;
            $file = $request->file('site_logo');
            $filename = 'logo_' . uniqid() . '.png';

            if ($request->hasFile('site_logo')) {
                $upload = $file->move(public_path($path), $filename);
                if ($upload) {
                    if ($old_logo != null && File::exists(public_path($path . $old_logo))) {
                        File::delete($path . $old_logo);
                    }
                    $settings->update(['site_logo' => $filename]);
                    return response()->json([
                        'status' => 1,
                        'image_path' => $path . $filename,
                        'message' => 'Site logo has been updated successfully.'
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Something went wrong.'
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Make sure you updated general settings form first.',
            ]);
        }
        ;
    }

    public function updateFavicon(Request $request)
    {
        $settings = GeneralSetting::take(1)->first();
        if (!is_null($settings)) {
            $path = 'images/site/';
            $old_favicon = $settings->site_favicon;
            $file = $request->file('site_favicon');
            $filename = 'favicon_' . uniqid() . '.png';

            if ($request->hasFile('site_favicon')) {
                $upload = $file->move(public_path($path), $filename);
                if ($upload) {
                    if ($old_favicon != null && File::exists(public_path($path . $old_favicon))) {
                        File::delete($path . $old_favicon);
                    }
                    $settings->update(['site_favicon' => $filename]);
                    return response()->json([
                        'status' => 1,
                        'image_path' => $path . $filename,
                        'message' => 'Site favicon has been updated successfully.'
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Something went wrong.'
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Make sure you updated general settings form first.',
            ]);
        }
        ;
    }

    public function categoriesPage(Request $request)
    {
        $data = [
            'pageTitle' => 'Categories',
        ];
        return view('back.page.categories', $data);

    }






}
