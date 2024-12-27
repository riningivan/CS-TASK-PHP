<?php
session_start();

// Initialize score if not already set
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

// Define the questions and their corresponding scores
$questions = [
    [
        'question' => "You bravely face danger to protect others.",
        'options' => [
            '<i class="fas fa-shield-alt"></i> Agree', 
            '<i class="fas fa-hand-paper"></i> Neutral', 
            '<i class="fas fa-question-circle"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You are hardworking and value loyalty in your friendships.",
        'options' => [
            '<i class="fas fa-hand-holding-heart"></i> Agree', 
            '<i class="fas fa-balance-scale"></i> Neutral', 
            '<i class="fas fa-times"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You love solving riddles and enjoy learning new things.",
        'options' => [
            '<i class="fas fa-book"></i> Agree', 
            '<i class="fas fa-question"></i> Neutral', 
            '<i class="fas fa-eye-slash"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You aim high and strive to achieve greatness in all you do.",
        'options' => [
            '<i class="fas fa-crown"></i> Agree', 
            '<i class="fas fa-mountain"></i> Neutral', 
            '<i class="fas fa-cross"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You are always ready to take on adventures, no matter the risks.",
        'options' => [
            '<i class="fas fa-map"></i> Agree', 
            '<i class="fas fa-route"></i> Neutral', 
            '<i class="fas fa-stop"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You believe in fairness and treating everyone equally.",
        'options' => [
            '<i class="fas fa-heart"></i> Agree', 
            '<i class="fas fa-balance-scale"></i> Neutral', 
            '<i class="fas fa-thumbs-down"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You often come up with clever solutions to tricky situations.",
        'options' => [
            '<i class="fas fa-lightbulb"></i> Agree', 
            '<i class="fas fa-smile"></i> Neutral', 
            '<i class="fas fa-question-circle"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You are resourceful and excel in leadership roles.",
        'options' => [
            '<i class="fas fa-user-tie"></i> Agree', 
            '<i class="fas fa-users"></i> Neutral', 
            '<i class="fas fa-times"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You find it easy to connect with others and empathize with their feelings.",
        'options' => [
            '<i class="fas fa-hands-helping"></i> Agree', 
            '<i class="fas fa-handshake"></i> Neutral', 
            '<i class="fas fa-meh"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You enjoy organizing events and working with a team.",
        'options' => [
            '<i class="fas fa-users-cog"></i> Agree', 
            '<i class="fas fa-user-friends"></i> Neutral', 
            '<i class="fas fa-ban"></i> Disagree'
        ],
        'scores' => [2, 1, 0]
    ],
];

// Determine the current question index
$current_question = isset($_SESSION['current_question']) ? $_SESSION['current_question'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = intval($_POST['answer']);
    $_SESSION['score'] += $questions[$current_question]['scores'][$answer];
    $_SESSION['current_question'] = ++$current_question;

    // Check if we have reached the end of the quiz
    if ($current_question >= count($questions)) {
        // Redirect to the results page once all questions are answered
        header("Location: personality.php");
        exit;
    }
}

$question = $questions[$current_question];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question <?= $current_question + 1 ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>Question <?= $current_question + 1 ?> of <?= count($questions) ?></h2>
        <p><?= htmlspecialchars($question['question'], ENT_QUOTES) ?></p>
        <form method="POST">
            <?php foreach ($question['options'] as $index => $option): ?>
                <div>
                    <label>
                        <input type="radio" name="answer" value="<?= $index ?>" required>
                        <?= $option ?> <!-- Removed htmlspecialchars to render icons -->
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>
