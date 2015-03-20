
<div class="product_info_block_top glp-breadcrumbs clearfix">

    <div class="rbk_wrapper">
        <ul id="breadcrumb" class="breadcrumb clearfix">
            <li class="back">
                <a id="back" title="Retour" href="#">Retour</a>
            </li>
            <li class="home">
                <a title="Accueil" href="http://localhost/Projet/e-commerce/index.php">Accueil</a>
            </li>
            <li>
                <span class="divider">/</span>
                <a href="http://localhost/Projet/e-commerce/index.php/product/all_product">Produit</a>
            </li>
            <li>
                <?php foreach($links as $name=>$link): ?>
                    <p><a href="<?= $link ?>"><?= $name ?></a></p>
                <?php endforeach ?>
            </li>
        </ul>
    </div>

</div>