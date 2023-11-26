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
<?php include 'ad_header.php' ?>

<div class="container mt-5">
    <div class="row justify-content-between mb-3">
        <h2>Tableau des Véhicules</h2>
        <a href="views/formulaire_vehicule.php" class="btn btn-primary">Créer un Véhicule</a>
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
    <a href="vehicule.php" class="btn btn-primary">Rafraîchir</a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php
    include 'footer.php';
?>

</body>
</html>
