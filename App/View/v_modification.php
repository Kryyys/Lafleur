<br><br><br>

<div id="title_modif">
    <span class="font_title font_size_big center">Modifiez vos informations personnelles</span>
</div>

<div class="background_content">
    <div id="modif_table">

        <form method="POST" action="index.php?uc=modification&action=modification">

            <div class="modif_div">
                <label for="nom">Nom :</label><br>
                <input id="nom" type="text" name="nom" value="<?= $person['nom'] ?>" maxlength="45">
                <div id="nom-error" class="error"><?php if (isset($erreurs['nom'])) {
                                                        echo '<span class="erreur">' . $erreurs['nom'] . '</span>';
                                                    } ?></div>
            </div>

            <div class="modif_div">
                <label for="prenom">Prénom :</label><br>
                <input id="prenom" type="text" name="prenom" value="<?= $person['prenom'] ?>" maxlength="45">
                <div id="prenom-error" class="error"><?php echo isset($erreurs['prenom']) ? $erreurs['prenom'] : ''; ?></div>
            </div>

            <div class="modif_div">
                <label for="email">Email :</label><br>
                <input id="email" type="text" name="email" value="<?= $person['email'] ?>" maxlength="255">
                <div id="email-error" class="error"><?php echo isset($erreurs['email']) ? $erreurs['email'] : ''; ?></div>
            </div>

            <div class="modif_div">
                <label for="telephone">Téléphone :</label><br>
                <input id="telephone" type="text" name="telephone" value="<?= $person['telephone'] ?>" size="5" maxlength="10">
                <div id="telephone-error" class="error"><?php echo isset($erreurs['telephone']) ? $erreurs['telephone'] : ''; ?></div>
            </div>

            <div class="modif_div">
                <label for="rue">Rue :</label><br>
                <input id="rue" type="text" name="rue" value="<?= $person['rue'] ?>" maxlength="255">
            </div>

            <div class="modif_div">
                <label for="complement_rue">Complément : </label><br>
                <input id="complement_rue" type="text" name="complement_rue" value="<?= $person['complement_rue'] ?>" maxlength="255">
            </div>

            <div class="modif_div">
                <label for="code_postal">Code Postal :</label><br>
                <input id="code_postal" type="text" name="code_postal" value="<?= $person['code_postal'] ?>" maxlength="5">
            </div>

            <div class="modif_div">
                <label for="nom_ville">Ville :</label><br>
                <input id="nom_ville" type="text" name="nom_ville" value="<?= $person['nom_ville'] ?>" maxlength="45">
            </div>

            <div id="modif_button">
                <a href="index.php?uc=modification&action=modification"><button type="submit" name="Modifier mes informations personnelles" class="button button_modif">Modifier mes informations personnelles</button></a>

                <a href="index.php?uc=account&action=account"><button type="submit" name="Retour" class="button_out">Retour</button></a>
            </div>

        </form>

    </div>
</div>