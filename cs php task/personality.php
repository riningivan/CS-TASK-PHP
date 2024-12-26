<?php
session_start(); // Start the session once

// Check if score is set in session, if not, redirect back to the quiz page
if (!isset($_SESSION['score'])) {
    header('Location: story.php'); // Redirect back to quiz page if no score exists
    exit();
}

// Define personality types and corresponding icons
$personality_types = [
    'Extrovert' => [
        'description' => 'You are outgoing and enjoy spending time with others! Your adventurous spirit leads you to explore new opportunities.',
        'icon' => 'fas fa-users' // Font Awesome icon for Extrovert
    ],
    'Introvert' => [
        'description' => 'You are more reserved and enjoy reflecting on your thoughts. You find peace in solitude and introspection.',
        'icon' => 'fas fa-user' // Font Awesome icon for Introvert
    ],
    'Creative Thinker' => [
        'description' => 'You are imaginative and love engaging in creative hobbies. You look at the world from a unique perspective.',
        'icon' => 'fas fa-lightbulb' // Font Awesome icon for Creative Thinker
    ],
    'Logical Thinker' => [
        'description' => 'You are analytical and prefer structured thinking. You value facts and logical reasoning over emotions.',
        'icon' => 'fas fa-cogs' // Font Awesome icon for Logical Thinker
    ],
];

// Calculate the personality based on score
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;

// Determine personality type based on score
$personality = '';
if ($score >= 15) {
    $personality = 'Extrovert';
} elseif ($score >= 10) {
    $personality = 'Creative Thinker';
} elseif ($score >= 5) {
    $personality = 'Logical Thinker';
} else {
    $personality = 'Introvert';
}

// Get the description and icon for the personality type
$description = $personality_types[$personality]['description'];
$icon = $personality_types[$personality]['icon'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Personality Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="container">
        <h1>You've Finished the Adventure!</h1>
        <i class="<?= htmlspecialchars($icon) ?> personality-icon"></i>
        <p class="personality"><?= htmlspecialchars($personality) ?></p>
        <p class="description"><?= htmlspecialchars($description) ?></p>

        <a href="index.php" class="start-button">Take the Adventure Again</a>
    </div>

</body>
</html>
