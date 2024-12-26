<?php
// Inclure les fichiers nécessaires
require_once 'connexion.php';  
require_once 'contact.php';

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'ID du contact à supprimer
    $id = $_GET['id'];

    // Créer une instance de la classe Contacts
    $contacts = new Contact($connexion);

    // Appeler la méthode pour supprimer le contact
    if ($contacts->deleteContact($id)) {
        echo '<div class="alert alert-success">Contact supprimé avec succès.</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de la suppression du contact.</div>';
    }
} else {
    echo '<div class="alert alert-danger">ID invalide ou manquant.</div>';
}

// Rediriger vers la liste des contacts après un délai (optionnel)
header("refresh:2;url=index.php");
?>