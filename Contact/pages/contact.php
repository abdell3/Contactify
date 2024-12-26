<?php
   class Contact{
    private $ID;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Numero;
    private $connexion;

    public function __construct($db){
      $this->connexion = $db;
    }

    public function getID(){
      return $this->ID;
    }
    public function getNom(){
      return $this->Nom;
    }
    public function setNom($Nom){
      $this->Nom = $Nom;
    }
   public function getPrenom(){
    return $this->Prenom;
   }
   public function setPrenom($Prenom){
    $this->Prenom = $Prenom;
   }
   public function getEmail(){
    return $this->Email;
   }
   public function setEmail($Email){
    $this->Email = $Email;
   }
   public function getNumero(){
    return $this->Numero;
   }
   public function setNumero($Numero){
    $this->Numero = $Numero;
   }
   public function getAllContact(){
    $sql = "SELECT * FROM Contact";
    $sth = $this->connexion->prepare($sql);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
   }   
   public function Create() {
    $sql = "INSERT INTO Contact VALUES ()";
    $stmt = $this->connexion->prepare($sql);
    
    $stmt->bindParam(':nom', $this->Nom);
    $stmt->bindParam(':prenom', $this->Prenom);
    $stmt->bindParam(':email', $this->Email);
    $stmt->bindParam(':numero', $this->Numero);

    if ($stmt->execute()) {
        return true;
    }
    return false;
}
   }

