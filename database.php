<?php
include("connection.php");

$conn= new Connection();
$conn->createcreateDatabase("chapitre4db");




$conn->selectDatabase("chapitre4db");
$query ="
CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
$conn->createTable($query);

?>