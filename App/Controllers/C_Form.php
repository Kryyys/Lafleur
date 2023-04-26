<?php

include 'App/Models/M_Form.php';

/**
 * Controleur pour la gestion du formulaire de contact
 * @author BECKER Marine
 */

switch ($action) {
    case 'contact':

        $form = filter_input(INPUT_GET, 'form');
        $name = filter_input(INPUT_POST, 'nom');
        $givenname = filter_input(INPUT_POST, 'prenom');
        $email = filter_input(INPUT_POST, 'email');
        $title = filter_input(INPUT_POST, 'titre_demande');
        $message = filter_input(INPUT_POST, 'message');

        $erreurs = isValidForm($name, $givenname, $email, $title, $message); 

        if (empty($erreurs)) {
            M_Form::createForm($name, $givenname, $email, $title, $message);
            $message="Votre demande a bien été envoyée";
        } else {
            $message= "Ce n'est pas valide";
        }

        break;
}
