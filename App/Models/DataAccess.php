<?php

/** 
 * Classe d'accès aux données.
*/
class DataAccess
{

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=Lafleur';
    private static $user = 'root';
    private static $mdp = '';


    /**
     *
     * @var PDO
     */
    private static $pdo;


    /** 
     * Fonction statique qui crée l'unique instance de la classe
     * Retourne l'unique objet de la classe
     * @return PDO
     */
    public static function getPdo()
    {
        try {
            if (DataAccess::$pdo == null) {
                DataAccess::$pdo = new PDO(DataAccess::$serveur . ';' . DataAccess::$bdd, DataAccess::$user, DataAccess::$mdp);
                DataAccess::$pdo->query("SET CHARACTER SET utf8");
                DataAccess::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return DataAccess::$pdo;
        } catch (PDOException $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }


    /** 
     * Exécution d'une requete de lecture
     * @param string $queries
     * @return PDOStatement
     */
    public static function query(string $queries)
    {
        return DataAccess::getPdo()->query($queries);
    }


    /**
     * Execution d'une requete d'écriture
     * @param string $queries
     * @return int
     */
    public static function exec(string $queries)
    {
        return DataAccess::getPdo()->exec($queries);
    }


    /**
     * La méthode prepare
     * @param string $queries
     * @return PDOStatement
     */
    public static function prepare(string $queries)
    {
        return DataAccess::getPdo()->prepare($queries);
    }
}
