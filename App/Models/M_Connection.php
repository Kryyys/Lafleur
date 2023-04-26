<?php

include_once "DataAccess.php";

/**
 * Classe pour gérer la connexion et l'inscription
 *
 * @author BECKER Marine
 * 
 */

class M_Connection
{

    /**
     * Créé un compte utilisateur
     *
     * Créé un compte utilisateur à partir des arguments validés passés en paramètre 
     * @param $name string
     * @param $givenname string
     * @param $email string
     * @param $phone int
     * @param $password string
     */
    public static function createAccount(string $name, string $givenname, string $email, int $phone, string $password)
    {

        $sql = "INSERT INTO lf_clients (nom, prenom, email, telephone, mot_de_passe)";
        $sql .= "VALUES (:nom, :prenom, :email, :telephone, :mdp)";

        $password = password_hash($password, PASSWORD_BCRYPT);

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':nom', $name, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $givenname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':telephone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':mdp', $password, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Vérifie si un client existe dans la bdd
     *
     * @param $email : string
     * @return : booléen
     */

    public static function userExist(string $email)
    {

        $sql = 'SELECT 1 FROM lf_clients ';
        $sql .= 'WHERE email = :email';

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return (bool) $exist;
    }


    /**
     * Vérifie si le mdp correspond bien à celui du client dans la bdd
     *
     * @param $email : string
     * @param $mdp : string
     * @return : booléen
     */

    public static function checkPassword(string $email, string $mdp)
    {
        $existe = false;

        $sql = "SELECT id, email, mot_de_passe FROM lf_clients WHERE email = :email";

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $data = $statement->fetch();
            $mdp_bdd = $data['mot_de_passe'];
        }
        if ($statement->rowCount() == 0) {
        }

        if (password_verify($mdp, $mdp_bdd)) {
            $id = $data['id'];
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $data['email'];
            $existe = true;
        }
        return $existe;
    }


    /**
     * Récupère les infos d'un client en fonction de l'id enregistré dans la session
     *
     * @param $id : int
     * @return : array
     */

    public static function getInfos(int $id)
    {
        $sql = "SELECT *
        FROM lf_clients c
        INNER JOIN lf_adresses_clients ac ON c.id = ac.client_id
        INNER JOIN lf_adresses a  ON ac.adresse_id = a.id
        LEFT JOIN lf_villes v ON a.ville_id = v.id
        LEFT JOIN lf_codes_postaux cp ON a.code_postal_id = cp.id
        WHERE c.id = :id";

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $person = $statement->fetch(PDO::FETCH_ASSOC);
        return $person;
    }


    /**
     * Modifie les informations d'un client déjà enregistré dans la bdd
     *
     * @param $id : int
     * @param $name : string
     * @param $prenom : string
     * @param $email : string
     * @param $telephone : int
     * @param $street : string
     * @param $complement : string
     * @param $postalCode : string
     * @param $city : string
     */
    public static function modifInfo(int $id, string $name, string $prenom, string $email, int $phone, string $street, string $complement, int $postalCode, string $city)
    {

        $sql = "UPDATE lf_clients c
        INNER JOIN lf_adresses_clients ac ON c.id = ac.client_id
        INNER JOIN lf_adresses a  ON ac.adresse_id = a.id
        LEFT JOIN lf_villes v ON a.ville_id = v.id
        LEFT JOIN lf_codes_postaux cp ON a.code_postal_id = cp.id
        SET c.nom=:nom, c.prenom=:prenom, c.email=:email, c.telephone=:telephone, a.rue=:rue, a.complement_rue=:complement, cp.code_postal=:code_postal, v.nom_ville=:ville
        WHERE c.id = :id";

        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->bindParam(':nom', $name, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':telephone', $phone, PDO::PARAM_INT);
        $statement->bindParam(':rue', $street, PDO::PARAM_STR);
        $statement->bindParam(':complement', $complement, PDO::PARAM_STR);
        $statement->bindParam(':code_postal', $postalCode, PDO::PARAM_INT);
        $statement->bindParam(':ville', $city, PDO::PARAM_STR);
        $statement->execute();
    }
}
