<br><br><br><br>

<?php
$id = $_GET['id'];
$category = M_Category::findCategoryById($id);
?>

<div id="category_title">
    <span class="font_title font_size_big"><?= $category['titre'] ?></span>
    <br><br>
    <span class="font_size_medium"><?= $category['description'] ?></span>
</div>


<div class="category_round center">
    <?php
    foreach ($subCatgories as $subCategory) {

        $resultImages = M_Sub_Category::selectImageSub($subCategory['id']);
        $resultArrayImage = array();
        foreach ($resultImages as $resultImage) {
            $resultArrayImage[] = array(
                'image' => $resultImage['image']
            );
        }
    ?>
        <a href="index.php?uc=sub_category&id=<?= $subCategory['id'] ?>&action=sub_category">
            <div class="vertical_align">
                <div class="round">

                    <?php foreach ($resultArrayImage as $resultA) : ?>
                        <img src="./Public/Image/<?= $resultA['image'] ?>" alt="Image Catégorie">
                    <?php endforeach; ?>

                </div>
                <span class="font_size_medium bold">Nos <?= $subCategory['nom_sous_categorie'] ?></span>
            </div>
        </a>
    <?php } ?>
</div>

<br>

<div id="sub_category_display">
    <?php foreach ($subCategoryDisplay as $subCategory) { ?>
        <div class="sub_category_container">
            <span class="font_title font_size_medium"><?= $subCategory['nom_sous_categorie'] ?></span>
            <br><br>
            <div class="sub_category_list">
                <?php
                $items = M_Item::findItemsBySubCategory($subCategory['id'], 4);
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

                <a href="index.php?uc=sub_category&id=<?= $subCategory['id'] ?>&action=sub_category" class="see_sub_category">

                    <span><i class="fa-solid fa-arrow-right"></i></span>
                    <span>Voir tout</span>

                </a>

            </div>
        </div>
    <?php } ?>

</div>