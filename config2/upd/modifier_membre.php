<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Modifier Membre</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Modifier Membre</h2>

            <?php
            // Récupération de l'ID du membre à modifier depuis l'URL
            $id_membre = isset($_GET['id_membre']) ? $_GET['id_membre'] : null;

            // Vérification de l'existence de l'ID
            if (!$id_membre) {
                echo "<p class='text-danger'>Aucun ID de membre spécifié.</p>";
            } else {
                // Récupération des informations du membre depuis la base de données
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=23_24_b2_projet_sira", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre");
                $stmt->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
                $stmt->execute();

                $membre = $stmt->fetch(PDO::FETCH_ASSOC);

                // Vérification de l'existence du membre
                if (!$membre) {
                    echo "<p class='text-danger'>Aucun membre trouvé avec l'ID spécifié.</p>";
                } else {
                    ?>
                    <!-- Affichage du formulaire de modification -->
                    <form method="post" action="../traitement_modifier_membre.php">
                        <input type="hidden" name="id_membre" value="<?php echo $membre['id_membre']; ?>">

                        <!-- Ajoutez les champs du formulaire ici -->
                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $membre['prenom']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $membre['nom']; ?>" >
                        </div>
                        
                        <div class="form-group">
                            <label for="login">Login :</label>
                            <input type="text" class="form-control" name="login" value="<?php echo ['login']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="mdp">Mot de passe :</label>
                            <input type="password" class="form-control" name="mdp" value="<?php echo ['mdp']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tel">Téléphone :</label>
                            <input type="text" class="form-control" name="tel" value="<?php echo ['tel']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" name="email" value="<?php echo ['email']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse :</label>
                            <input type="text" class="form-control" name="adresse" value="<?php echo ['adresse']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="cp">Code Postal :</label>
                            <input type="text" class="form-control" name="cp" value="<?php echo ['cp']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville :</label>
                            <input type="text" class="form-control" name="ville" value="<?php echo ['ville']; ?>" >
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
