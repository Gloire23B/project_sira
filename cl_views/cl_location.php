<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Tableau des Locations</title>
</head>
<body class="bg-light">

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../client.php">Espace Client</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="cl_agence.php">Agence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cl_vehicule.php">Vehicule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cl_location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-between mb-3">
        <h2>Tableau des Locations</h2>
        <a href="../views/formulaire_location.php" class="btn btn-primary">Créer une Location</a>
    </div>

    <!-- Affichage du tableau des locations -->
    <?php
    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données de la table location
        $stmt = $pdo->query("SELECT * FROM location");
        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Affichage du tableau
        if (count($locations) > 0) :
            ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID Location</th>
                    <th>ID Client</th>
                    <th>ID Véhicule</th>
                    <th>ID Agence</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Total</th>
                    <th>Date Réservation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($locations as $location) : ?>
                    <tr>
                        <td><?php echo $location['id_location']; ?></td>
                        <td><?php echo $location['id_client']; ?></td>
                        <td><?php echo $location['id_vehicule']; ?></td>
                        <td><?php echo $location['id_agence']; ?></td>
                        <td><?php echo $location['dateDebut']; ?></td>
                        <td><?php echo $location['dateFin']; ?></td>
                        <td><?php echo $location['total']; ?></td>
                        <td><?php echo $location['dateReservation']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Aucune location disponible pour le moment.</p>
        <?php endif;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <!-- Bouton de retour à la page précedente en utilisant lhistorique de navigation-->
    <button class="btn btn-primary" onclick="retourPage()">Retour</button>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Script JavaScript pour retourner à la page précédente -->
<script>
    function retourPage() {
        window.history.back();
    }
</script>

</body>
</html>
