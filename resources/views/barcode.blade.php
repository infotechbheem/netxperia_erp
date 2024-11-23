<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .barcode-container {
            width: 300px; /* Adjust the width as per your requirement */
            text-align: center;
        }

        .barcode-container img, .barcode-container div {
            width: 100%; /* Make sure the barcode scales to fit the container */
        }
    </style>
    <title>Barcode</title>
</head>
<body>

<div class="barcode-container">
    <h3>Your Barcode Has Been Generated!</h3>
    {!! $barcode !!}
</div>

</body>
</html>
