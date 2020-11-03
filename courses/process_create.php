<?php
include "../db.php";

if(isset($_POST['create'])){

   $trainor_id = $_POST['trainor_id']; 
   $title = $_POST['title']; 
   $description = $_POST['description']; 

   $co = $pdo->prepare("INSERT INTO courses(`trainor_id`, `title`, `description`) VALUES (:tid, :ti, :descr)");
   $co->execute([
    ':tid'     => $trainor_id,
    ':ti'      => $title,
    ':descr'   => $description,
   ]);

   header("location:  /courses/index.php");

 }else {
    echo print_r($_POST);
 }



