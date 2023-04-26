<?php

include_once "DataAccess.php";

/**
 * Les articles sont rangés par catégorie
 *
 * @author BECKER Marine
 */
class M_Item
{

    /**
     * Retourne 4 articles choisis aléatoirement
     * @return $rows un tableau associatif des articles
     */
    public static function selectionItem()
    {
        $sql = "SELECT id, nom, image, prix_unitaire FROM lf_articles ";
        $sql .= "ORDER BY RAND() LIMIT 4";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne les articles associés à une sous-catégorie en limitant le nombre de résultats
     * @param $subCategoryId l'identifiant de la sous-catégorie
     * @param $limit le nombre maximum de résultats
     * @return array un tableau associatif des articles
     */
    public static function findItemsBySubCategory($subCategoryId, $limit)
    {
        $sql = "SELECT a.*, sc.nom_sous_categorie
            FROM lf_articles a
            JOIN lf_sous_categories sc ON a.sous_categorie_id = sc.id
            WHERE a.sous_categorie_id = ?
            LIMIT $limit";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$subCategoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne tous les articles associés à une sous-catégorie 
     * @param $subCategoryId l'identifiant de la sous-catégorie
     * @return array un tableau associatif des articles
     */
    public static function findItemsBySubCategoryAll($subCategoryId)
    {
        $sql = "SELECT a.*, sc.nom_sous_categorie
            FROM lf_articles a
            JOIN lf_sous_categories sc ON a.sous_categorie_id = sc.id
            WHERE a.sous_categorie_id = ?";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$subCategoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /*
    * Retourne les articles associés à un évènement en limitant le nombre de résultats
    * @param $eventId l'identifiant de l'évènement
    * @param $limit le nombre maximum de résultats
    * @return array un tableau associatif des articles
    */
    public static function findItemsByEvent($eventId, $limit)
    {
        $sql = "SELECT a.*, e.nom_evenement
            FROM lf_articles a
            JOIN lf_articles_evenements ae ON ae.article_id = a.id
            JOIN lf_evenements e ON e.id = ae.evenement_id
            WHERE e.id = ? AND ae.evenement_id = ?
            LIMIT $limit";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$eventId, $eventId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /*
    * Retourne tous les articles associés à un évènement 
    * @param $limit le nombre maximum de résultats
    * @return array un tableau associatif des articles
    */
    public static function findItemsByEventAll($eventId)
    {
        $sql = "SELECT a.*, e.nom_evenement
            FROM lf_articles a
            JOIN lf_articles_evenements ae ON ae.article_id = a.id
            JOIN lf_evenements e ON e.id = ae.evenement_id
            WHERE e.id = ? AND ae.evenement_id = ?";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$eventId, $eventId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Cherche un article en fonction de son id
     * @param $id int
     * @return $item int
     */
    public static function findItemById($id)
    {
        $sql = "SELECT a.*, sc.*, c.nom_categorie, co.couleur, es.espece
        FROM lf_articles a 
        JOIN lf_sous_categories sc ON a.sous_categorie_id = sc.id 
        JOIN lf_categories c ON sc.categorie_id = c.id 
        JOIN lf_couleurs co ON a.couleur_id = co.id
        JOIN lf_especes es ON a.espece_id = es.id
        WHERE a.id = :id";
        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $item = $statement->fetch(PDO::FETCH_ASSOC);
        return $item;
    }
}
