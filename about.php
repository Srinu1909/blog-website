<?php
// You can add dynamic content or information here if needed.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | My Blog</title>
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
            color: #ecf0f1;
            font-size: 18px;
            padding: 10px 20px;
            margin: 0 15px;
            display: inline-block;
        }

        nav a:hover {
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }

        /* About Section */
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        /* Back Link */
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

    <!-- About Content Container -->
    <div class="container">
        <h1>About My Blog</h1>

        <p>Welcome to <strong>My Blog</strong>! This website is a simple platform where I share my thoughts, experiences, and ideas. Here, you'll find articles on a variety of topics, ranging from personal stories to technical tutorials. I aim to inspire, educate, and engage readers through quality content.</p>

        <p><strong>Why This Blog?</strong><br>
        I created this blog as a way to connect with like-minded individuals and to share the knowledge I have acquired over the years. Whether you're here to learn something new or just looking for interesting reads, I hope you find the content valuable and enjoyable.</p>

        <p><strong>About Me</strong><br>
        I am [Your Name], a passionate writer, developer, and content creator. I love sharing my ideas, exploring new technologies, and helping others through my posts. Feel free to explore and get in touch if you have any questions or feedback!</p>

        <p>Thank you for visiting, and I hope you enjoy reading my posts!</p>

        <!-- Back to Blog Link -->
        <p class="back-link"><a href="index.php">Back to Blog</a></p>
    </div>

</body>
</html>
