<?php
require_once 'App/Models/M_Category.php';
require_once 'App/Models/M_Event.php';
require_once 'App/Models/M_Sub_Category.php';
require_once 'App/Models/M_Connection.php';
?>

<header id="big">

    <div id="logo">
        <a href="index.php?uc=home"><img src="./././Public/Image/Logo Site Lafleur.png" alt="" id="big_logo"></a>
    </div>

    <nav>

        <div id="account">
            <div id="search">
                <input type="text"> <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div id="shopping">
                <?php if (!isset($_SESSION['id'])) { ?>
                    <span><i class="fa-solid fa-user"> </i> <a href="index.php?uc=connection">Se connecter / S'inscrire</a></span>
                <?php   } else { 
                    $person = M_Connection::getInfos($_SESSION['id']);?>
                    <span><i class="fa-solid fa-user"> </i> <a href="index.php?uc=account&action=account">Bonjour <?= $person['prenom'] ?></a></span>
                <?php }   ?>


                <span><i class="fa-solid fa-cart-shopping"> <a href="index.php?uc=basket"></i> Mon Panier (<?php echo count($_SESSION['articles']); ?>)</a></span>
            </div>

        </div>

        <div id="navbar">
            <ul class="main-menu">

                <li><a href="index.php?uc=event&action=event">Nos Collections</a>
                    <ul class="sub-menu">

                        <?php
                        $events = M_Event::findEventNavBar();

                        foreach ($events as $event) { ?>
                            <li><a href="index.php?uc=sub_event&id=<?= $event['id'] ?>&action=sub_event"><?= $event['nom_evenement'] ?></a></li>
                        <?php }
                        ?>
                    </ul>
                </li>

                <?php
                $categories = M_Category::findCategoryNavBar();

                foreach ($categories as $category) { ?>
                    <li><a href="index.php?uc=category&id=<?= $category['id'] ?>&action=category"><?= $category['nom_categorie'] ?></a>
                        <ul class="sub-menu">

                            <?php
                            $subCategories = M_Sub_Category::findSubCategoryNavBar($category['id']);

                            foreach ($subCategories as $subCategory) { ?>
                                <li><a href="index.php?uc=sub_category&id=<?= $subCategory['id'] ?>&action=sub_category"><?= $subCategory['nom_sous_categorie'] ?></a></li>
                            <?php } ?>

                        </ul>
                    </li>

                <?php } ?>

                <li><a href="https://becker.needemand.com/Wordpress/">Blog</a></li>

                <li><a href="index.php?uc=contact">Contact</a></li>
            </ul>
        </div>

    </nav>

</header>
<br><br><br><br><br><br><br><br><br><br><br>