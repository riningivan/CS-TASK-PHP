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
</head>
<body>
    <div class="container">
        <h1>Welcome to WAN(one) Trial Personality Adventure!</h1>
        <p>Ready to discover more about yourself? Take the quiz and find out your personality type!</p>
        <a href="story.php" class="start-button">Start the Adventure</a>
    </div>
</body>
</html>
