<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Supprimer Membre</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Supprimer Membre</h2>

            <?php
            // Récupération de l'ID du membre à supprimer depuis l'URL
            $id_membre = isset($_GET['id_membre']) ? $_GET['id_membre'] : null;

            // Vérification de l'existence de l'ID
            if (!$id_membre) {
                echo "<p class='text-danger'>Aucun ID de membre spécifié.</p>";
            } else {
                // Connexion à la base de données
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Suppression du membre de la base de données
                $stmt = $pdo->prepare("DELETE FROM membre WHERE id_membre = :id_membre");
                $stmt->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
                $stmt->execute();

                // Affichage du message de suppression réussie
                echo "<p class='text-success text-center'>Suppression réussie.</p>";
            }
            ?>

            <!-- Bouton de rafraîchissement -->
            <a href="../../membre.php" class="btn btn-primary btn-block">Rafraîchir</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
