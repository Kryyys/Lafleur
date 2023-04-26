<?php

include_once "DataAccess.php";

/**
 * Classe pour gérer la connexion et l'inscription
 *
 * @author BECKER Marine
 * 
 */

class M_Form
{

    /**
     * Créé un formulaire de demande
     *
     * Créé un formulaire de demande à partir des arguments validés passés en paramètre 
     * @param $name string
     * @param $givenname string
     * @param $email string
     * @param $title string
     * @param $message string
     */
    public static function createForm(string $name, string $givenname, string $email, string $title, string $message)
    {

        $sql = "INSERT INTO lf_formulaires (nom, prenom, email, titre_demande, message)";
        $sql .= "VALUES (:nom, :prenom, :email, :titre, :message)";

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':nom', $name, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $givenname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':titre', $title, PDO::PARAM_STR);
        $statement->bindParam(':message', $message, PDO::PARAM_STR);
        $statement->execute();
    }
}