<?php

/*
 * Fonctions de validation
 */


/**
 * Teste si une chaîne a le format d'un email
 * Utilise une expression régulière
 * @param $email string 
 * @return : true or false
 */
function isEmail($email)
{
    return preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $email);
}


/**
 * Teste si une chaîne n'a pas de nombres
 * Utilise une expression régulière
 * @param $name string 
 * @return : true or false
 */
function isName($name)
{
    return preg_match('/^[a-zA-Z\s-]+$/', $name);
}


/**
 * Teste si une chaîne n'a pas de nombres
 * Utilise une expression régulière
 * @param $givenname string 
 * @return : true or false
 */
function isGivenname($givenname)
{
    return preg_match('/^[a-zA-Z\s-]+$/', $givenname);
}


/**
 * Teste si une chaîne n'a que des nombres et 10 caractères
 * Utilise une expression régulière
 * @param $phone int 
 * @return : true or false
 */
function isPhone($phone)
{
    return preg_match('/^[0-9]/', $phone);
}


/**
 * Teste si une chaîne n'a que des nombres et 5 caractères
 * Utilise une expression régulière
 * @param $postalCode int 
 * @return : true or false
 */
function isPostalCode($postalCode)
{
    return preg_match('/^[0-9]/', $postalCode);
}


/**
 * Teste si une chaîne n'a pas de nombres
 * Utilise une expression régulière
 * @param $city string 
 * @return : true or false
 */
function isCity($city)
{
    return preg_match('/^[a-zA-Z\s-]+$/', $city);
}


/**
 * Teste la fiabilité d'un mot de passe 
 * Utilise une expression régulière
 * @param $password : la chaîne testée
 * @return : true or false
 */
function isStrong($mdp)
{
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/', $mdp);
}

// /**
//  * Teste si une chaîne n'insère pas de code malveillant
//  * Utilise une regex
//  * @param $title string 
//  * @return : true or false
//  */
// function isTitle($title) {
//     $title = trim($title); // supprimer les espaces en début et fin de chaîne
//     $title = stripslashes($title); // supprimer les antislashs
//     $title = htmlspecialchars($title); // convertir les caractères spéciaux en entités HTML
//     // $title = mysqli_real_escape_string($db, $title); // échapper les caractères spéciaux pour l'insertion SQL
//     return $title;
// }


/**
 * Vérifie si tous les champs de l'inscription sont remplis, retourne vrai s'il n'y a pas d'erreurs
 * Le cas échéant, il remplit le tableau des erreurs trouvées     
 * @param $name string
 * @param $givenname string
 * @param $email string
 * @param $phone int
 * @param $password string
 * @return : array
 */
function isValid(string $name, string $givenname, string $email, int $phone, string $password)
{
    $erreurs = [];
    if (empty($name)) {
        $erreurs['nom'] = "Il faut saisir le champ Nom";
    } else if (!isName($name)) {
        $erreurs['nom'] = "Le champ Nom ne doit pas contenir de nombres";
    }

    if (empty($givenname)) {
        $erreurs['prenom'] = "Il faut saisir le champ Prénom";
    } else if (!isGivenname($givenname)) {
        $erreurs['prenom'] = "Le champ Prénom ne doit pas contenir de nombres";
    }

    if (empty($email)) {
        $erreurs['email'] = "Il faut saisir le champ Email";
    } else if (!isEmail($email)) {
        $erreurs['email'] = "Le mail est invalide";
    }

    if (empty($phone)) {
        $erreurs['telephone'] = "Il faut saisir le champ Téléphone";
    } else if (!isPhone($phone)) {
        $erreurs['telephone'] = "Le format du numéro de téléphone est invalide";
    }

    if (empty($password)) {
        $erreurs['mot_de_passe'] = "Il faut saisir le champ Mot de passe";
    } else if (!isStrong($password)) {
        $erreurs['mot_de_passe'] = "Le mot de passe doit contenir 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial";
    }

    return $erreurs;
}


/**
 * Vérifie si tous les champs du formulaire de contact sont remplis, retourne vrai s'il n'y a pas d'erreurs
 * Le cas échéant, il remplit le tableau des erreurs trouvées     
 * @param $name string
 * @param $givenname string
 * @param $email string
 * @param $title string
 * @param $message string
 * @return : array
 */
function isValidForm(string $name, string $givenname, string $email, string $title, string $message)
{
    $erreurs = [];
    if (empty($name)) {
        $erreurs['nom'] = "Il faut saisir le champ Nom";
    } else if (!isName($name)) {
        $erreurs['nom'] = "Le champ Nom ne doit pas contenir de nombres";
    }

    if (empty($givenname)) {
        $erreurs['prenom'] = "Il faut saisir le champ Prénom";
    } else if (!isGivenname($givenname)) {
        $erreurs['prenom'] = "Le champ Prénom ne doit pas contenir de nombres";
    }

    if (empty($email)) {
        $erreurs['email'] = "Il faut saisir le champ Email";
    } else if (!isEmail($email)) {
        $erreurs['email'] = "Le mail est invalide";
    }

    if (empty($title)) {
        $erreurs['titre'] = "Il faut saisir le champ Titre";
    }

    if (empty($message)) {
        $erreurs['message'] = "Il faut saisir le champ Message";
    }

    return $erreurs;
}


/**
 * Vérifie si tous les champs du formulaire de modification des informations personnelles sont remplis, retourne vrai s'il n'y a pas d'erreurs
 * Le cas échéant, il remplit le tableau des erreurs trouvées     
 * @param $name string
 * @param $givenname string
 * @param $email string
 * @param $telephone int
 * @param $street string
 * @param $complement string
 * @param $postalCode int
 * @param $city string
 * @return : array
 */
function isValidModif(string $name, string $givenname, string $email, int $phone, string $street, string $complement, int $postalCode, string $city)
{
    $erreurs = [];
    if (empty($name)) {
        $erreurs['nom'] = "Il faut saisir le champ Nom";
    } else if (!isName($name)) {
        $erreurs['nom'] = "Le champ Nom ne doit pas contenir de nombres";
    }

    if (empty($givenname)) {
        $erreurs['prenom'] = "Il faut saisir le champ Prénom";
    } else if (!isGivenname($givenname)) {
        $erreurs['prenom'] = "Le champ Prénom ne doit pas contenir de nombres";
    }

    if (empty($email)) {
        $erreurs['email'] = "Il faut saisir le champ Email";
    } else if (!isEmail($email)) {
        $erreurs['email'] = "Le mail est invalide";
    }

    if (empty($phone)) {
        $erreurs['telephone'] = "Il faut saisir le champ Téléphone";
    } else if (!isPhone($phone)) {
        $erreurs['telephone'] = "Le format du numéro de téléphone est invalide";
    }

    if (empty($street)) {
        $erreurs['rue'] = "Il faut saisir le champ Rue";
    } 

    if (empty($complement)) {
        $erreurs['complement_rue'] = "Il faut saisir le champ Complément";
    } 

    if (empty($postalCode)) {
        $erreurs['code_postal'] = "Il faut saisir le champ Code Postal";
    } else if (!isPostalCode($postalCode)) {
        $erreurs['code_postal'] = "Le format du code postal est invalide";
    }

    if (empty($city)) {
        $erreurs['nom_ville'] = "Il faut saisir le champ Ville";
    } else if (!isCity($city)) {
        $erreurs['nom_ville'] = "Le champ Ville ne doit pas contenir de nombres";
    }

    return $erreurs;
}

