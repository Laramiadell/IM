<?php

    include "../db.php";

    $id = $_GET['id'];

    $st = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $st->execute([':id'=>$id]);
    $user = $st->fetch();

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Tutorial | Users</title>
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
                    <a class="nav-link" href="/index.php">Home </a>
                    <a class="nav-link active" href="/users/index.php">Users<span class="sr-only">(current)</span></a>   
                    <a class="nav-link" href="/trainors/index.php">Trainors</a>
                    <a class="nav-link" href="/courses/index.php">Courses</a>
                    <a class="nav-link" href="/trainees/index.php">Trainees</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Update User</h4>
               
                <form action="/users/process_update.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="user_name">Username: </label>
                        <input type="text" name="user_name" id="user_name"
                            value="<?= $user->user_name ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email"
                            value="<?= $user->email ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="full_name">Fullname: </label>
                        <input type="text" name="full_name" id="full_name"
                            value="<?= $user->full_name ?>" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-info" type="submit" name="update_user">
                            Update User
                        </button>
                        <a href="/users/index.php" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>