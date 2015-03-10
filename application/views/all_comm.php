

<div class="all_comm">

    <a href="<?= site_url('/product/avis/'.$products['id']) ?>"><button>Ajouter un commentaire</button></a>

    <?php for($i=0; $i<sizeof($avis); $i++) : ?>

        <div class="comm">
            <?php if(!empty($avis[$i]['parent'])): ?>

                <p><?= $avis[$i]['title'] ?>
                <?php for($j=0; $j<$avis[$i]['note']; $j++) : ?>
                    <p class="glyphicon glyphicon-star" style="color:goldenrod"></p>
                <?php endfor ?>
                <?php for(; $j<5; $j++) : ?>
                    <p class="glyphicon glyphicon-star-empty"></p>
                <?php endfor ?>
                </p>

                <p>
                <i class="fa fa-user"></i><?= $avis[$i]['name'] ?>
                <i class="fa fa-clock-o"></i><?= $avis[$i]['date'] ?>
                </p>

                <p>
                <em><i class="fa fa-comment"></i><?= $avis[$i]['content'] ?></em>
                </p>
                <hr/>
            <?php endif ?>
        </div>

    <?php endfor  ?>

</div>