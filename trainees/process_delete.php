<?php
 include "../db.php";


 if(isset($_POST['confirm'])) {
 $id = implode(",", $_POST['id']);

 
 $pdo->query("DELETE FROM trainees WHERE id IN ($id)");

header("location: /trainees/index.php");
 }