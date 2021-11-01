
<div class="container">
<?php if(empty($data['connected'])): ?>

    <div class="card-panel <?= $data['box-color'] ?> lighten-1">
        <?= $data['box-message']; ?>
    </div>

    <form action="?page=admin&action=index" method="post">
        <div class="row">
            <div class="input-field col s12 m10 push-m1">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Mot de passe</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field center col s6 m5 push-m1">
                <a class="btn waves-effect waves-light" href="?">
                    <i class="material-icons left">home</i> Page d'accueil
                </a>
            </div>
            <div class="input-field center col s6 m5">
                <button class="btn waves-effect waves-light" type="submit">
                    Connection <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>

<?php else: ?>

    <h1>Bienvenue sur l'espace admin !</h1>

    <a href="?page=admin&action=logout" class="btn">
        <i class="material-icons left">cloud_off</i> Se déconnecter
    </a>

<?php endif; ?>
</div>

