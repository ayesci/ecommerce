
<div class="welcome">
    <h3>Welcome</h3>
    <?php if(array_key_exists('username', $_SESSION)) : ?>
    <p>Hello <?= $_SESSION['username'] ?> !</p>
    <?php else : ?>
    <p>Hello word ! Welcome in my e-commerce website</p>
    <?php endif ?>
</div>





