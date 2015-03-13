<div class="all_products_panier">

    <p><?= $message ?></p>

    <?php $total_HT = 0 ?>

    <?php if(!empty($articles)) : ?>
    <?php foreach($articles as $article) : ?>

        <div class="panier_list">
            <img src="<?= base_url().$article['picture'] ?>"/>
            <p><?= $article['ref'] ?></p>
            <p><?= $article['name_product']?></p>
            <p><?= $article['price'] ?> € </p>

            <form action="<?= site_url('panier/update_quantity') ?>" method="post" class="quantity">
                <label for="quantity">Quantité : </label>
                <input type="number" name="quantity" id="quantity" value="<?= $article['quantity'] ?>" placeholder="1">
                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                <input type="submit" class="hidden">
            </form>

            <p class="priceHT"><?= $priceHT = $article['price']*$article['quantity'] ?> €</p>
            <?php $total_HT += $priceHT  ?>

            <a href="<?= site_url('/panier/delete/'.$article['id_panier']) ?>"><i class="fa fa-trash-o"></i></a>
        </div>
    <?php endforeach ?>
    <?php endif ?>

    <?php if(!empty($total_HT)) : ?>
    <div class="price">
        <p class="totalHT">Total HT : <?= $total_HT ?> €</p>
        <p>TVA 20% : <?= $total_HT *0.2 ?> €</p>
        <p>TOTAL TTC : <?= $totalTTC = $total_HT *1.2 ?> €</p>
        <a href="<?= site_url('commande/livraison') ?>"><button>Valider ma commande</button></a>
    </div>
    <?php endif ?>


    <a href="<?= site_url('product/all_product') ?>"><button>Poursuivre mes achats</button></a>


</div>