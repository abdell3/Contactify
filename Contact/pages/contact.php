<?php
   class Contact{
    private $ID;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Numero;
    private $connexion;

    public function __construct($connexion){
      $this->connexion = $connexion;
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
   public function getContact() {
    $sql = "SELECT * FROM Contact";
    try {
        $stmt = $this->connexion->query($sql);
        return $stmt;
    } catch (PDOException $e) {
        echo "Erreur de requête: " . $e->getMessage();
        return null;
    } 
  }
  public function createContact($nom, $prenom, $email, $numero) {
    $sql = "INSERT INTO Contact (Nom, Prenom, Email, Numero) VALUES (:nom, :prenom, :email, :numero)";
    
    try {
        
        $stmt = $this->connexion->prepare($sql);

        
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':numero', $numero);

        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
        return false;
    }
}
  public function deleteContact($id) {
       $sql = "DELETE FROM Contact WHERE ID = :id";

  try {
      
      $stmt = $this->connexion->prepare($sql);

      
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      
      if ($stmt->execute()) {
          return true;
      }
      return false;
  } catch (PDOException $e) {
      echo "Erreur de suppression : " . $e->getMessage();
      return false;
  }
}
   
   }

