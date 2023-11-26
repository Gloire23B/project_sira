<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Tableau des Véhicules</title>
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
        <h2>Listes des vehicules disponibles</h2>
    </div>

    <?php
    // Récupération des données de la table vehicule
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM vehicule");
    $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage du tableau
    if (count($vehicules) > 0) :
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Véhicule</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Prix Journalier</th>
                <th>Description</th>
                <th>Image</th>
                <th>Agence</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vehicules as $vehicule) : ?>
                <tr>
                    <td><?php echo $vehicule['id_vehicule']; ?></td>
                    <td><?php echo $vehicule['marque']; ?></td>
                    <td><?php echo $vehicule['modele']; ?></td>
                    <td><?php echo $vehicule['prix_journalier']; ?></td>
                    <td><?php echo $vehicule['description']; ?></td>
                    <td><?php echo $vehicule['image']; ?></td>
                    <td><?php echo $vehicule['agence']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun véhicule disponible pour le moment.</p>
    <?php endif; ?>
    <a href="cl_vehicule.php" class="btn btn-primary">Rafraîchir</a>

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
