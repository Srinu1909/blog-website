<?php
require 'config.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch();
} else {
    die('Post not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']); ?></title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container for the post */
        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        .post-meta {
            text-align: center;
            color: #7f8c8d;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .post-meta span {
            font-style: italic;
        }

        p {
            line-height: 1.6;
            font-size: 18px;
            color: #34495e;
        }

        a {
            display: inline-block;
            margin-top: 30px;
            text-align: center;
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
                width: 90%;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($post['title']); ?></h1>
        <div class="post-meta">
            <p>by <?= htmlspecialchars($post['author']); ?> on <span><?= $post['created_at']; ?></span></p>
        </div>
        <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
        <a href="index.php">Back to Blog</a>
    </div>
</body>
</html>
