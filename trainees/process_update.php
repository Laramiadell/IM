<?php
include "../db.php";

if(isset($_POST['update_trainee'])){

    $user_id = $_POST['user_id']; 
    $course_id = $_POST['course_id'];
    $status = $_POST['status']; 
    $id = $_POST['id'];
   
    $st = $pdo->prepare("UPDATE trainees SET `user_id`=:usid, `course_id`=:cid, `status`=:stat WHERE id=:id");
    $st->execute([
        ':usid' => $user_id,
        ':cid' => $course_id,
        ':stat' => $status,
        ':id' => $id,
    ]);

    header("location: /trainees/index.php");

}
