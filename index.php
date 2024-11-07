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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Basic page styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar styling */
        nav {
            background-color: #2C3E50 ;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .logo {
            color:#27ae60;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: lightgreen;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #18BC9C;
        }

        /* Content styling */
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
            font-size: 36px;
        }

        /* Styling for the list of posts */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 900px;
        }

        li {
            
           
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        li:hover {
            background-color: #f9f9f9;
        }

        /* Post title styling */
        li a {
            font-size: 24px;
            font-weight: bold;
            color: #27ae60;
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
    </style>
</head>
<body>


 
    <nav>
    <div class="logo">My Blog</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="create.php">Create Post</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</nav>
  
<h1>Blog Posts</h1>
    
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
