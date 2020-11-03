<?php

    include "../db.php";

    $id = $_GET['id'];

    $st = $pdo->prepare("SELECT * FROM courses WHERE id=:id");
    $st->execute([':id'=>$id]);
    $cour = $st->fetch();
    $uss = $pdo->query("SELECT trainors.*, users.user_name AS 'user' 
            FROM trainors LEFT JOIN users ON users.id=trainors.user_id")->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Tutorial | Courses</title>
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
                    <a class="nav-link active" href="/courses/index.php">Courses<span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="../trainees/index.php">Trainees</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h4>Courses Entry Form</h4>
                <form action="/courses/process_update.php" method="post">
                    <input type="hidden" name="id" value="<?= $cour->id ?>">
                    <div class="form-group">
                        <label for="trainor_id">Trainor: </label>
                        <select name="trainor_id" id="trainor_id" class="form-control">
                            <option value="0">Select Trainor</option>
                            <?php foreach($uss as $c) : ?>
                                <option value="<?= $c->id ?>" <?= $c->id==$cour->trainor_id ? 'selected' : '' ?>><?= $c->user ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" name="title" id="title"
                            value="<?= $cour->title ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" name="description" id="description"
                            value="<?= $cour->description ?>" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-primary" type="submit" name="update_course">
                         Update Course
                        </button>
                        <a href="/courses/index.php" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
