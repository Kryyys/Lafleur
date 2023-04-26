<br><br><br><br><br>
<main>

    <div id="item_display">

        <div id="item_image">
            <img src="./Public/Image/<?= $item['image'] ?>" alt="Image de <?= $item['nom'] ?>">
        </div>

        <div id="item_shop">

            <div id="path_item">
                <span>
                    <a href="index.php?uc=home"><i class="fa-solid fa-house"></i></a>
                </span>

                <span>
                    >
                </span>

                <span>
                    <a href="index.php?uc=category&id=<?= $item['categorie_id'] ?>&action=category"><?= $item['nom_categorie'] ?></a>
                </span>

                <span>
                    >
                </span>

                <span>
                    <a href="index.php?uc=sub_category&id=<?= $item['sous_categorie_id'] ?>&action=sub_category"><?= $item['nom_sous_categorie'] ?></a>
                </span>

                <span>
                    >
                </span>

                <span>
                    <?= $item['nom'] ?>
                </span>
            </div>

            <div id="item_title">
                <span class="font_title font_size_big"><?= $item['nom'] ?></span>
            </div>

            <div id="line"></div>

            <div id="price">
                <span class="font_title font_size_big"><?= $item['prix_unitaire'] ?> €</span>
            </div>

            <div id="form_quantity">
                <?php if ($item['quantite_dispo'] == 0) { ?>
                    <span class="out_of_stock bold">Actuellement Indisponible</span>
                <?php } else { ?>
                    <?php if (isset($message)) : ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>

                    <form action="index.php?uc=basket&action=addToBasket" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div id="counter">
                            <label for="quantite" class="bold">Quantité :</label>
                            <span class="down" onClick='decreaseCount(event, this)'>-</span>
                            <input type="text" name="quantite" value="1" class="text_quantity">
                            <span class="up" onClick='increaseCount(event, this)'>+</span>
                        </div>
                        <input type="submit" value="Ajouter au panier" name="Ajouter au panier" class="button">
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>


    <div id="advice">
        <div id="description_advice">
            <div id="connection_title">
                <h2>Description</h2>
            </div>
            <div id="advice_content">
                <span>Nom : <?= $item['nom'] ?></span>
                <br><br><br>
                <span>Espèce : <?= $item['espece'] ?></span>
                <br><br><br>
                <span>Couleur : <?= $item['couleur'] ?></span>
                <br><br><br>
                <span>Catégorie : <?= $item['nom_categorie'] ?></span>
                <br><br><br>
                <span>Sous-Catégorie : <?= $item['nom_sous_categorie'] ?></span>
            </div>
        </div>

        <div id="water_advice">
            <div id="registration_title">
                <h2>Conseils d'entretien</h2>
            </div>

            <div id="talk_item">
                <p>Pour assurer la croissance et la santé d'une plante, il est essentiel de prendre soin d'elle en lui offrant les conditions d'entretien appropriées. Tout d'abord, il est important de comprendre les besoins spécifiques de la plante en question, en termes de lumière, d'eau, de nutriments et de température.</p>
                <br><br>
                <p>La plupart des plantes ont besoin d'une exposition suffisante à la lumière du soleil pour effectuer la photosynthèse, un processus vital pour leur croissance. Cependant, certaines plantes préfèrent l'ombre partielle ou totale, donc il est important de comprendre leurs besoins spécifiques.</p>
                <br><br>
                <p>L'arrosage est également crucial pour la croissance de la plante. Les plantes ont besoin d'un apport régulier en eau, mais il est important de ne pas trop les arroser car cela peut entraîner des maladies ou la pourriture des racines. Il est recommandé de vérifier la surface du sol pour déterminer si la plante a besoin d'eau.</p>
            </div>
        </div>
    </div>
</main>