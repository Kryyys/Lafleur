<br><br><br>

<div id="title_account">
    <span class="font_title font_size_big">Mon Panier</span>
</div>

<?php if (isset($_SESSION['message'])) { ?>
    <p><?= $_SESSION['message'] ?></p>
<?php } ?>

<div class="background_content_basket">

    <div id="basket">

        <?php if (!empty($_SESSION['articles'])) { ?>

            <table>

                <thead>
                    <tr>
                        <td class="table_head">Nom de l'article</td>
                        <td class="table_head">Quantité</td>
                        <td class="table_head">Prix</td>
                        <td> </td>
                    </tr>
                </thead>

                <tbody>
                    <?php $total = 0;
                    foreach ($_SESSION['articles'] as $idItem) {
                        $item = M_Item::findItemById($idItem);
                        $subtotal = $item['prix_unitaire'];
                        $total += $subtotal; ?>

                        <tr>
                            <td class="table_td"> <?= $item['nom'] ?></td>
                            <td class="table_td"> Initier la quantité</td>
                            <td class="table_td"> <?= $item['prix_unitaire'] ?> €</td>
                            <td><a href="index.php?uc=basket&action=withdrawItem&id= <?= $item['id'] ?>" class="dumpItem" onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">Supprimer</a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>


            <div id="delivery">
                <?php if ($total < 50) { ?>

                    <span class="bold font_size_medium">Frais de livraison : 2.99€</span>

                <?php } else { ?>

                    <span class="bold font_size_medium">Frais de livraisons offerts</span>

                <?php } ?>
            </div>

            <div id="total">

                <div id="total_price" class="bold font_size_medium">
                    Prix total
                </div>

                <div class="bold red font_size_medium">
                    <?php if ($total < 50) { ?>
                        <?= $total + 2.99 ?> €
                    <?php } else { ?>
                        <?= $total ?> €
                    <?php } ?>
                </div>
            </div>

            <div id="button_basket">
            <a href="index.php?uc=validation&action=validation"><button type="submit" name="Valider mon panier" class="button">Valider mon panier</button></a>
            <a href=""><button type="submit" name="Supprimer mon panier" class="button_delete">Supprimer mon panier</button></a>
            </div>

        <?php } else { ?>

            <p>Pas d'articles dans le panier</p><br>

        <?php } ?>
    </div>
</div>