<?php
include "../db.php";

if(isset($_POST['add_trainor'])){

   $user_id = $_POST['user_id']; 
   $specialty = $_POST['specialty'];  

   $st = $pdo->prepare("INSERT INTO trainors(`user_id`, `specialty`) VALUES (:usid, :spec)");
   $st->execute([
    ':usid'     => $user_id,
    ':spec'     => $specialty,
   ]);

header("location:  /trainors/index.php");

 }else {
    echo print_r($_POST);
 }



