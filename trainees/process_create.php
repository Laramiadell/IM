<?php
include "../db.php";

if(isset($_POST['add_trainee'])){

   $user_id = $_POST['user_id'];
   $course_id = $_POST['course_id']; 
   $status = $_POST['status'];  

   $st = $pdo->prepare("INSERT INTO trainees(`user_id`, `course_id`, `status`) VALUES (:usid, :cid, :stat)");
   $st->execute([
    ':usid'     => $user_id,
    ':cid'      => $course_id,
    ':stat'     => $status,
   ]);

header("location:  /trainees/index.php");

 }else {
    echo print_r($_POST);
 }



