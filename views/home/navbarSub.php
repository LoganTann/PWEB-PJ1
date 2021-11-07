<html lang="fr">
<nav class="yellow darken-3" style="display: flex !important;">
    <a href="#" style="margin-left: 20px" class="brand-logo"><img class="img-format" src="views\home\logo.png"></img></a>

    <?php echo $_SESSION['user_info']['nom'] ?>
    <a class="waves-effect waves-light btn btn-large modal-trigger" href="?page=accounts&action=getRentalCars">Gérer sa flotte</a>
    <a class="waves-effect waves-light btn-large" href="?page=vehicle&action=getCars">Louer un véhicule</a>
    <a class="waves-effect waves-light btn btn-large modal-trigger" href="#modal1">Se déconnecter</a>
</nav>

<div id="modal1" class="modal" style="width: 33% !important;">
    <div class="modal-content">
        <h4>Êtes vous sûr de vouloir quitter ?</h4>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
        <a href="?page=home&action=index" class="modal-close waves-effect waves-green btn-flat">Déconnexion</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {});
    });
</script>

<style>
    .bg-custom-1 {
        background-color: #85144b;
    }

    .bg-custom-2 {
        background-image: linear-gradient(15deg, #ffffff 0%, #f9a825 100%);
    }

    .img-format {
        left: 0;
        width: 50%;
        height: auto;
    }
</style>