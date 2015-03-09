

<div class="product">

    <div id="list_categories">

        <?php foreach($categories as $cat): ?>
            <?php $products = $this->Model_Product->products_by_categories($cat['category']) ?>

            <h4 class="js-category">Catégorie<?= $cat['category'] ?></h4>

            <div class="product_cat">
                <?php $this->load->view('product_list', ['products'=>$products]) ?>
            </div>
        <?php endforeach; ?>

    </div>
</div>