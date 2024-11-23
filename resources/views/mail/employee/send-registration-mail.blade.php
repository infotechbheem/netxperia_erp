<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #fff;
        }

        .content {
            padding: 20px;
            color: #555;
        }

        h2 {
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .details-table th {
            background-color: #f5f7fa;
            font-weight: bold;
            color: #007bff;
        }

        .details-table td {
            color: #555;
        }

        .instructions {
            margin-top: 20px;
        }

        .instructions ol {
            margin-left: 20px;
        }

        .instructions li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 600px) {
            .container {
                margin: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .content {
                padding: 15px;
            }

            .details-table th,
            .details-table td {
                padding: 10px;
            }
        }

    </style>
</head>
<body>

    <!-- Main Email Container -->
    <div class="container">

        <!-- Header with Logo and Welcome Message -->
        <div class="header">
            <img src="https://www.netxperia.com/images/newlogo.png" alt="NetXperia Logo">
            <h1>Welcome to NetXperia, {{ $details['emp_name'] }}!</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h2>Dear {{ $details['emp_name'] }},</h2>
            <p>We are excited to welcome you to the NetXperia family! We believe that your contributions will be invaluable as we continue to grow and innovate. Below are your login details and important information for getting started:</p>

            <!-- Employee Details Table -->
            <table class="details-table">
                <tr>
                    <th>Employee ID</th>
                    <td>{{ $details['emp_id'] }}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{ $details['emp_name'] }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $details['emp_department'] }}</td>
                </tr>
                <tr>
                    <th>Designation</th>
                    <td>{{ $details['emp_designation'] }}</td>
                </tr>
                <tr>
                    <th>Temporary Password</th>
                    <td>{{ $details['emp_password'] }}</td>
                </tr>
            </table>

            <!-- Instructions Section -->
            <div class="instructions">
                <p>Please follow the steps below to log in for the first time:</p>
                <ol>
                    <li>Visit the <a href="https://netxperia/" target="_blank">NetXperia Employee Portal</a>.</li>
                    <li>Log in using the provided username and temporary password.</li>
                    <li>You will be prompted to change your password for security purposes.</li>
                </ol>
            </div>

            <!-- Final Notes -->
            <p>If you experience any issues accessing your account, please contact our IT support team at <a href="mailto:support@netxperia.com">support@netxperia.com</a>.</p>
            <p>We are excited to see you flourish in your new role. Once again, welcome to NetXperia!</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p><strong>NetXperia HR Team</strong></p>
            <p>A-110/1, GF, Shiv Vihar, Karala, North West Delhi, Delhi 110081</p>
            <p><a href="mailto:hr@netxperia.com">hr@netxperia.com</a> | +91-9876543210</p>
            <p>&copy; 2024 NetXperia. All Rights Reserved.</p>
        </div>

    </div>

</body>
</html>
