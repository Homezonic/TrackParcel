<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            max-width: 640px;
            margin: 0 auto;
            padding: 1rem;
        }

        .heading {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        .message {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: #f5f5f5;
            border-radius: 0.5rem;
        }

        .footer {
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">New Contact Form Submission</h1>

        <div class="message">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Message:</strong> {{ $formmessage }}</p>
        </div>

        <p class="footer">
            This message was sent via the contact form on your website.
            Please do not reply to this email.
        </p>
    </div>
</body>
</html>
