<?php
// Include config file to establish database connection
require 'config.php';

// Initialize variables to store error messages
$title = $content = $author = '';
$title_err = $content_err = $author_err = '';

// Process form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate title
    if (empty(trim($_POST['title']))) {
        $title_err = 'Please enter a title.';
    } else {
        $title = trim($_POST['title']);
    }

    // Validate content
    if (empty(trim($_POST['content']))) {
        $content_err = 'Please enter content.';
    } else {
        $content = trim($_POST['content']);
    }

    // Validate author (optional field)
    if (empty(trim($_POST['author']))) {
        $author_err = 'Please enter the author name.';
    } else {
        $author = trim($_POST['author']);
    }

    // If there are no validation errors, proceed to insert the data
    if (empty($title_err) && empty($content_err) && empty($author_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind parameters
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to the blog posts page after successful insertion
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <style>
        /* Basic page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Centering the main container */
        .container {
            width: 70%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        /* Styling for form elements */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            padding: 10px;
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

        .error {
            color: #e74c3c;
            font-size: 14px;
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

        /* Back link */
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Blog Post</h1>
        <p>Please fill in the form to create a new post.</p>

        <form action="create.php" method="POST">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($title); ?>">
                <span class="error"><?= $title_err; ?></span>
            </div>

            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="4"><?= htmlspecialchars($content); ?></textarea>
                <span class="error"><?= $content_err; ?></span>
            </div>

            <div>
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?= htmlspecialchars($author); ?>">
                <span class="error"><?= $author_err; ?></span>
            </div>

            <div>
                <button type="submit">Create Post</button>
            </div>
        </form>

        <p class="back-link"><a href="index.php">Back to Blog</a></p>
    </div>
</body>
</html>
