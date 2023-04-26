<?php

include 'App/Models/M_Connection.php';

/**
 * Controleur pour la gestion de la connexion et de l'inscription
 * @author BECKER Marine
 */

switch ($action) {
    case 'registration':

        $registration = filter_input(INPUT_GET, 'registration');
        $name = filter_input(INPUT_POST, 'nom');
        $givenname = filter_input(INPUT_POST, 'prenom');
        $email = filter_input(INPUT_POST, 'email');
        $phone = intval(filter_input(INPUT_POST, 'telephone'));
        $password = filter_input(INPUT_POST, 'mdp');

        $erreurs = isValid($name, $givenname, $email, $phone, $password);
        $userExist = M_Connection::userExist($email);

        if ($userExist) {
            $error_register = "Un utilisateur avec cette adresse email existe déjà";
        };

        if (empty($erreurs) && !$userExist) {
            M_Connection::createAccount($name, $givenname, $email, $phone, $password);
            $message_register = "Votre compte a bien été créé !";
        };
        break;

    case 'connection':
        $mySession = new M_Connection();

        $connection = filter_input(INPUT_GET, 'connection');

        $userExist = M_Connection::userExist($email);

        if (!$userExist) {
            $message = "L'adresse email est inconnue";
        } else {
            if ($connection == "connection") {
                $email = filter_input(INPUT_POST, 'email');
                $mdp = filter_input(INPUT_POST, 'mot_de_passe');

                $_SESSION['id'] = $mySession->checkPassword($email, $mdp);
                if ($_SESSION['id']) {
                    header('Location: index.php?uc=account&action=account');
                }
            }
        }
        break;

    case 'verifConnection':
        $email = trim(filter_input(INPUT_POST, "email"));
        $mdp = trim(filter_input(INPUT_POST, "mdp"));

        if (M_Connection::checkPassword($email, $mdp)) {
            $mySession = new M_Connection();
            header('Location:index.php?uc=account');
        } else {
            echo "nonono";
            header('Location:index.php?uc=connection');
        }
        break;

    case 'account':
        $person = M_Connection::getInfos($_SESSION['id']);


        // if (!empty($_SESSION['id'])) {
        //     $commandesClient = M_Commande::afficherCommande($_SESSION['id']);
        // }
        break;

    case 'logout':
        session_destroy();
        header('Location:index.php?uc=home');
        exit;
        break;

    case 'modification':
        $name = filter_input(INPUT_POST, 'nom');
        $givenname = filter_input(INPUT_POST, 'prenom');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'telephone');
        $street = filter_input(INPUT_POST, 'rue');
        $complement = filter_input(INPUT_POST, 'complement_rue');
        $postalCode = filter_input(INPUT_POST, 'code_postal');
        $city = filter_input(INPUT_POST, 'nom_ville');

        $erreurs = isValidModif($name, $givenname, $email, $phone, $street, $complement, $postalCode, $city);

        if (empty($erreurs)) {
            M_Connection::modifInfo($_SESSION['id'], $name, $givenname, $email, $phone, $street, $complement, $postalCode, $city);
            $message_modif = "Vos informations personnelles ont bien été modifiées !";

            header("Location: index.php?uc=account&action=account");
        } else {
            echo "NONONO";
            var_dump($erreurs);
            header("Location: index.php?uc=modification");
        }

        break;
}
