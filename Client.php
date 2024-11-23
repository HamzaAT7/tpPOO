<?php
include("connection.php");

class Client {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $reg_date;
    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($firstname, $lastname, $email, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); 
    }

    public function insertClient($tableName, $conn) {
        $sql = "INSERT INTO $tableName (firstname, lastname, email, password) 
                VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password')";
        
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "Insertion successfully";
        } else {
            self::$errorMsg = "Insertion has not been successfully : ";
        }
    }

    public static function selectAllClients($tableName, $conn) {
        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $sql);
        $data = [];
        
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            self::$errorMsg = "no client ";
        }

        return $data; 
    }

    public static function selectClientById($tableName, $conn, $id) {
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            self::$errorMsg = "Erreur lors de la récupération : ";
            return null;
        }
    }

    public static function updateClient($client, $tableName, $conn, $id) {
        $sql = "UPDATE $tableName 
                SET firstname = '{$client->firstname}', 
                    lastname = '{$client->lastname}', 
                    email = '{$client->email}', 
                    password = '{$client->password}' 
                WHERE id = $id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: read.php");
            exit;
        } else {
            self::$errorMsg = "Erreur lors de la mise à jour : " . mysqli_error($conn);
        }
    }

    public static function deleteClient($tableName, $conn, $id) {
        $sql = "DELETE FROM $tableName WHERE id = $id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: read.php");
            exit;
        } else {
            self::$errorMsg = "Erreur lors de la suppression : " . mysqli_error($conn);
        }
    }
}
?>
