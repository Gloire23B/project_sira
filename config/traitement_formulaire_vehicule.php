<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que tous les champs obligatoires sont remplis
    if (!empty($_POST['marque']) && !empty($_POST['prix_journalier'])) {

        // Récupérer les données du formulaire
        $marque = $_POST['marque'];
        $modele = isset($_POST['modele']) ? $_POST['modele'] : null;
        $prix_journalier = $_POST['prix_journalier'];
        $description = isset($_POST['description']) ? $_POST['description'] : null;

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
                include('formulaire_vehicule.php');
                exit();
            }
        }

        // Insertion des données dans la table vehicule (assurez-vous d'utiliser des requêtes préparées)
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO vehicule (marque, modele, prix_journalier, description, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$marque, $modele, $prix_journalier, $description, isset($uploadFile) ? $uploadFile : null]);

        header("Location: ../views/formulaire_vehicule.php");
        exit();
    } else {
        $erreur_message = "Remplir tous les champs pour enregistrer.";
        include('../views/formulaire_vehicule.php');
    }
}
?>
