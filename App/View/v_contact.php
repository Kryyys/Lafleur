<br><br><br><br>

<main id="contact">
    <div id="category_title">
        <span class="font_title font_size_big">Contactez-nous</span>
    </div>

    <div id="contact_background">
        <div id="contact_bubble">
            <h2 class="font_title font_size_big">Une question ?</h2>
            <p class="font_size_medium">Besoin d'un renseignement sur votre commande ou votre livraison ?</p>
            <p class="font_size_medium">Demandez-nous !</p>
        </div>
    </div>

    <div id="contact_talk">
        <p class="font_size_medium bold">Vous n’avez toujours pas trouvé votre bonheur ?</p>

        <div id="schedule">
            <p>Contactez-nous par téléphone au 03 78 03 75 95</p>
            <p>du lundi au vendredi de 9h à 12h et 13h30 à 18h</p>
            <p>et le samedi de 10h à 12h et 13h30 à 17h</p>
        </div>

        <div id="red_talk">
            <p>Ou contactez-nous via ce formulaire de contact.</p>
            <p class="red bold">Si jamais votre demande concerne une commande en cours ou passée, merci de spécifier votre numéro de commande dans votre message.</p>
        </div>

    </div>

    <div>

        <?php if (isset($message)) : ?>
            <div class="error_form"><?php echo $message ?></div>
        <?php endif; ?>

        <form action="index.php?uc=contact&action=contact" method="POST" id="contact_form">

            <input type="text" name="nom" placeholder="Nom*" maxlength="45">
            <div id="nom-error" class="error"><?php echo isset($erreurs['nom']) ? $erreurs['nom'] : ''; ?></div>

            <input type="text" name="prenom" placeholder="Prénom*" maxlength="45">
            <div id="prenom-error" class="error"><?php echo isset($erreurs['prenom']) ? $erreurs['prenom'] : ''; ?></div>

            <input type="text" name="email" placeholder="Email*" maxlength="45">
            <div id="email-error" class="error"><?php echo isset($erreurs['email']) ? $erreurs['email'] : ''; ?></div>

            <input type="text" name="titre_demande" placeholder="Votre demande concerne*" maxlength="255">
            <div id="titre-error" class="error"><?php echo isset($erreurs['titre']) ? $erreurs['titre'] : ''; ?></div>

            <textarea id="texte" name="message" maxlength="1000" placeholder="Message (1000 caractères maximum)*" rows="10" cols="55" onkeyup="if(this.value.length > 1000) this.value = this.value.substring(0, 1000);
                if(this.value.length < 1000){this.style.color='black'; document.getElementById('reception_num_carac').style.color = 'black';}
                else{this.style.color='red'; document.getElementById('reception_num_carac').style.color = 'red';}
                document.getElementById('reception_num_carac').innerHTML = 1000 - this.value.length;"></textarea>
            <div id="message-error" class="error"><?php echo isset($erreurs['message']) ? $erreurs['message'] : ''; ?></div>

            <p><span id="reception_num_carac">1000</span> caractères restants</p>
            <p>Les champs comportant un * sont obligatoires</p>

            <input type="submit" value="Soumettre votre demande" name="Soumettre votre demande" class="button_contact">
        </form>

    </div>
</main>