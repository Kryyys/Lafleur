<br><br><br>

<div id="title_account">
    <span class="font_title font_size_big">Ravis de vous revoir, <?= $person['prenom'] ?> !</span>
</div>

<img src="./Public/Image/flower_banner.png" alt="" width="100%" height="120px">



<div id="command">

    <div id="title_command">
        <span class="font_title font_size_medium underline">Vos commandes passées</span>
    </div>

    <div id="command_table">
        <span>Pas de commandes</span>
    </div>

</div>

<div id="adress">

    <div id="title_command">
        <span class="font_title font_size_medium underline">Vos informations personnelles</span>
    </div>

    <div id="adress_table">
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

                <?php } ?>
            </div>
        </div>

        <div id="adress_button">

        <?php if (isset($person['rue'])) { ?> -

            <a href="index.php?uc=modification"><button type="submit" name="Modifier mes informations personnelles" class="button button_modif">Modifier mes informations personnelles</button></a>
            
            <?php } ?>
            
            <a href="index.php?uc=account&action=logout"><button type="submit" name="Se déconnecter" class="button_out">Se déconnecter</button></a>
        </div>

    </div>

</div>