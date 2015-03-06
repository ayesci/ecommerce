
<div class="user_inscription">
    <h3>Inscription</h3>

    <?php if(array_key_exists('message', $_SESSION)) : ?>
    <p><?= $_SESSION['message'] ?></p>
    <?php endif ?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="nom"><br/>
        <input type="password" name="password" placeholder="mot de passe"><br/>
        <input type="text" name="email" placeholder="Adresse Email"><br/>
        <input type="submit">
    </form>
    <a href="<?= site_url('user/login') ?>"><button>Retour Connexion</button></a>
</div>
