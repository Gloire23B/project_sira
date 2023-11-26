<?php

try {
     $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "", [
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
     ]);
} catch (PDOException $e) {
     echo "Erreur de connexion à la base de données : " . $e->getMessage();
}



if( isset($_POST['login']) && empty($_POST['id_membre']) ){

     $query = "INSERT INTO membre VALUES(NULL, :prenom, :nom, :login, :mdp, :tel, :email, :adresse, :cp, :ville)";
     $stmt = $pdo->prepare($query);

     $stmt->execute([
          "prenom" => $_POST['prenom'],
          "nom" => $_POST['nom'],
          "login" => $_POST['login'],
          "mdp" => password_hash($_POST['mdp'], PASSWORD_DEFAULT), // Hashage du mot de passe
          "tel" => $_POST['tel'],
          "email" => $_POST['email'],
          "adresse" => $_POST['adresse'],
          "cp" => $_POST['cp'],
          "ville" => $_POST['ville'],
     ]);

     header("location: .");
     exit;
     
}else if( isset($_GET['id_membre']) && ctype_digit($_GET['id_membre']) ){
     $action = $_GET['id_membre'];

     switch($action){
          case "update":
               $requete = $pdo->prepare("SELECT * FROM membre WHERE id = ?");
               $requete->execute([$_GET['id_membre']]);
               $personneUp = $requete->fetch();

               break;
          case "delete":
               $stmt = $pdo->prepare("DELETE FROM membre WHERE id = ?");
               $stmt->execute([$_GET['id_membre']]);

               header("location: ../membre.php?message=modification_reussie");
               exit;
     }
}


?>