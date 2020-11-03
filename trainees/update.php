<?php

include "../db.php";

$id = $_GET['id'];

$st = $pdo->prepare("SELECT * FROM trainees WHERE id=:id");
$st->execute([':id'=>$id]);
$trai = $st->fetch();
$uss = $pdo->query("SELECT * FROM users")->fetchAll();
$cos = $pdo->query("SELECT * FROM courses")->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Tutorial | Trainee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Peer Tutorial</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="../index.php">Home </a>
                    <a class="nav-link" href="../users/index.php">Users</a> 
                    <a class="nav-link" href="../trainors/index.php">Trainors</a>  
                    <a class="nav-link" href="../courses/index.php">Courses</a>
                    <a class="nav-link active" href="/trainees/index.php">Trainee<span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
            <h4>Trainee Entry Form</h4>
                <form action="/trainees/process_update.php" method="post">
                <input type="hidden" name="id" value="<?= $trai->id ?>">
                    <div class="form-group">
                        <label for="user_id">User: </label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="0">Select User</option>
                            <?php foreach($uss as $u) : ?>
                                <option value="<?= $u->id ?>" <?= $u->id==$trai->user_id ? 'selected' : '' ?>><?= $u->user_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Course: </label>
                        <select name="course_id" id="course_id" class="form-control">
                            <option value="0">Select Course</option>
                            <?php foreach($cos as $c) : ?>
                                <option value="<?= $c->id ?>" <?= $c->id==$trai->course_id ? 'selected' : '' ?>><?= $c->title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status: </label>
                        <input type="text" name="status" id="status"
                            value="<?= $trai->status ?>" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-primary" type="submit" name="update_trainee">
                         Update Trainee
                        </button>
                        <a href="/trainees/index.php" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
