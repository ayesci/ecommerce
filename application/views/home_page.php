
<div class="welcome">
    <h3>Welcome</h3>
    <?php if(array_key_exists('username', $_SESSION)) : ?>
    <p>Hello word ! Welcome back <?= $_SESSION['username'] ?></p>
    <?php else : ?>
    <p>Hello word ! Welcome in my e-commerce website</p>
    <?php endif ?>
</div>

<div class="login">
    <h3>Login</h3>
    <a href="<?= site_url('/user/login') ?>"><button id="login"> Login </button></a>
    <a href="<?= site_url('/user/logout') ?>"><button id="logout"> Logout </button></a>
</div>

<div class="product">
    <h3>Nos produits</h3>
<p><a href="<?= site_url('/product/add_product') ?>">Ajouter un produit</a></p>
<p class="js-list-category">Catégories</p>.





