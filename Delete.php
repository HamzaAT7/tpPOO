<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
 $id=$_GET['id'];
 include('connection.php');

$conn=new Connection();

$conn->selectDatabase("chapitre4db");


include('client.php');

Client::deleteClient("Clients", $conn->connexion, $id);

?>