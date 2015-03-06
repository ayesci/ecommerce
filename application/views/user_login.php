
<div class="user_login">
    <h3>Connexion</h3>

    <?php if(array_key_exists('message', $_SESSION)) : ?>
    <p><?= $_SESSION['message'] ?></p>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>

    <form action="" method="post">
        <input type="text" name="name" placeholder="nom"><br/>
        <input type="password" name="password" placeholder="mot de passe"><br/>
        <input type="submit">
    </form>
    <p>Nouveau ? <a href="<?= site_url('/user/inscription') ?>">Inscrivez-vous</a></p>

</div>


