<?php

try {

    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $dbname = "peer1";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_OBJ
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

}catch(PDOException $x) {
    echo $ex->getMessage();
}