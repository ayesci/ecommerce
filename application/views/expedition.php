
<div class="co-checkoutprogressindicator">

    <div class="wrapper rbk_wrapper">
        <ul>
            <li class="inactive step-1">
                <span>1</span>Information de livraison
            </li>
            <li class="inactive step-2">
                <span>2</span>Récpitulatif de la facturation
            </li>
            <li class="active step-3">
                <span>3</span>Expédition du produit
            </li>
        </ul>
    </div>
</div>

<div class="expedition">
    <h3>Merci pour vos achats <?= $_SESSION['username'] ?> !</h3>
    <?php if(array_key_exists('username', $_SESSION)) : ?>
        <p>La commande sera expédiée sous 3 jours.</p>
    <?php endif ?>
</div>