<?php
    include "../db.php";
    $st = $pdo->query("SELECT * FROM users");
    $data = $st->fetchAll();
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
                    <a class="nav-link" href="../index.php">Home </a>
                    <a class="nav-link active" href="/users/index.php">Users<span class="sr-only">(current)</span></a>   
                    <a class="nav-link" href="../trainors/index.php">Trainors</a>
                    <a class="nav-link" href="../courses/index.php">Courses</a>
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
                <form action="/users/process_create.php" method="post">
                    <div class="form-group">
                        <label for="user_name">Username: </label>
                        <input type="text" name="user_name" id="user_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="full_name">Fullname: </label>
                        <input type="text" name="full_name" id="full_name" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-primary" type="submit" name="add_user">
                         Add User
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h4>List of Users</h4>
                <form action="/users/confirm_delete.php" method="post">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Username</th>
                            <th>Fullname</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $us): ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $us->id?>"></td>
                            <td><a href="/users/update.php?id=<?= $us->id ?>"><?= $us->user_name ?></a></td>
                            <td><?= $us->full_name ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" type="submit" name="delete_user">
                Delete Selected
                </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>