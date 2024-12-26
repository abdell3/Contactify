<?php

// $host = "localhost"; 
// $username = "root";   
// $password = "";      
// $dbname = "contactify";  


// class Connexion{
//     private $host = "localhost" ; 
//     private $username = "root" ;   
//     private $password = "" ;      
//     private $dbname = "contactify" ; 


//     public function connect(){
//         $this->connexion = null;
//         try {
//             $this->connexion= new PDO('mysql:host='. $this->host . ';dbname='.$this->dbname 
//              , $this->username, $this->password);
            
            
//             $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
//         } catch (PDOException $e) {
//             echo'Erreur de connexion: ' . $e->getMessage();
//         }
//         return $this->connexion;
//     }
// }



$host = 'localhost';   
$dbname = 'contactify'; 
$username = 'root'; 
$password = ''; 

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection échouée : " . $e->getMessage();
}


 ?>
