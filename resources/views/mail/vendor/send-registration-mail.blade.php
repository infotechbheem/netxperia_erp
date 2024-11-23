<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            /* Sky blue background */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            /* White container */
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff6600;
            /* Orange heading */
            text-align: center;
        }

        p {
            color: #666666;
            line-height: 1.6;
        }

        .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border: 1px solid #ddd;
        }

        .credentials p {
            font-weight: bold;
            margin: 5px 0;
        }

        .login-button {
            display: block;
            background-color: #00aaff;
            /* Sky blue button */
            color: white;
            text-align: center;
            padding: 10px;
            margin: 20px 0;
            text-decoration: none;
            border-radius: 5px;
        }

        .login-button:hover {
            background-color: #0099e6;
            /* Darker sky blue on hover */
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888888;
        }

        .footer a {
            color: #ff6600;
            /* Orange footer links */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Vendor Registration Successful!</h1>
        <p>Dear {{ $details['vendor_name'] }},</p>
        <p>We are pleased to inform you that your vendor registration with our platform has been successfully completed. You can now log in and start managing your profile and services.</p>

        <div class="credentials">
            <p>Login Credentials:</p>
            <p><strong>Username:</strong> {{ $details['vendor_id'] }} </p>
            <p><strong>Password:</strong> {{ $details['vendor_password'] }} </p>
        </div>

        <p>For security purposes, please make sure to update your password after your first login.</p>

        <a href="[Login URL]" target="_blank" class="login-button">Login to Your Account</a>

        <p>If you have any questions or need assistance, feel free to contact our support team at [Support Email] or visit our <a href="[FAQ URL]">FAQ page</a>.</p>

        <p>Thank you for joining us, and we look forward to a successful partnership!</p>

        <div class="footer">
            <p>Best Regards,<br>The [Company Name] Team</p>
            <p><a href="[Company Website URL]">Visit Our Website</a> | <a href="[Contact URL]">Contact Us</a></p>
        </div>
    </div>

</body>
</html>
