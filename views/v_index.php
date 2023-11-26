<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Carrousel de Voitures de Sport</title>
    <style>
        .carousel-caption {
            text-align: center;
        }

        .custom-buttons {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>

<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/v1.jpg" class="d-block w-100" alt="Voiture de sport 1">
            <div class="carousel-caption d-none d-md-block">
                <!-- Contenu facultatif pour chaque image -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/v2.jpg" class="d-block w-100" alt="Voiture de sport 2">
            <div class="carousel-caption d-none d-md-block">
                <!-- Contenu facultatif pour chaque image -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/v3.jpg" class="d-block w-100" alt="Voiture de sport 3">
            <div class="carousel-caption d-none d-md-block">
                <!-- Contenu facultatif pour chaque image -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/v4.jpg" class="d-block w-100" alt="Voiture de sport 4">
            <div class="carousel-caption d-none d-md-block">
                <!-- Contenu facultatif pour chaque image -->
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
    
    <!-- Boutons de Connexion et Inscription au milieu du carrousel -->
    <div class="custom-buttons">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexionModal">Connexion</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inscriptionModal">Inscription</button>
    </div>
</div>


<!-- Script pour activer le carrousel Bootstrap -->
<script>
    $('.carousel').carousel();
</script>



<!-- Modal de Connexion -->
<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="connexionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="connexionModalLabel">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ajoutez ici le contenu de votre formulaire de connexion -->

                <?php include 'formulaire_connexion.php' ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'Inscription -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inscriptionModalLabel">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ajoutez ici le contenu de votre formulaire d'inscription -->

                <?php include 'formulaire_membre.php' ?>
                        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php include '../footer.php' ?>

</body>
</html>
