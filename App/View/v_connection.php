<br><br><br>

<main id="conn_regis">
    <div id="connection">
        <div id="connection_title">
            <h2>Connexion</h2>
        </div>
        <div id="connection_content">
            <div class="form_container margin_co">

                <?php if (isset($message)) : ?>
                    <div class="error error-margin"><?php echo $message ?></div><br>
                <?php endif; ?>
                
                <form method="POST" action="index.php?uc=connection&action=verifConnection">
                    <label for="email">Email </label>
                    <br><br>
                    <input type="text" name="email" id="email" class="form">
                    <br><br>
                    <label for="password">Mot de Passe </label>
                    <br><br>
                    <input type="password" name="mdp" id="mdp" class="form">
                    <br><br>
                    <input type="submit" value="Se connecter" name="Se connecter" class="button">
                </form>
            </div>
        </div>
    </div>

    <div id="registration">
        <div id="registration_title">
            <h2>Inscription</h2>
        </div>
        <div id="registration_content">
            <div class="form_container">

                <?php if (isset($message_register)) : ?>
                    <div class="error error-margin"><?php echo $message_register ?></div>
                <?php endif; ?>

                <?php if (isset($error_register)) : ?>
                    <div class="error error-margin"><?php echo $error_register ?></div><br>
                <?php endif; ?>

                <form method="POST" action="index.php?uc=connection&action=registration">

                    <label for="nom">Nom </label>
                    <br><br>
                    <input type="text" name="nom" maxlength="45" class="form">
                    <div id="nom-error" class="error"><?php echo isset($erreurs['nom']) ? $erreurs['nom'] : ''; ?></div>
                    <br><br>

                    <label for="prenom">Prénom </label>
                    <br><br>
                    <input type="text" name="prenom" maxlength="45" class="form">
                    <div id="prenom-error" class="error"><?php echo isset($erreurs['prenom']) ? $erreurs['prenom'] : ''; ?></div>
                    <br><br>

                    <label for="email">Email </label>
                    <br><br>
                    <input type="text" name="email" maxlength="255" class="form">
                    <div id="email-error" class="error"><?php echo isset($erreurs['email']) ? $erreurs['email'] : ''; ?></div>
                    <br><br>

                    <label for="telephone">Téléphone </label>
                    <br><br>
                    <input type="text" name="telephone" maxlength="10" class="form">
                    <div id="telephone-error" class="error"><?php echo isset($erreurs['telephone']) ? $erreurs['telephone'] : ''; ?></div>
                    <br><br>

                    <label for="mdp">Mot de Passe </label>
                    <br><br>
                    <input type="password" name="mdp" class="form">
                    <br>
                    <div id="mdp-error" class="error"><?php echo isset($erreurs['mot_de_passe']) ? $erreurs['mot_de_passe'] : ''; ?></div>
                    <br><br>

                    <input type="submit" value="S'inscrire" name="S'inscrire" class="button">
                </form>
            </div>
        </div>
    </div>
</main>