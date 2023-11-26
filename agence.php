<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Tableau des Agences</title>
</head>
<body class="bg-light">

<!-- Barre de navigation -->
<?php include 'ad_header.php' ?>

<div class="container mt-5">
    <div class="row justify-content-between mb-3">
        <h2>Tableau des Agences</h2>
        <a href="views/formulaire_agence.php" class="btn btn-primary">Créer une Agence</a>
    </div>

    <?php
    // Récupération des données de la table agence
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM agence");
    $agences = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage du tableau
    if (count($agences) > 0) :
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Agence</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($agences as $agence) : ?>
                <tr>
                    <td><?php echo $agence['id_agence']; ?></td>
                    <td><?php echo $agence['nom']; ?></td>
                    <td><?php echo $agence['tel']; ?></td>
                    <td><?php echo $agence['email']; ?></td>
                    <td><?php echo $agence['adresse']; ?></td>
                    <td><?php echo $agence['cp']; ?></td>
                    <td><?php echo $agence['ville']; ?></td>
                    <td><?php echo $agence['image']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucune agence disponible pour le moment.</p>
    <?php endif; ?>
    <a href="agence.php" class="btn btn-primary">Rafraîchir</a>

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

<?php
    include 'footer.php';
?>
</body>
</html>
