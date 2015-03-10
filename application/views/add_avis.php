

<div class="add_avis">
    <h3>Donner votre avis !</h3>

    <div class="img_icon">
        <p><?= $products['name_product'] ?></p>
        <img src="<?= base_url().$products['picture'] ?>"/>
    </div>

    <form action="" method="post">
        <label for="notation">Notation</label>
        <select name="note">
            <option value="5" selected>Excellent</option>
            <option value="4">Plutôt bien</option>
            <option value="3">Moyen</option>
            <option value="2">Pas fiable</option>
            <option value="1">Tout pourri</option>
        </select><br/>
        <input type="text" name="title" placeholder="titre"><br/>
        <textarea name="content" placeholder="commentaire"></textarea><br/>
        <input type="submit" value="publier">
    </form>

</div>