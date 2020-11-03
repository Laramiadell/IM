<?php
    include "../db.php";
    $train = $pdo->query("SELECT trainors.*, users.user_name AS 'user' 
            FROM trainors LEFT JOIN users ON users.id=trainors.user_id")->fetchAll();
    $uss = $pdo->query("SELECT * FROM users")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Tutorial | Trainors</title>
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
                    <a class="nav-link active" href="/trainors/index.php">Trainors<span class="sr-only">(current)</span></a>
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
                <h4>Trainor Entry Form</h4>
                <form action="/trainors/process_create.php" method="post">
                    <div class="form-group">
                        <label for="user_id">User: </label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="0">Select User</option>
                            <?php foreach($uss as $t) : ?>
                                <option value="<?= $t->id ?>"><?= $t->user_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="specialty">Specialty: </label>
                        <input type="text" name="specialty" id="specialty" class="form-control">
                    </div>
                    <div class="for-group">
                        <button class="btn btn-primary" type="submit" name="add_trainor">
                         Add Trainor
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h4>List of Trainors</h4>
                <form action="/trainors/confirm_delete.php" method="post">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>User</th>
                            <th>Specialty</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($train as $tr) : ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $tr->id?>"></td>
                            <td><a href="/trainors/update.php?id=<?= $tr->user_id ?>"><?= $tr->user ?></a></td>
                            <td><?= $tr->specialty ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" type="submit" name="delete_trainor">
                Delete Selected
                </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>