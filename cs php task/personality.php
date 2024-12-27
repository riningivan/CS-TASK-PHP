<?php
session_start(); // Start the session once

// Check if score is set in session, if not, redirect back to the quiz page
if (!isset($_SESSION['score'])) {
    header('Location: story.php'); // Redirect back to quiz page if no score exists
    exit();
}

// Define the Hogwarts houses and their corresponding descriptions and icons
$houses = [
    'Gryffindor' => [
        'description' => 'You are courageous and brave, always ready to stand up for what is right. Your adventurous spirit and determination make you a true Gryffindor!',
        'icon' => 'fas fa-paw'
    ],
    'Hufflepuff' => [
        'description' => 'You are loyal and hardworking, valuing fairness and kindness above all. Your dedication and warmth shine brightly in Hufflepuff!',
        'icon' => 'fas fa-leaf'
    ],
    'Ravenclaw' => [
        'description' => 'You are wise and creative, with a love for learning and discovery. Your intellect and curiosity define you as a true Ravenclaw!',
        'icon' => 'fas fa-crow'
    ],
    'Slytherin' => [
        'description' => 'You are ambitious and resourceful, always striving to achieve your goals. Your determination and cleverness make you a proud Slytherin!',
        'icon' => 'fas fa-dragon'
    ],
];


// Calculate the house based on score
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;

// Determine house based on score
$house = '';
if ($score >= 12) {
    $house = 'Gryffindor';
} elseif ($score >= 10) {
    $house = 'Hufflepuff';
} elseif ($score >= 6) {
    $house = 'Ravenclaw';
} else {
    $house = 'Slytherin';
}

// Get the description and icon for the house
$description = $houses[$house]['description'];
$icon = $houses[$house]['icon'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Hogwarts House</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <div class="container">
        <h1>Welcome to <?= htmlspecialchars($house) ?>!</h1>
        <i class="<?= htmlspecialchars($icon) ?> personality-icon"></i>
        <p class="personality"><?= htmlspecialchars($house) ?></p>
        <p class="description"><?= htmlspecialchars($description) ?></p>

        <a href="index.php" class="start-button">Discover Your House Again</a>
    </div>
</body>
</html>
