<?php

require_once 'connexion.php';  
require_once 'contact.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = $_GET['id'];

    
    $contacts = new Contact($connexion);

    
    if ($contacts->deleteContact($id)) {
        echo '<div class="alert alert-success">Contact supprimé avec succès.</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de la suppression du contact.</div>';
    }
} else {
    echo '<div class="alert alert-danger">ID invalide ou manquant.</div>';
}


header("refresh:2;url=index.php");
?>