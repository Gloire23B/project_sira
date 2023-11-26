<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_membre'])) {
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
    <title>Espace Client</title>
</head>
<body class="bg-light">

<!-- Barre de navigation -->
<?php include 'cl_header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Afficher le message de bienvenue
            echo "<h2>Bonjour et bienvenue!</h2>";
            ?>

            <!-- Carte Agence -->
            <div class="card mt-4">
                <img src="img/agence1.jpg" class="card-img-top" alt="Image Agence">
                <div class="card-body">
                    <h5 class="card-title">Agence</h5>
                    <p class="card-text">Description de l'agence.</p>
                    <a href="cl_views/cl_agence.php" class="btn btn-primary">Savoir plus</a>
                </div>
            </div>

            <!-- Carte Vehicule -->
            <div class="card mt-4">
                <img src="img/v1.jpg" class="card-img-top" alt="Image Vehicule">
                <div class="card-body">
                    <h5 class="card-title">Vehicule</h5>
                    <p class="card-text">Description du véhicule.</p>
                    <a href="cl_views/cl_vehicule.php" class="btn btn-primary">Savoir plus</a>
                </div>
            </div>

            <!-- Carte Location -->
            <div class="card mt-4">
                <img src="img/loc1.jpg" class="card-img-top" alt="Image Location">
                <div class="card-body">
                    <h5 class="card-title">Location</h5>
                    <p class="card-text">Description de la location.</p>
                    <a href="cl_views/cl_location.php" class="btn btn-primary">Savoir plus</a>
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
