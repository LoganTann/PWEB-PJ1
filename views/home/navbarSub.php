<html lang="fr">
<nav class="yellow darken-3" style="display: flex !important;">


    <?php echo $_SESSION['user_info']['nom'] ?>
    <a class="waves-effect waves-light btn btn-large modal-trigger" href="?page=accounts&action=getRentalCars">Gérer sa flotte</a>
    <a class="waves-effect waves-light btn-large" href="?page=vehicle&action=getCars">Louer un véhicule</a>
    <a class="waves-effect waves-light btn-large" href="?page=customer&action=factures"><i class="material-icons right">receipt</i>Voir vos factures</a>
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