<?php

include_once "DataAccess.php";

/**
 * Les articles sont rangés par catégorie
 *
 * @author BECKER Marine
 */
class M_Event {

    /**
     * Retourne toutes les évènements pour la navbar dont la colonne affiche est égal à 1
     * @return $rows un tableau associatif des évènements dont la colonne affiche = 1
     */
    public static function findEventNavBar() {
        $sql= "SELECT * FROM lf_evenements WHERE affiche = 1";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne toutes les évènements sous forme d'un tableau associatif
     * @return $rows un tableau associatif des évènements
     */
    public static function findEvent() {
        $sql= "SELECT * FROM lf_evenements";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        return $rows;

    }

    /**
     * Sélectionne une image de l'article associé à l'évènement
     * @param $eventId int
     * @return array
     */
    public static function selectImageEvent($eventId)
    {
        $sql = "SELECT a.image 
            FROM lf_articles a
            JOIN lf_articles_evenements ae ON ae.article_id = a.id
            JOIN lf_evenements e ON e.id = ae.evenement_id
            WHERE e.id = ?
            LIMIT 1";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$eventId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Cherche un évènement en fonction de son id
     * @param $id int
     * @return $subEvent int
     */
    public static function findSubEventById($id)
    {
        $sql = "SELECT * FROM lf_evenements WHERE id = :id";
        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $subEvent = $statement->fetch(PDO::FETCH_ASSOC);
        return $subEvent;
    }
    

}