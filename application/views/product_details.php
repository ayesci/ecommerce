

<div class="product_details">

    <div id="image-carousel">
        <figure>
            <?=  $this->load->Model_Product->get_picture_product($product['id']) ?>
            <?php for($i=0; $i<sizeof($img); $i++) : ?>
            <?php   ?>

            <img src="<?= site_url('/product/product_details/'.$product['id'])?> "/>

            <a>bla bla bla</a>

        </figure>
    </div>

    <figure>
        <img src="<?= base_url().$products['picture'] ?>"/>
    </figure>

    <div class="details">
        <p>Nom : <?= $products['name_product'] ?></p>
        <p>Ref : <?= $products['ref'] ?></p>
        <p>Categorie : <?= $products['category'] ?> €</p>
        <p>Prix : <?= $products['price'] ?> €</p>
        <p>Possesseur : <?= $products['owner'] ?></p>
    </div>


    <div class="description">
        <p>Description : <?= $products['description'] ?> </p>
    </div>

</div>

