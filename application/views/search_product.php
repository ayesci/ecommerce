
<div class="search_product">
    <form action="" method="post">
        <fieldset>
            <label for="price">Prix</label>
            <span> entre </span>
            <input type="number" name="min_price" id="min_price" placeholder="min" value="<?= $min ?>">
            <span> et </span>
            <input type="number" name="max_price" id="max_price" placeholder="max" value="<?= $max ?>">
            <span> € </span>

            <input type="submit">
        </fieldset>
    </form>
</div>