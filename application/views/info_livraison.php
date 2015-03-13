

<div class="co-checkoutprogressindicator">

    <div class="wrapper rbk_wrapper">
        <ul>
            <li class="active step-1 layer _2">
                <span>1</span>Information de livraison
            </li>
            <li class="inactive step-2 layer _2">
                <span>2</span>Récpitulatif de la facturation
            </li>
            <li class="inactive step-3 layer _2">
                <span>3</span>Fin de l'achat
            </li>

        </ul>
    </div>
</div>

<div class="delivery-wrapper">

    <div class="js-co-delivery">

        <form action="<?= site_url('commande/info_to_db') ?>" method="post" class="address">

            <fieldset>
                <h3>Adresse de livraison</h3>
                <input type="checkbox" name="checkbox" class="address">
                <span>Adresse de livraison = Adresse de facturation</span><br/>

                <input type="text" name="firstname_liv" placeholder="Prénom">
                <input type="text" name="lastname_liv" placeholder="Nom">
                <input type="text" name="nbr_street_liv" placeholder="N°">
                <input type="text" name="street_liv" placeholder="rue">
                <input type="text" name="postCode_liv" placeholder="Code Postal">
                <input type="text" name="city_liv" placeholder="Ville">
                <input type="hidden" name="user_id">
            </fieldset>

            <fieldset class="js-facturation">
                <h3>Adresse de facturation</h3>
                <input type="text" name="firstname_fac" placeholder="Prénom">
                <input type="text" name="lastname_fac" placeholder="Nom">
                <input type="text" name="nbr_street_fac" placeholder="N°">
                <input type="text" name="street_fac" placeholder="rue">
                <input type="text" name="postCode_fac" placeholder="Code Postal">
                <input type="text" name="city_fac" placeholder="Ville">
                <input type="hidden" name="user_id">
            </fieldset>

            <fieldset>
                <h3>Coordonnées</h3>
                <input type="text" name="phone" placeholder="Numéro de téléphone">
            </fieldset>

            <input type="submit" value="Valider">

        </form>

        <p>Livraison<em>gratuite</em></p>
    </div>

</div>


