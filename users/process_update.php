<?php
include "../db.php";

if(isset($_POST['update_user'])){

    
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $id = $_POST['id'];

    $st = $pdo->prepare("UPDATE users SET `user_name`=:uname, `email`=:email, `full_name`=:fname WHERE id =:id");
    
    $st->execute([
        ':uname' => $user_name,
        ':email'     => $email,
        ':fname' => $full_name,
        ':id'        => $id,
    ]);

    header("location: /users/index.php");

}