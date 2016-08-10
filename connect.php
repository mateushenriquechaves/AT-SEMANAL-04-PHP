<?php




function conectar() {
  $pdo = new PDO("mysql:host=localhost;dbname=devweb2016;, charset=utf8", "root", "");
    return $pdo;
  }

?>