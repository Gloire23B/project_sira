<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que tous les champs obligatoires sont remplis
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville'])) {

        // Récupérer les données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hashage du mot de passe
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];

        // Insertion des données dans la table membre (assurez-vous d'utiliser des requêtes préparées)
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO membre (prenom, nom, login, mdp, tel, email, adresse, cp, ville) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$prenom, $nom, $login, $mdp, $tel, $email, $adresse, $cp, $ville]);

        header("Location: ../views/formulaire_membre.php");
        exit();
    } else {
        $erreur_message = "Remplir tous les champs pour créer un compte.";
        include('../views/formulaire_membre.php');
    }
}
?>
