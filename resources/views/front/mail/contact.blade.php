<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
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
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #333333;
        }
        .details p {
            margin: 10px 0;
            color: #555555;
        }
        .details p strong {
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contact Details</h1>
        </div>
        <div class="details">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
        </div>
    </div>
</body>
</html>
