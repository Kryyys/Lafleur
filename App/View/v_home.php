<div class="scrollbar">
    <div class="images-container">
        <a href=""><img src="./Public/Image/bannière_defilante_1.png"></a>
        <a href="index.php?uc=sub_category&id=5&action=sub_category"><img src="./Public/Image/bannière_defilante_2.png"></a>
        <a href="index.php?uc=sub_category&id=8&action=sub_category"><img src="./Public/Image/bannière_defilante_3.png"></a>
    </div>
    <div class="buttons-container">
        <button class="prev-button"><i class="fa-solid fa-angle-left"></i></button>
        <button class="next-button"><i class="fa-solid fa-angle-right"></i></button>
    </div>
</div>

<br><br>

<div id="selection">
    <span class="font_title font_size_big">Notre sélection du moment</span>
    <br><br>
    <span class="font_size_medium">Découvrez notre collection de fleurs, plantes et cadeaux</span>
    <br><br>

    <div id="item_selected">

        <?php foreach ($resultArray as $result) : ?>

            <a href="index.php?uc=item&action=item&id=<?= $result['id'] ?>">

                <div class="card_item">
                    <img src="./Public/Image/<?= $result['image'] ?>" alt="<?= $result['nom'] ?>">
                    <div class="card_title">
                        <h2 class="bold"><?= $result['nom'] ?></h2>

                        <p>à partir de <span class="bold"><?= $result['prix'] ?>€</span></p>
                    </div>
                </div>

            </a>
        <?php endforeach; ?>
    </div>
</div>

<br><br>

<div id="category_display">
    <div class="category_line">
        <span class="font_title font_size_big">Fleurs, plantes, cadeaux... Tout pour trouver votre bonheur !</span>
        <br>

        <div class="category_round">

            <a href="#">
                <div class="vertical_align">
                    <div class="round">
                        <img src="./Public/Image/bouquet_festif.jpg" alt="">
                    </div>
                    <span class="font_size_medium bold">
                        Nos Collections
                    </span>
                </div>
            </a>

            <?php
            foreach ($categories as $category) {

                $resultImages = M_Category::selectImage($category['id']);
                $resultArrayImage = array();
                foreach ($resultImages as $resultImage) {
                    $resultArrayImage[] = array(
                        'image' => $resultImage['image']
                    );
                }
            ?>
                <a href="#">
                    <div class="vertical_align">
                        <div class="round">

                            <?php foreach ($resultArrayImage as $resultA) : ?>
                                <img src="./Public/Image/<?= $resultA['image'] ?>" alt="Image Catégorie">
                            <?php endforeach; ?>

                        </div>
                        <span class="font_size_medium bold">Nos <?= $category['nom_categorie'] ?></span>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <br><br>
</div>

<div id="talk_container">

    <div class="talk">
        <img src="./Public/Image/Fleurs_fraîches.png" alt="Image fleurs fraîches" width="350px">
    </div>

    <div class="talk">
        <h2 class="font_size_big font_title">Des fleurs fraîches : notre engagement</h2>
        <br><br>
        <p>Notre site de fleurs s'engage à offrir une sélection de fleurs parmi les plus fraîches et les plus belles du marché. En travaillant en étroite collaboration avec les meilleurs producteurs de fleurs, nous nous assurons que chaque tige est cueillie et transportée dans les meilleures conditions pour arriver chez vous en parfait état.</p>
        <br><br>
        <p>Notre équipe de passionnés de fleurs assemble chaque bouquet avec soin et expertise, en utilisant uniquement les variétés les plus fraîches et les plus durables. Choisissez notre site de fleurs pour vos besoins en matière de fleurs fraîches et soyez assuré de recevoir des produits de qualité supérieure.</p>
    </div>

    <div class="talk">
        <h2 class="font_size_big font_title">Lafleur livre maintenant !</h2>
        <br><br>
        <p>Le fleuriste Lafleur offre désormais un service de livraison dans les villages avoisinants de Lourmarin. Notre équipe propose une large sélection de fleurs fraîches, de plantes et de cadeaux pour tous les goûts et tous les budgets.</p>
        <p>Notre service de livraison rapide et fiable garantit que vos fleurs arriveront en parfait état et à temps pour l'occasion. Si vous habitez dans les villages environnants, contactez-nous dès aujourd'hui pour commander des fleurs et profiter de notre service de livraison pratique. Nous sommes là pour vous aider à ajouter une touche florale à votre journée !</p>
    </div>

    <div class="talk"><img src="./Public/Image/livraison.png" alt="Image livraison" width="350px"></div>

    <div class="talk"><img src="./Public/Image/blog.png" alt="Image livraison" width="350px"></div>

    <div class="talk">
        <h2 class="font_size_big font_title">Notre Blog</h2>
        <br><br>
        <p>Le blog de Guillaume Cholet, propriétaire de la boutique de fleurs Lafleur, est un lieu où la passion pour les fleurs et la photographie se rencontrent. En tant que photographe passionné, Guillaume capture les formes, les couleurs et les textures des fleurs d'une manière unique et artistique, et partage ses images à travers son blog pour inspirer ses lecteurs.</p>
        <p>En plus de sa passion pour la photographie, Guillaume est un expert en fleurs. Il utilise son expérience pour créer des bouquets uniques et personnalisés pour chaque occasion, tout en offrant des conseils et astuces sur l'entretien des fleurs à ses lecteurs. Si vous êtes passionné par la beauté des fleurs et de la photographie, ne manquez pas de consulter le blog de Guillaume pour découvrir ses créations uniques et ses idées inspirantes.</p>
    </div>

</div>