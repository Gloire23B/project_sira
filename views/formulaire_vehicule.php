<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Formulaire de Véhicule</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Ajouter un Véhicule</h2>

            <?php if (isset($erreur_message)) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $erreur_message; ?>
                    <br>
                    <a href="#" class="btn btn-warning mt-2" onclick="window.history.back();">Réessayer</a>
                    <a href="formulaire_vehicule.php" class="btn btn-secondary mt-2">Annuler</a>
                </div>
            <?php endif; ?>

            <form method="post" action="../config/traitement_formulaire_vehicule.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="marque">Marque :</label>
                    <input type="text" class="form-control" name="marque" value="<?php echo isset($_POST['marque']) ? htmlspecialchars($_POST['marque']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle :</label>
                    <input type="text" class="form-control" name="modele" value="<?php echo isset($_POST['modele']) ? htmlspecialchars($_POST['modele']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="prix_journalier">Prix Journalier :</label>
                    <input type="text" class="form-control" name="prix_journalier" value="<?php echo isset($_POST['prix_journalier']) ? htmlspecialchars($_POST['prix_journalier']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea class="form-control" name="description"><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image :</label>
                    <input type="file" class="form-control-file" name="image" accept=".jpg, .jpeg, .png, .gif">
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="../vehicule.php" class="btn btn-primary">Afficher les voitures disponibles</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
