<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_membre']) || $_SESSION['statut'] !== 'ADMIN') {
    header("Location: views/formulaire_connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Espace Admin</title>
</head>
<body class="bg-light">

<!-- Barre de navigation -->
<?php include 'ad_header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Afficher le message de bienvenue
            echo "<h2>Bienvenue et bon travail !</h2>";
            ?>

            <div class="row">
                <!-- Carte Agence -->
                <div class="col-md-3">
                    <div class="card mt-4">
                        <img src="img/agence1.jpg" class="card-img-top" alt="Image Agence">
                        <div class="card-body">
                            <h5 class="card-title">Agence</h5>
                            <p class="card-text">Description de l'agence. Continually grow enterprise users before B2C total linkage. Credibly synthesize one-to-one platforms for go forward best practices.</p>
                            <a href="agence.php" class="btn btn-primary">Savoir plus</a>
                        </div>
                    </div>
                </div>

                <!-- Carte Vehicule -->
                <div class="col-md-3">
                    <div class="card mt-4">
                        <img src="img/v1.jpg" class="card-img-top" alt="Image Vehicule">
                        <div class="card-body">
                            <h5 class="card-title">Vehicule</h5>
                            <p class="card-text">Description du véhicule. Continually grow enterprise users before B2C total linkage. Credibly synthesize one-to-one platforms for go forward best practices.</p>
                            <a href="vehicule.php" class="btn btn-primary">Savoir plus</a>
                        </div>
                    </div>
                </div>

                <!-- Carte Location -->
                <div class="col-md-3">
                    <div class="card mt-4">
                        <img src="img/loc1.jpg" class="card-img-top" alt="Image Location">
                        <div class="card-body">
                            <h5 class="card-title">Location</h5>
                            <p class="card-text">Description de la location. Continually grow enterprise users before B2C total linkage. Credibly synthesize one-to-one platforms for go forward best practices.</p>
                            <a href="location.php" class="btn btn-primary">Savoir plus</a>
                        </div>
                    </div>
                </div>

                <!-- Carte Membre -->
                <div class="col-md-3">
                    <div class="card mt-4">
                        <img src="img/membre.jpg" class="card-img-top" alt="Image Membre">
                        <div class="card-body">
                            <h5 class="card-title">Membre</h5>
                            <p class="card-text">Description du membre. Continually grow enterprise users before B2C total linkage. Credibly synthesize one-to-one platforms for go forward best practices.</p>
                            <a href="membre.php" class="btn btn-primary">Savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php
    include 'footer.php';
?>
</body>
</html>
