<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .reset-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        /* Media Query for Smaller Screens */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            .reset-button {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Forgot Your Password?</h1>
        <p>Hi {{ $user->name }},</p>
        <p>You requested to reset your password. Click the button below to set a new password:</p>
        <a href="{{ $actionLink }}" target="_blank" class="reset-button">Reset Password</a>
        <p>
            <strong>
                This link is valid for 15 minutes only.
            </strong>
        </p>
        <p>If you did not request a password reset, please ignore this email.</p>
        <p>Thank you!</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} laRaaBlog. All rights reserved.</p>
        </div>
    </div>

</body>

</html>
