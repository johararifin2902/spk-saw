<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SPK Laptop</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1d3557, #457b9d, #a8dadc);
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
            color: #fff;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Container */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        /* Header Text */
        h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #f1faee;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            margin: 0.5rem;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #457b9d;
        }

        .btn-primary:hover {
            background-color: #1d3557;
            transform: translateY(-5px);
        }

        .btn-success {
            background-color: #2a9d8f;
        }

        .btn-success:hover {
            background-color: #1b6f5e;
            transform: translateY(-5px);
        }

        /* Footer */
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 1rem 0;
            background-color: rgba(0, 0, 0, 0.3);
            color: #f1faee;
            font-size: 0.9rem;
        }

        footer a {
            color: #a8dadc;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SPK Laptop</h1>
        <p>Sistem Pendukung Keputusan untuk Memilih Laptop Terbaik</p>
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        </div>
    </div>
    <footer>
        <p>&copy; {{ date('Y') }} SPK Laptop. <a href="#">All Rights Reserved</a>.</p>
    </footer>
</body>
</html>
