<?php

require_once 'connexion.php';  
require_once 'contact.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];

    
    $contacts = new Contact($connexion);

    
    if ($contacts->createContact($nom, $prenom, $email, $numero)) {
        echo '<div class="alert alert-success">Contact ajouté avec succès.</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de l\'ajout du contact.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un Nouveau Contact</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter le Contact</button>
            <a href="index.php" class="btn btn-secondary ms-2">Retour à la Liste</a>
        </form>
    </div>
</body>
</html>
