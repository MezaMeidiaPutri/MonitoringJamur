<?php
session_start();
$_SESSION = [];
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        /* Logout Page Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            text-align: center;
        }

        .logout-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logout-container h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .logout-container p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .logout-container a {
            text-decoration: none;
            background-color: #ffcc00;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .logout-container a:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>Logged Out</h1>
        <p>You have been successfully logged out.</p>
        <a href="login.php">Go to Login</a>
    </div>
</body>
</html>
