<?php

    include "../db.php";
    
    if(isset($_POST['delete_trainor']) && count($_POST['id']) >0) {

        $ids = implode(",", $_POST['id']);

        $trai = $pdo->query("SELECT * FROM trainors WHERE id IN ($ids)")->fetchAll();
    }else {
        header("location: /trainors/index.php");
    }

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
            <div class="col-md-4 offset-md-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h4>Delete Trainor/s?</h4>
                    </div>
                    <div class="card-body">
                        <form action="/trainors/process_delete.php" method="post">
                        Are you sure you want to delete trainor/s?
                        
                        <ul>
                            <?php foreach($trai as $tr): ?>
                                <li><?= $tr->specialty ?></li>
                                <input type="hidden" name="id[]" value="<?= $tr->id ?>">
                            <?php endforeach; ?>
                        </ul>
                        
                        <button class="btn btn-danger" type="submit" name="confirm">
                        Yes, delete trainor/s
                        </button>
                        <a href="/trainors/index.php" class="btn btn-info">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>