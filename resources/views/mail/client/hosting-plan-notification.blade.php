<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Expiry Notification</title>
    <style>
        /* General Reset */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #4CAF50;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .body {
            padding: 20px 30px;
        }

        .body h2 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #4CAF50;
        }

        .body p {
            font-size: 16px;
            line-height: 1.6;
        }

        .renew-now {
            display: inline-block;
            margin: 20px 0;
            background: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 25px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .renew-now:hover {
            background: #45a049;
        }

        .footer {
            background: #f4f4f4;
            text-align: center;
            padding: 10px 20px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #e0e0e0;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        @media screen and (max-width: 600px) {
            .body {
                padding: 15px;
            }

            .renew-now {
                font-size: 16px;
                padding: 8px 20px;
            }
        }

    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <h1>Renew Your Hosting Plan</h1>
        </div>

        <!-- Body Section -->
        <div class="body">
            <h2>Hi {{ $client->name }},</h2>
            <p>
                We noticed that your hosting plan, <strong>{{ $plan->plan_name }}</strong>, expired on
                <strong>{{ \Carbon\Carbon::parse($plan->plan_expiry_date)->format('F d, Y') }}</strong>.
            </p>
            <p>
                To keep your website running smoothly without any interruptions, please renew your hosting plan today.
                It only takes a few minutes to secure your services!
            </p>
            <a href="" class="renew-now">Contact Support For Renew Hosting Plan</a>
            <p>
                If you have any questions or need help, feel free to contact our support team. We're here for you!
            </p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Thank you for choosing NetXperia for your hosting needs.</p>
            <p>
                <a href="{{ url('/contact') }}">Contact Us</a> |
                <a href="{{ url('/faq') }}">FAQs</a>
            </p>
        </div>
    </div>
</body>
</html>
