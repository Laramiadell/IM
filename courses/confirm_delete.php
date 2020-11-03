<?php

    include "../db.php";
    
    if(isset($_POST['delete_course']) && count($_POST['id'])>0) {

        $ids = implode(",", $_POST['id']);

        $cour = $pdo->query("SELECT * FROM courses WHERE id IN ($ids)")->fetchAll();
    }else {
        header("location: /courses/index.php");
    }

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
                    <a class="nav-link" href="/index.php">Home </a>
                    <a class="nav-link" href="/users/index.php">Users</a>   
                    <a class="nav-link" href="/trainors/index.php">Trainors</a>
                    <a class="nav-link active" href="/courses/index.php">Courses<span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/trainees/index.php">Trainees</a>
                </div>
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h4>Delete Course/s?</h4>
                    </div>
                    <div class="card-body">
                        <form action="/courses/process_delete.php" method="post">
                        Are you sure you want to delete course/s?
                        
                        <ul>
                            <?php foreach($cour as $co): ?>
                                <li><?= $co->title ?></li>
                                <input type="hidden" name="id[]" value="<?= $co->id ?>">
                            <?php endforeach; ?>
                        </ul>
                        
                        <button class="btn btn-danger" type="submit" name="confirm">
                        Yes, delete course/s
                        </button>
                        <a href="/courses/index.php" class="btn btn-info">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>