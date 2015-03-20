
<div class="co-checkoutprogressindicator">

    <div class="wrapper rbk_wrapper">
        <ul>
            <li class="inactive step-1">
                <span>1</span>Information de livraison
            </li>
            <li class="active step-2">
                <span>2</span>Récpitulatif de la facturation
            </li>
            <li class="inactive step-3">
                <span>3</span>Expédition du produit
            </li>
        </ul>
    </div>
</div>

<div class="delivery-wrapper">

    <div class="js-co-delivery">

        <div class="produit">
            <h3>Récapitulatif produit</h3>

            <?php $total_HT = 0 ?>
        <?php foreach($end as $product) : ?>

            <div class="panier_list">
                <p><?= $product['ref'] ?></p>
                <p><?= $product['name_product']?></p>
                <p><?= $product['price'] ?> € </p>
                <p><?= $product['quantity']?></p>

                <p class="priceHT"><?= $priceHT = $product['price']*$product['quantity'] ?> €</p>
                <?php $total_HT += $priceHT  ?>
            </div>
        <?php endforeach ?>


            <div class="price">
                <p class="totalHT">Total HT : <?= $total_HT ?> €</p>
                <p>TVA 20% : <?= $total_HT *0.2 ?> €</p>
                <p>TOTAL TTC : <?= $totalTTC = $total_HT *1.2 ?> €</p>
            </div>


        </div>

        <div class="adresses">
                <h3>Récapitulatif du lieu de livraison</h3>
                <div class="livraison">
                    <p><?= $rowarray['firstname'] ?></p>
                    <p><?= $rowarray['lastname']?></p>
                    <p><?= $rowarray['nbr_street'] ?>
                        <?= $rowarray['street']?></p>
                    <p><?= $rowarray['postCode']?></p>
                    <p><?= $rowarray['city']?></p>
                </div>

                <h3>Récapitulatif du lieu de facturation</h3>
                <div class="facturation">
                    <p><?= $rowarray['firstname'] ?></p>
                    <p><?= $rowarray['lastname']?></p>
                    <p><?= $rowarray['nbr_street'] ?>
                        <?= $rowarray['street']?></p>
                    <p><?= $rowarray['postCode']?></p>
                    <p><?= $rowarray['city']?></p>
                </div>

        </div>


        <div class="suite">
            <a href="<?= site_url('commande/expedition') ?>"><button>Expedition</button></a>
        </div>

