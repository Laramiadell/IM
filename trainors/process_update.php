<?php
include "../db.php";

if(isset($_POST['update_trainor'])){

    $user_id = $_POST['user_id']; 
    $specialty = $_POST['specialty']; 
    $id = $_POST['id'];
   
    $st = $pdo->prepare("UPDATE trainors SET `user_id`=:usid, `specialty`=:spec WHERE id=:id");
    $st->execute([
        ':usid' => $user_id,
        ':spec' => $specialty,
        ':id' => $id,
    ]);

    header("location: /trainors/index.php");

}
