<div class="js-nav-bar">

    <?php $show_topCategories = $this->Model_Product->get_topCategories(); ?>
    <?php for($i=0; $i<sizeof($show_topCategories); $i++) : ?>

    <div class="js-parent">
    <h3><a href="<?= site_url('/product/products_by_categories/'.$show_topCategories[$i]['name']) ?>"><?= $show_topCategories[$i]['name'] ?></a></h3>
        <?php $show_subCategories = $this->Model_Product->get_subCategories($show_topCategories[$i]['id']); ?>
        <?php for($j=0; $j<sizeof($show_subCategories); $j++) : ?>
            <p><?= $show_subCategories[$j]['name'] ?></p>
        <?php endfor ?>
    </div>

    <?php endfor ?>

    <div class="plus">
        <ul>
            <li><a href="<?= site_url('/product/all_product/') ?>">Tous les produits</a></li>
            <li><a href="<?= site_url('/product/search_product/') ?>">Recherche avancée</a></li>
            <li><a href="<?= site_url('/product/add_product') ?>">Ajouter un produit</a></li>
        </ul>
    </div>
</div>