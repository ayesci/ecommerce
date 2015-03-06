

    <?php foreach($products as $product) : ?>

        <div class="icon_product">
            <a href="<?= site_url('/product/product_details/'.$product['id']) ?>">
            <h3>Produit n°<?= $product['ref'] ?></h3></a>

            <a href="<?= site_url('/product/product_details/'.$product['id']) ?>">
            <img src="<?= base_url().$product['picture'] ?>"/></a>

            <p>Nom : <?= $product['name_product'] ?></p>

            <p>Prix : <?= $product['price'] ?> €</p>

        </div>

    <?php endforeach; ?>


