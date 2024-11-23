<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NetXperia | Registration Successful</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: normal;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            font-size: 22px;
            margin-top: 0;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .credentials {
            margin: 20px 0;
            padding: 15px;
            background-color: #f1f1f1;
            border-left: 5px solid #007bff;
        }

        .credentials p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .services {
            margin-top: 20px;
        }

        .service-item {
            padding: 10px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            border-left: 5px solid #007bff;
        }

        .service-item h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #007bff;
        }

        .footer {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 0 !important;
            }

            .content h2 {
                font-size: 20px !important;
            }

            .content p {
                font-size: 14px !important;
            }

            .button {
                padding: 10px 20px !important;
                font-size: 14px !important;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- Email Header -->
        <div class="header">
            <img src="https://www.netxperia.com/images/logo.png" alt="NetXperia Logo">
            <h1>Welcome to NetXperia!</h1>
        </div>

        <!-- Email Body -->
        <div class="content">
            <h2>Registration Successful!</h2>
            <p>Dear {{ $details['name'] }},</p>
            <p>Thank you for registering with <strong>NetXperia</strong>. Your account has been successfully created,
                and we are thrilled to have you on board!</p>

            <!-- Credentials Section -->
            <div class="credentials">
                <p><strong>Your Login Credentials:</strong></p>
                <p><strong>Client ID:</strong> {{ $details['client_id'] }}</p>
                <p><strong>Email:</strong> {{ $details['email'] }}</p>
                <p><strong>Your Temp. Password:</strong> {{ $details['password'] }}</p>
            </div>

            <p>To get started, log in to your account using the credentials above.</p>
            <p>If you did not set a password or wish to reset it, you can use the link below to update your credentials:
            </p>

            <!-- Call to Action Button -->
            <p style="text-align: center;">
                <a href="https://www.netxperia.com/" class="button">Login your account</a>
            </p>

            <!-- Highlighted Services -->
            <div class="services">
                <h3>What You Can Do Next:</h3>

                <div class="service-item">
                    <h3>Explore Our Web Solutions</h3>
                    <p>We provide cutting-edge web development services tailored to your business needs. Let us help you
                        create a strong online presence.</p>
                </div>

                <div class="service-item">
                    <h3>Discover Custom IT Solutions</h3>
                    <p>We offer a variety of IT services, from custom software development to cloud-based solutions,
                        ensuring your business stays ahead of the curve.</p>
                </div>

                <div class="service-item">
                    <h3>Get in Touch with Our Experts</h3>
                    <p>Need personalized advice? Our team is available to provide consultation on how you can best
                        leverage technology for your business growth.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Need assistance? Contact our support team at <a href="mailto:support@netxperia.com" style="color: white;">support@netxperia.com</a></p>
            <p>Follow us on <a href="https://www.facebook.com/netxperia" style="color: white;">Facebook</a> | <a href="https://twitter.com/netxperia" style="color: white;">Twitter</a></p>
            <p>&copy; 2024 NetXperia. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
