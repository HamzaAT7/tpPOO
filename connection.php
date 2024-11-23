<?php
class Connection{
private $servername="localhost";
private $username="root";
private $password="";
public $connexion;
public function __construct(){
    
    
    $this->connexion = mysqli_connect($this->servername, $this->username, $this->password);
     
    if(!$this->connexion){
        die('ERROR' .mysqli_connect_error());
    }
}
function createDatabase($dbName){
    if (mysqli_query($this->connexion, $sql)) {
    
    echo "Database created successfully";
    
    } else {
    
    echo "Error creating database: " .
    mysqli_error($this->connexion);
    
    }
}

function selectDatabase($dbName){
     mysqli_select_database($this->connexion,$req);
   }

   function createTable($query){

    if (mysqli_query($this->connexion, $query)) {
    
        echo "Table Clients created successfully";
        
        } else {
        
        echo "Error creating table: " .
        mysqli_error($this->connexion);
       
       }

}

}