<br><br><br>

<div id="title_account">
    <span class="font_title font_size_big">Récapitulatif de la commande</span>
</div>


<div class="background_content_basket flex_column">

    <?php if (!empty($_SESSION['articles'])) { ?>

        <div id="basket">

            <table>

                <thead>
                    <tr>
                        <td class="table_head">Nom de l'article</td>
                        <td class="table_head">Quantité</td>
                        <td class="table_head">Prix</td>
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



            <div id="summary_info">

                <div id="title_account_validation">
                    <span class="font_title font_size_medium underline">Vos informations personnelles</span>
                </div>

                <div>
                    <div id="client_info">
                        <p><span class="bold">Nom : </span><?= $person['nom'] ?></p>
                        <p><span class="bold">Prénom : </span><?= $person['prenom'] ?></p>
                        <p><span class="bold">Email : </span><?= $person['email'] ?></p>
                        <p><span class="bold">Téléphone : </span><?= $person['telephone'] ?></p>

                        <div id="placement_adress">
                            <div>
                                <p><span class="bold">Adresse : </span></p>
                            </div>

                            <?php if (!isset($person['rue'])) { ?>

                                <a href="index.php?uc=modification"><button type="submit" name="Modifier mes informations personnelles" class="button button_modif">Modifier mes informations personnelles</button></a>

                            <?php } else { ?>

                                <div>
                                    <p><?= $person['rue'] ?></p>
                                    <p><?= $person['complement_rue'] ?></p>
                                    <p><?= $person['code_postal'] ?></p>
                                    <p><?= $person['nom_ville'] ?></p>
                                </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>


    <?php } ?>
</div>