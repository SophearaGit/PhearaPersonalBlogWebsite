<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .confirmation-container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }

        .confirmation-container h1 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .confirmation-container p {
            color: #555;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .confirmation-container a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .confirmation-container a:hover {
            background-color: #45a049;
        }

        .user-info {
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
        }

        .user-info span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="confirmation-container">
        <h1>Password Changed Successfully</h1>
        <div class="user-info">
            <p>Greeting: <span id="name">{{ $user->name }}</span></p>
            <p>Username/Email: <span id="username">{{ $user->email }} or {{ $user->username }}</span></p>
            <p>New Password: <span id="password">{{ $new_password }}</span></p>
        </div>
        <p>Your password has been updated. You can now use your new password to log in.</p>
        <a href="{{ route('admin.login') }}">Go to Login</a>
    </div>
</body>

</html>
