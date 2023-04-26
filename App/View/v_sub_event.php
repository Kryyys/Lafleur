<br><br><br><br>

<?php
$id = $_GET['id'];
$subEvent = M_Event::findSubEventById($id);
?>

<div id="category_title">
    <span class="font_title font_size_big"><?= $subEvent['nom_evenement'] ?></span>
</div>

<div id="path_sort">

    <div id="path">
        <span>
            <a href="index.php?uc=home"><i class="fa-solid fa-house"></i></a>
        </span>

        <span>
            >
        </span>

        <span>
            <a href="index.php?uc=event&action=event">Nos Collections</a>
        </span>

        <span>
            >
        </span>

        <span>
            <?= $subEvent['nom_evenement'] ?>
        </span>
    </div>
    <div id="sort">
        <span>
            <i class="fa-solid fa-arrow-down-wide-short"></i>
        </span>

        <span>
            Trier
        </span>

        <span id="separator">
            |
        </span>

        <span>
            Filtrer
        </span>

        <span>
            <i class="fa-solid fa-list"></i>
        </span>

    </div>
</div>

<div id="displayItem" class="margin_sub_category">
    <div class="sub_category_list wrap">
        <?php
        $items = M_Item::findItemsByEventAll($subEvent['id']);
        foreach ($items as $result) : ?>
            <a href="index.php?uc=item&action=item&id=<?= $result['id'] ?>">
                <div class="card_item card_sub_category margin_card">
                    <img src="./Public/Image/<?= $result['image'] ?>" alt="<?= $result['nom'] ?>">
                    <div class="card_title">
                        <h2 class="bold"><?= $result['nom'] ?></h2>
                        <p>à partir de <span class="bold"><?= $result['prix_unitaire'] ?>€</span></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>