<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
        body {
            background: linear-gradient(135deg, #2a2c37, #292230);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 120px;
            margin: 0;
            letter-spacing: 10px;
            background: linear-gradient(45deg, #ff6b6b, #f8e71c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h2 {
            font-size: 36px;
            margin-top: -20px;
            color: #f0f0f0;
        }

        p {
            font-size: 18px;
            color: #ddd;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 30px;
            background: #fff;
            color: #333;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
        }

        .btn:hover {
            background: #f8e71c;
            color: #222;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>403</h1>
        <h2>Access Denied</h2>
        <p>Sorry, you don’t have permission to access this page.</p>
        <a href="{{ route('home') }}" class="btn">Go Back to Home</a>
    </div>
</body>

</html>
