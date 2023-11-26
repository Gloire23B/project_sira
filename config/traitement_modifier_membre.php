<?php
// Récupération des données du formulaire
$id_membre = $_POST['id_membre'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$login = $_POST['login'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hashage du mot de passe
$tel = $_POST['tel'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];

// Connexion à la base de données
$pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Mise à jour des informations du membre dans la base de données
$stmt = $pdo->prepare("UPDATE membre SET prenom = :prenom, nom = :nom, login = :login, mdp = :mdp, tel = :tel, email = :email, adresse = :adresse, cp = :cp, ville = :ville  WHERE id_membre = :id_membre");
$stmt->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
$stmt->bindParam(':login', $login, PDO::PARAM_STR);
$stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$stmt->bindParam(':cp', $cp, PDO::PARAM_STR);
$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);

$stmt->execute();

// Redirection vers la page de tableau des membres avec un message de confirmation
header("Location: ../membre.php?message=modification_reussie");
exit();
?>
