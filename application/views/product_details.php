

<div class="product_details">

    <div class="carousel">
        <figure>
            <?php for($i=0; $i<sizeof($carousel); $i++) : ?>
                <div class="img_carousel">
                <?php if(!empty($carousel[$i]['parent'])): ?>
                        <img src="<?= base_url($carousel[$i]['picture']) ?>"/>
                <?php endif ?>
                </div>
            <?php endfor  ?>
        </figure>
    </div>

    <div class="details">

        <div class="img_icon">
            <img src="<?= base_url().$products['picture'] ?>"/>
        </div>

        <div class="charateristic">
            <div class="db">
                <p class="name"><?= $products['name_product'] ?></p>
                <p class="price"><?= $products['price'] ?> €</p>
                <p>Référence : <?= $products['ref'] ?></p>
                <p>Catégorie produit : <?= $products['category'] ?></p>
                <p>Possesseur : <?= $products['owner'] ?></p>
            </div>

        <div class="avis">
            <?php for($j=0; $j<$moy; $j++) : ?>
                <p class="glyphicon glyphicon-star" style="color:goldenrod"></p>
            <?php endfor ?>
            <?php for(; $j<5; $j++) : ?>
                <p class="glyphicon glyphicon-star-empty"></p>
            <?php endfor ?>
             <button>Voir les avis</button>
        </div>
        </div>

        <div class="panier">
            <a href="<?= site_url('/panier/add_articles/'.$id)?>"><button><i class="fa fa-cart-arrow-down" style="font-size:20px"></i>Panier</button></a>
        </div>

        <div class="description">
            <p>Description : <em><?= $products['description']?></em></p>
        </div>

    </div>

</div>



