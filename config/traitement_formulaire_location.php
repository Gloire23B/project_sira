<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que tous les champs obligatoires sont remplis
    if (!empty($_POST['id_client']) && !empty($_POST['id_vehicule']) && !empty($_POST['id_agence']) && !empty($_POST['dateDebut']) && !empty($_POST['dateFin'])) {

        // Récupérer les données du formulaire
        $id_client = $_POST['id_client'];
        $id_vehicule = $_POST['id_vehicule'];
        $id_agence = $_POST['id_agence'];
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];

        // Insertion des données dans la table location en utilisant des jointures
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "",);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO location (id_client, id_vehicule, id_agence, dateDebut, dateFin) 
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id_client, $id_vehicule, $id_agence, $dateDebut, $dateFin]);

        $message = "Votre demande de location a bien été transmis.";

        include('../views/formulaire_location.php');
        exit();
    } else {
        $erreur_message = "Remplir tous les champs pour faire une demande de location.";
        include('../views/formulaire_location.php');
    }
}
?>
