<?php
require 'config.php';

$stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Center the title and add margin */
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
            font-size: 36px;
        }

        /* Styling the link for creating new post */
        a {
            text-decoration: none;
            color: #3498db;
            font-size: 18px;
            margin: 20px;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #d3e5ff;
        }

        /* List styling for posts */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 900px;
        }

        li {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        li:hover {
            background-color: #f9f9f9;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Post title styling */
        li a {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            transition: color 0.3s;
        }

        li a:hover {
            color: #4CAF50;
        }

        /* Author info styling */
        small {
            display: block;
            color: #555;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Content snippet styling */
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #777;
            margin-top: 10px;
        }

        /* Links for edit and delete */
        li a:last-child {
            font-size: 14px;
            color: #e74c3c;
            margin-left: 10px;
        }

        li a:last-child:hover {
            color: #c0392b;
        }

        li a:first-child {
            font-size: 14px;
            color: #2ecc71;
            margin-left: 10px;
        }

        li a:first-child:hover {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="create.php">Create New Post</a>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="post.php?id=<?= $post['id']; ?>">
                    <?= htmlspecialchars($post['title']); ?>
                </a>
                <small>by <?= htmlspecialchars($post['author']); ?></small>
                <p><?= substr(htmlspecialchars($post['content']), 0, 100); ?>...</p>
                <a href="edit.php?id=<?= $post['id']; ?>">Edit</a> | 
                <a href="delete.php?id=<?= $post['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
