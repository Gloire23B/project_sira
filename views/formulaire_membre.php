<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Formulaire de Membre</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Formulaire de Membre</h2>

            <?php if (isset($erreur_message)) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $erreur_message; ?>
                    <br>
                    <a href="#" class="btn btn-warning mt-2" onclick="window.history.back();">Réessayer</a>
                    <a href="formulaire_membre.php" class="btn btn-secondary mt-2">Annuler</a>
                </div>
            <?php endif; ?>

            <form method="post" action="../config/traitement_formulaire_membre.php">
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" class="form-control" name="login" value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" class="form-control" name="mdp" required>
                </div>

                <div class="form-group">
                    <label for="tel">Téléphone :</label>
                    <input type="text" class="form-control" name="tel" value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control" name="adresse" value="<?php echo isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="cp">Code Postal :</label>
                    <input type="text" class="form-control" name="cp" value="<?php echo isset($_POST['cp']) ? htmlspecialchars($_POST['cp']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="ville">Ville :</label>
                    <input type="text" class="form-control" name="ville" value="<?php echo isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Créer un compte</button>
                <a href="../membre.php" class="btn btn-primary">Afficher les membres</a>

                <!-- Bouton de retour à la page précedente en utilisant lhistorique de navigation-->
                <button class="btn btn-primary" onclick="retourPage()">Retour</button>
            </form>
        </div>
    </div>
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
