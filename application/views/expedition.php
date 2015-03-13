

<div class="expedition">
    <h3>Merci pour vos achats <?= $_SESSION['username'] ?> !</h3>
    <?php if(array_key_exists('username', $_SESSION)) : ?>
        <p>La commande sera expédiée sous 3 jours.</p>
    <?php endif ?>
</div>