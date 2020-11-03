<?php
include "db.php";
$session_id = $_GET['session_id'];

$session_data = $pdo->query("SELECT lname, fname, title FROM `sessions` LEFT JOIN speakers ON `sessions`.speaker_id = speakers.id
        LEFT JOIN participants ON speakers.participant_id = participants.id
        WHERE `sessions`.id = $session_id")->fetch();

$participants = $pdo->query("SELECT lname, fname 
    FROM participations
    LEFT JOIN participants
    ON participations.participant_id = participants.id
    WHERE session_id = $session_id")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convention Manager</title>
</head>
<body>
<div>
    <h1>Convention Manager</h1>
    <a href="index.php">Home</a>
    </div>
    <h2>Session: <?= $session_data->title ?></h2>
    <h3>Speaker: <?= $session_data->fname ?> <?= $session_data->lname ?></h3>
    <h4>List of Participants</h4>
    <ul style="margin-left: 2%">
    <?php foreach($participants as $row): ?>
        <li> 
            <?= $row->lname ?>, 
            <?= $row->fname ?>
        </li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>