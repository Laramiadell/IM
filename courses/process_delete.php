<?php
 include "../db.php";

 if(isset($_POST['confirm'])) {
 $id = implode(",", $_POST['id']);


 $pdo->query("DELETE FROM courses WHERE id IN ($id)");

header("location: /courses/index.php");
}