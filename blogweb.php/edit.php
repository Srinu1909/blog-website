<?php
require 'config.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];

        $stmt = $pdo->prepare('UPDATE posts SET title = ?, content = ?, author = ? WHERE id = ?');
        $stmt->execute([$title, $content, $author, $_GET['id']]);

        header('Location: post.php?id=' . $_GET['id']);
        exit;
    }
} else {
    die('Post not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container for the form */
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
        }

        .back-link a:hover {
            color: #2980b9;
        }

        /* Error message styling */
        .error {
            color: #e74c3c;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>

        <!-- Edit Form -->
        <form action="edit.php?id=<?= $post['id']; ?>" method="POST">
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title']); ?>" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <textarea name="content" id="content" required><?= htmlspecialchars($post['content']); ?></textarea>
            </div>

            <div>
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="<?= htmlspecialchars($post['author']); ?>" required>
            </div>

            <button type="submit">Update Post</button>
        </form>

        <!-- Back to Post link -->
        <p class="back-link"><a href="post.php?id=<?= $post['id']; ?>">Back to Post</a></p>
    </div>
</body>
</html>
