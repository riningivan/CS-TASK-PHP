<?php
session_start();

// Initialize score if not already set
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;

}

// Define the questions and their corresponding scores
$questions = [
    [
        'question' => "You enjoy spending time with large groups of people.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You prefer planning your day rather than being spontaneous.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You often take time to reflect on your feelings.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You enjoy engaging in creative hobbies.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You feel energized by being around others.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You prefer to stick to facts rather than theories.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You are good at resolving conflicts among people.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You like to take risks and explore new experiences.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You find it easy to empathize with others' feelings.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
        'scores' => [2, 1, 0]
    ],
    [
        'question' => "You enjoy organizing events or group activities.",
        'options' => ['Agree', 'Neutral', 'Disagree'],
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
                        <?= htmlspecialchars($option, ENT_QUOTES) ?>
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>
