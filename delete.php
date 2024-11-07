<?php
require 'config.php';

if (isset($_GET['id'])) {
    // Prepare and execute the delete query
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    // Redirect to the index page after deletion
    header('Location: index.php');
    exit;
} else {
    die('Post not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Deleted</title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container for the message */
        .container {
            width: 60%;
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 2em;
            color: #2c3e50;
        }

        p {
            font-size: 18px;
            color: #7f8c8d;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
            color: #3498db;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #3498db;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #3498db;
            color: #fff;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }

            h1 {
                font-size: 1.8em;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Post Deleted</h1>
        <p>The post has been successfully deleted.</p>
        <a href="index.php">Back to Blog</a>
    </div>
</body>
</html>
