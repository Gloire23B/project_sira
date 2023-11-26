<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Tableau des Membres</title>
</head>
<body class="bg-light">

<!-- Barre de navigation -->
<?php include 'ad_header.php' ?>

<div class="container mt-5">
    <div class="row justify-content-between mb-3">
        <h2>Tableau des Membres</h2>
        <a href="views/formulaire_membre.php" class="btn btn-primary">Créer un Membre</a>
    </div>

    <?php
    // Récupération des données de la table membre
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM membre");
    $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //script modification & suppression
    include 'config2/traitement_modifier_membre.php';

    // Affichage du tableau
    if (count($membres) > 0) :
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Membre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Login</th>
                <th>Mot de Passe</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Statut</th>
                <th>Date d'Inscription</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($membres as $membre) : ?>
                <tr>
                    <td><?php echo $membre['id_membre']; ?></td>
                    <td><?php echo $membre['prenom']; ?></td>
                    <td><?php echo $membre['nom']; ?></td>
                    <td><?php echo $membre['login']; ?></td>
                    <td><?php echo $membre['mdp']; ?></td>
                    <td><?php echo $membre['tel']; ?></td>
                    <td><?php echo $membre['email']; ?></td>
                    <td><?php echo $membre['adresse']; ?></td>
                    <td><?php echo $membre['cp']; ?></td>
                    <td><?php echo $membre['ville']; ?></td>
                    <td><?php echo $membre['statut']; ?></td>
                    <td><?php echo $membre['date_inscription']; ?></td>

                    <td>
                         <a href="?action=update&id=<?php echo $membre['id_membre']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                         <a href="?action=delete&id=<?php echo $membre['id_membre']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun membre disponible pour le moment.</p>
    <?php endif; ?>
    <a href="membre.php" class="btn btn-primary">Rafraîchir</a>
    
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
