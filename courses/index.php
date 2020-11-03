<?php
    include "../db.php";
    $cou = $pdo->query("SELECT courses.*, users.user_name AS 'trainor' 
            FROM courses LEFT JOIN users ON users.id=courses.trainor_id")->fetchAll();
    $uss = $pdo->query("SELECT trainors.*, users.user_name AS 'user' 
            FROM trainors LEFT JOIN users ON users.id=trainors.user_id")->fetchAll();
    $us = $pdo->query("SELECT * FROM users")->fetchAll();
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
            <div class="col-md-4">
                <h4>User Entry Form</h4>
                <form action="/courses/process_create.php" method="post">
                    <div class="form-group">
                        <label for="trainor_id">Trainor: </label>
                        <select name="trainor_id" id="trainor_id" class="form-control">
                            <option value="0">Select Trainor</option>
                            <?php foreach($uss as $tr) : ?>
                                <option value="<?= $tr->id ?>"><?= $tr->user ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-primary" type="submit" name="create">
                         Add Course
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h4>List of Users</h4>
                <form action="/courses/confirm_delete.php" method="post">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Trainor</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cou as $co) : ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $co->id?>"></td>
                            <td><a href="/courses/update.php?id=<?= $co->id ?>"><?= $co->trainor ?></a></td>
                            <td><?= $co->title ?></td>
                            <td><?= $co->description ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" type="submit" name="delete_course">
                Delete Selected
                </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>