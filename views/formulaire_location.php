<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Formulaire de Location</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Formulaire de Location</h2>

            <?php if (isset($message)) : ?>
                <div class="alert alert-success text-center">
                    <?php echo $message; ?>
                    <br>
                    <a href="." class="btn btn-primary mt-2">Rafraîchir</a>
                </div>
            <?php elseif (isset($erreur_message)) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $erreur_message; ?>
                    <br>
                    <a href="." class="btn btn-warning mt-2" onclick="window.history.back();">Réessayer</a>
                    <a href="." class="btn btn-secondary mt-2">Annuler</a>
                </div>
            <?php endif; ?>

            <form method="post" action="../config/traitement_formulaire_location.php">
                <div class="form-group">
                    <label for="id_client">ID Client :</label>
                    <input type="text" class="form-control" name="id_client" required>
                </div>

                <div class="form-group">
                    <label for="id_vehicule">ID Véhicule :</label>
                    <input type="text" class="form-control" name="id_vehicule" required>
                </div>

                <div class="form-group">
                    <label for="id_agence">ID Agence :</label>
                    <input type="text" class="form-control" name="id_agence" required>
                </div>

                <div class="form-group">
                    <label for="dateDebut">Date de Début :</label>
                    <input type="date" class="form-control" name="dateDebut" required>
                </div>

                <div class="form-group">
                    <label for="dateFin">Date de Fin :</label>
                    <input type="date" class="form-control" name="dateFin" required>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer la demande</button>
                <a href="../location.php" class="btn btn-primary">Voir les demandes en cours</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
