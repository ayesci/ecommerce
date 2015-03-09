
<aside class="search_product">

    <form action="" method="post">
        <fieldset>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="nom exacte">
            <input type="submit" id="submit" value="trier">
        </fieldset>
    </form>

    <form action="" method="post">
        <fieldset>
            <label for="ref">Réf-Produit</label>
            <input type="text" name="ref" id="ref" placeholder="référence produit">
            <input type="submit" id="submit" value="trier">
        </fieldset>
    </form>

    <form action="" method="post">
        <fieldset>
            <label for="price">Prix</label><br/>
            <input type="text" name="min_price" id="min_price" placeholder="min" value="<?= $min ?>">
            <span> à </span>
            <input type="text" name="max_price" id="max_price" placeholder="max" value="<?= $max ?>"><span>€</span><br/>

            <input type="submit" id="submit" value="trier">
        </fieldset>
    </form>

    <form action="" method="post">
        <fieldset>
            <label for="owner">Possesseur</label><br/>
            <select name="owner" id="owner">
                <option value="%"> -- </option>
                <?php foreach($owners as $owner) : ?>
                <option <?= ($current_owner == $owner['owner']?"selected":"") ?> >
                    <?= $owner['owner'] ?>
                </option>
                <?php endforeach ?>
            </select>
            <button type="submit" id="owner">OK</button>
        </fieldset>
    </form>

</aside>



