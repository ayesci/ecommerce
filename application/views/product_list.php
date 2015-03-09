
<div class="product">

    <?php foreach($products as $product) : ?>

        <div class="icon_product">

            <a href="<?= site_url('/product/product_details/'.$product['id']) ?>">
            <img src="<?= base_url().$product['picture'] ?>"/></a>

            <p>Nom : <?= $product['name_product'] ?></p>
            <p>Ref : <?= $product['ref'] ?></p>
            <p>Prix : <?= $product['price'] ?> €</p>
            <p>Possesseur : <?= $product['owner'] ?></p>

        </div>

    <?php endforeach; ?>

</div>
