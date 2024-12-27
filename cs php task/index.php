<?php
session_start(); // Start the session once
session_unset();  // Clear all session variables
session_destroy(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ONE Trial Personality Adventure!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            padding: 50px 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 18px;
            margin-bottom: 40px;
            color: #555;
        }
        .start-button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .start-button:hover {
            background-color: #45a049;
        }
        .houses {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }
        .house {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            width: 180px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .house:hover {
            transform: translateY(-10px);
        }
        .house i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #333;
        }
        .house p {
            font-size: 16px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Discover Your House, Unleash Your Magic!</h1>
        <p>Ready to discover more about yourself? Take the quiz and unlock your destiny!</p>
        <a href="story.php" class="start-button">Start the Adventure</a>

        <div class="houses">
            <div class="house">
                <i class="fas fa-paw"></i>
                <h3>Gryffindor</h3>
                <p>Courageous and brave, you stand up for what is right!</p>
            </div>
            <div class="house">
                <i class="fas fa-leaf"></i>
                <h3>Hufflepuff</h3>
                <p>Loyal and hardworking, you value fairness and kindness!</p>
            </div>
            <div class="house">
                <i class="fas fa-feather"></i>
                <h3>Ravenclaw</h3>
                <p>Wise and creative, you love learning and discovering new things!</p>
            </div>
            <div class="house">
                <i class="fas fa-dragon"></i>
                <h3>Slytherin</h3>
                <p>Ambitious and resourceful, you strive to achieve your goals!</p>
            </div>
        </div>
    </div>
</body>
</html>
