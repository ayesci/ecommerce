

<div id="list_categories" class="hide">

    <?php foreach($categories as $cat): ?>
        <?php $products = $this->Model_Product->products_by_categories($cat['category']) ?>

<!--            <a href="--><?//= site_url('/product/products_by_categories/'.$cat['category']) ?><!--">-->
        <h3 class="js-category">Catégorie<?= $cat['category'] ?></h3>

    <div class="product_cat hide">
        <?php $this->load->view('product_list', ['products'=>$products]) ?>
    </div>
    <?php endforeach; ?>




</div> <!-- end div#list-categories -->
</div> <!-- end div.product -->




