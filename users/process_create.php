<?php
include "../db.php";

if(isset($_POST['add_user'])){

   $user_name = $_POST['user_name']; 
   $email = $_POST['email']; 
   $full_name = $_POST['full_name']; 

   $st = $pdo->prepare("INSERT INTO users (`user_name`, `email`, `full_name`) VALUES (:uname, :email, :fname)");
   $st->execute([
    ':uname' => $user_name,
    ':email' => $email,
    ':fname' => $full_name,
   ]);

header("location:  /users/index.php");

 }else {
    echo print_r($_POST);
 }


