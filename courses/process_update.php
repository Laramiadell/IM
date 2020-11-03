<?php
include "../db.php";

if(isset($_POST['update_course'])){

    $trainor_id = $_POST['trainor_id']; 
    $title = $_POST['title']; 
    $description = $_POST['description'];
    $id = $_POST['id'];
   
    $st = $pdo->prepare("UPDATE courses SET `trainor_id`=:tir, `title`=:ti, `description`=:descr WHERE id=:id");
    $st->execute([
        ':tir' => $trainor_id,
        ':ti' => $title,
        ':descr' => $description,
        ':id' => $id,
    ]);

    header("location: /courses/index.php");

}