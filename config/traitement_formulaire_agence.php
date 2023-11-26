<?php

//Connexion à la base de données
include '../inc/fonction.php';


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que tous les champs obligatoires sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['tel']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville'])) {

        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];

        // Traitement de l'image
        if (!empty($_FILES['image']['name'])) {
            $uploadDir = '/img';
            foreach ($_FILES["pictures"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                    // basename() peut empêcher les attaques de système de fichiers;
                    // la validation/assainissement supplémentaire du nom de fichier peut être approprié
                    $name = basename($_FILES["pictures"]["name"][$key]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                }
            };
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($imageFileType, $allowedExtensions)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
            } else {
                $erreur_message = "Le format de l'image n'est pas autorisé. Utilisez jpg, jpeg, png, ou gif.";
            }
        }

        // Insertion des données dans la table agence (assurez-vous d'utiliser des requêtes préparées)
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO agence (nom, tel, adresse, cp, ville, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $tel, $adresse, $cp, $ville, isset($uploadFile) ? $uploadFile : null]);

        header("Location: ../views/formulaire_agence.php");
        exit();
    } else {
        $erreur_message = "Remplir tous les champs pour enregistrer.";
        include('../views/formulaire_agence.php');
    }
}
?>
