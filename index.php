<?php
include "db.php";

$data = $pdo->query("SELECT * FROM `sessions`")->fetchAll();


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
    </div>
    <h2>List of Sessions</h2>
    <ul style="margin-left: 2%">
    <?php foreach($data as $row): ?>
        <li><a  href="sessions.php?session_id=<?= $row->id ?>">
            <?= $row->title ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>