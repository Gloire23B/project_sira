<?php
try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    // Vérification des identifiants
    $stmt = $pdo->prepare("SELECT * FROM membre WHERE login = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    $membre = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($membre && password_verify($mdp, $membre['mdp'])) {
        // Enregistrement des informations de l'utilisateur dans la session
        $_SESSION['id_membre'] = $membre['id_membre'];
        $_SESSION['statut'] = $membre['statut'];

        // Redirection vers la page appropriée
        if ($membre['statut'] === 'ADMIN') {
            header("Location: ../admin.php");
        } else {
            header("Location: ../client.php");
        }
        exit();
    } else {
        echo "<p class='text-danger'>Login ou mot de passe incorrect.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
