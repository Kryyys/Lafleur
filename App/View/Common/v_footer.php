<div id="flower_banner">

</div>

<?php
if (isset($_GET['uc']) && $_GET['uc'] == 'home') { ?>
    <div id="fresh_banner">
        <div id="fresh_banner_background">
            <div id="fresh_talk_container">

                <div class="fresh_talk">
                    <img src="./././Public/Image/camion_banniere.png" alt="Logo livraison à domicile" width="100px">
                </div>

                <div class="fresh_talk">
                    <img src="./././Public/Image/boutique_banniere.png" alt="Logo boutique" width="100px">
                </div>

                <div class="fresh_talk">
                    <img src="./././Public/Image/fleur_banniere.png" alt="Logo création artisanale" width="100px">
                </div>

                <div class="fresh_talk">
                    <img src="./././Public/Image/ok_banniere.png" alt="Logo fraîcheur" width="100px">
                </div>

                <div class="fresh_talk">
                    <h2 class="font_size_medium bold">LIVRAISON À DOMICILE</h2>
                    <br><br>
                    <p>Livraison en un jour sur Lourmatin et ses alentours</p>
                </div>

                <div class="fresh_talk">
                    <h2 class="font_size_medium bold">RETRAIT EN MAGASIN</h2>
                    <br><br>
                    <p>Retrait en 2h en magasin</p>
                    <br>
                </div>

                <div class="fresh_talk">
                    <h2 class="font_size_medium bold">CRÉATION ARTISANALE</h2>
                    <br><br>
                    <p>Nos créations sont réalisées à la main avec beaucoup de passion</p>
                </div>


                <div class="fresh_talk">
                    <h2 class="font_size_medium bold">GARANTIE FRAÎCHEUR</h2>
                    <br><br>
                    <p>Tenue Longue Durée</p>
                    <br>
                </div>

            </div>
        </div>
    <?php }
    ?>
    <footer>
        <div id="footer">
            <div class="footer_container"> 
                <div class="padding_list">
                    <h2 class="bold"><a href="index.php?uc=event&action=event">Nos Collections</a></h2>
                    <ul class="footer_list">
                        <?php
                        $events = M_Event::findEvent();
                        foreach ($events as $event) { ?>
                            <li><a href="index.php?uc=sub_event&id=<?= $event['id'] ?>&action=sub_event"><?=$event['nom_evenement']?></a></li>
                        <?php }
                        ?>
                    </ul>
                </div>

                <?php
                $categories = M_Category::findCategoryNavBar();

                foreach ($categories as $category) { ?>
                    <div class="padding_list">
                        <h2 class="bold"><a href="index.php?uc=category&id=<?= $category['id'] ?>&action=category"><?= $category['nom_categorie'] ?></a></h2>

                        <ul class="footer_list">

                            <?php
                            $subCategories = M_Sub_Category::findSubCategoryNavBar($category['id']);

                            foreach ($subCategories as $subCategory) { ?>
                                <li><a href="index.php?uc=sub_category&id=<?= $subCategory['id'] ?>&action=sub_category"><?= $subCategory['nom_sous_categorie'] ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                <?php } ?>

                <div class="padding_list">
                    <h2 class="bold propos">A Propos</h2>

                    <ul class="footer_list">
                        <li><a href="https://becker.needemand.com/Wordpress/">Notre Blog</a></li>
                        <li><a href="index.php?uc=about">Qui sommes-nous ?</a></li>
                        <li><a href="index.php?uc=contact">Contactez-nous</a></li>
                    </ul>

                </div>
            </div>

            <div id="talk_footer">

                <div>
                    <ul class="wrapper">
                        <li class="icon facebook">
                            <span class="tooltip">Facebook</span>
                            <span><i class="fab fa-facebook-f"></i></span>
                        </li>
                        <li class="icon twitter">
                            <span class="tooltip">Twitter</span>
                            <span><i class="fab fa-twitter"></i></span>
                        </li>
                        <li class="icon instagram">
                            <span class="tooltip">Instagram</span>
                            <span><i class="fab fa-instagram"></i></span>
                        </li>
                    </ul>
                </div>

                <div>
                    <ul class="talk_list">
                        <li>Lafleur - Boutique de Fleurs</li>
                        <li>89, avenue de la rivière</li>
                        <li>89160 LOURMARIN</li>
                        <li>0378037595</li>
                        <li>lafleur@gmail.com</li>
                    </ul>
                </div>

                <div>
                    <h2 class="bold talk_title">HORAIRES</h2>
                    <ul class="talk_list">
                        <li>Du lundi au vendredi</li>
                        <li>9h - 12h et 13h30 - 18h</li>
                        <li>Le samedi</li>
                        <li>10h - 12h et 13h30 - 17h</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div id="copyright">
        <span>Lafleur 2023 © Tous droits réservés</span>
    </div>

    </footer>