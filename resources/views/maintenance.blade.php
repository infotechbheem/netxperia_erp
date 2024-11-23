<!-- resources/views/maintenance.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            background: url('https://example.com/your-background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: 'Arial', sans-serif;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 600px;
            padding: 40px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .spinner {
            margin: 20px auto;
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.5);
            border-top: 5px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .current-time {
            font-size: 1.5rem;
            margin: 20px 0;
        }
        .moon {
            position: absolute;
            width: 100px;
            height: 100px;
            background: url('https://example.com/moon.png') no-repeat center center;
            background-size: contain;
            top: 10%;
            left: 0;
            animation: moveMoon 10s linear infinite;
        }
        @keyframes moveMoon {
            0% { transform: translateX(0); }
            100% { transform: translateX(100vw); }
        }
        .contact {
            margin-top: 20px;
            font-size: 1rem;
        }
        .contact a {
            color: #007bff;
            text-decoration: none;
        }
        .contact a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="moon"></div>
    <div class="container">
        <h1>We'll Be Back Soon!</h1>
        <div class="spinner"></div>
        <div class="current-time" id="current-time"></div>
        <p>Our ERP is currently undergoing scheduled maintenance.<br> Thank you for your patience!</p>
        <p>We are working hard to improve your experience. During this time, feel free to check out our social media channels for updates.</p>
        <div class="contact">
            <p>If you need immediate assistance, please contact us at <a href="mailto:support@example.com">support@example.com</a>.</p>
            <p>Follow us on <a href="https://twitter.com/youraccount" target="_blank">Twitter</a> and <a href="https://facebook.com/youraccount" target="_blank">Facebook</a> for the latest updates!</p>
        </div>
    </div>
    
    <script>
        // Function to update current time
        function updateTime() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const timeString = now.toLocaleTimeString(undefined, options);
            document.getElementById('current-time').textContent = `Current Time: ${timeString}`;
        }
        
        // Update time every second
        setInterval(updateTime, 1000);
        updateTime(); // Initial call
    </script>
</body>
</html>
