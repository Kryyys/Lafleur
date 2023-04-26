<br><br><br><br>

<div id="category_title">
    <span class="font_title font_size_big">Nos collections : trouvez le bouquet parfait pour chaque événement !</span>
    <br><br>
    <span class="font_size_medium">Pour un anniversaire ou pour de simples remerciements, Lafleur vous propose un large choix de produits</span>
</div>


<div class="category_round wrap_event">
    <?php
    foreach ($events as $event) {

        $resultImages = M_Event::selectImageEvent($event['id']);
        $resultArrayImage = array();
        foreach ($resultImages as $resultImage) {
            $resultArrayImage[] = array(
                'image' => $resultImage['image']
            );
        }
    ?>
        <a href="index.php?uc=sub_event&id=<?= $event['id'] ?>&action=sub_event">
            <div class="vertical_align margin_bottom_event">
                <div class="round">

                    <?php foreach ($resultArrayImage as $resultA) : ?>
                        <img src="./Public/Image/<?= $resultA['image'] ?>" alt="Image Evènement">
                    <?php endforeach; ?>

                </div>
                <span class="font_size_medium bold"><?= $event['nom_evenement'] ?></span>
            </div>
        </a>
    <?php } ?>
</div>

<br>

<div id="sub_category_display">
    <?php foreach ($events as $event) { ?>

        <div class="sub_category_container">
            <span class="font_title font_size_medium"><?= $event['nom_evenement'] ?></span>
            <br><br>
            <div class="sub_category_list">
                <?php
                $items = M_Item::findItemsByEvent($event['id'], 4);
                foreach ($items as $result) : ?>
                    <a href="index.php?uc=item&action=item&id=<?= $result['id'] ?>">
                        <div class="card_item card_sub_category">
                            <img src="./Public/Image/<?= $result['image'] ?>" alt="<?= $result['nom'] ?>">
                            <div class="card_title">
                                <h2 class="bold"><?= $result['nom'] ?></h2>
                                <p>à partir de <span class="bold"><?= $result['prix_unitaire'] ?>€</span></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>

                <a href="index.php?uc=sub_event&id=<?= $event['id'] ?>&action=sub_event" class="see_sub_category">

                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <span>Voir tout</span>

                </a>

            </div>
        </div>
    <?php } ?>

</div>