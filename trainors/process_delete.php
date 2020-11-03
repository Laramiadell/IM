<?php
 include "../db.php";


 if(isset($_POST['confirm'])) {
 $id = implode(",", $_POST['id']);

 
 $pdo->query("DELETE FROM trainors WHERE id IN ($id)");

header("location: /trainors/index.php");
 }