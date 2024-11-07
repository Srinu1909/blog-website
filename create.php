<?php
require 'config.php';

// Handle form submission (if any)
$title = $content = $author = '';
$title_err = $content_err = $author_err = '';

// Handle form data validation and saving
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation logic goes here...
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog Post</title>
    <style>
        /* Basic Page Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar Styling */
        nav {
            background-color: #2C3E50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
        }

        /* Logo styling */
        .logo {
            font-size: 24px;
            color: #27ae60;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Navbar Links Styling */
        nav a {
            text-decoration: none;
            color:#27ae60 ;
            font-size: 18px;
            padding: 10px 20px;
            margin: 0 15px;
            display: inline-block;
        }

        nav a:hover {
            background-color: #3498db;
            color: #27ae60;
            border-radius: 5px;
        }

        /* Container for the form */
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h1 {
            text-align: center;
            color: #4CAF50;
        }

        /* Form Elements */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input, textarea {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
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
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Back to Blog Link */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link a:hover {
            color: #2980b9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <!-- Logo -->
        <div class="logo">My Blog</div>

        <!-- Navbar Links -->
        <div>
            <a href="index.php">Home</a>
            <a href="create.php">Create Post</a>
            <a href="about.php">About</a>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="container">
        <h1>Create New Blog Post</h1>
        <p>Please fill in the form to create a new post.</p>

        <form action="create.php" method="POST">
            <!-- Title Input -->
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?= htmlspecialchars($title); ?>" placeholder="Enter the title">
                <span class="error"><?= $title_err; ?></span>
            </div>

            <!-- Content Textarea -->
            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="6" placeholder="Write your blog content"><?= htmlspecialchars($content); ?></textarea>
                <span class="error"><?= $content_err; ?></span>
            </div>

            <!-- Author Input -->
            <div>
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?= htmlspecialchars($author); ?>" placeholder="Your name">
                <span class="error"><?= $author_err; ?></span>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit">Create Post</button>
            </div>
        </form>

        <!-- Back to Blog Link -->
        <p class="back-link"><a href="index.php">Back to Blog</a></p>
    </div>

</body>
</html>
