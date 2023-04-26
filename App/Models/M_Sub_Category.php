<?php

include_once "DataAccess.php";

/**
 * Les articles sont rangés par catégorie
 *
 * @author BECKER Marine
 */
class M_Sub_Category
{

    /**
     * Retourne toutes les sous-catégories pour la navbar dont la colonne affiche est égal à 1
     * @return $rows un tableau associatif des sous-catégories dont la colonne affiche = 1
     */
    public static function findSubCategoryNavBar($categoryId)
    {
        $sql = "SELECT * FROM lf_sous_categories WHERE affiche = 1 AND categorie_id = ?";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$categoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne toutes les sous-catégories sous forme d'un tableau associatif
     * @return $rows un tableau associatif des sous-catégories
     */
    public static function findSubCategory()
    {
        $sql = "SELECT * FROM lf_sous_categories";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Sélectionne une image de l'article associé à la sous-catégorie
     * @param $subCategoryId int
     * @return array
     */
    public static function selectImageSub($subCategoryId)
    {
        $sql = "SELECT a.image 
            FROM lf_articles a
            JOIN lf_sous_categories sc ON sc.id = a.sous_categorie_id
            WHERE sc.id = ?
            LIMIT 1";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$subCategoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne toutes les sous-catégories associées à une catégorie
     * @param $categoryId int
     * @return $rows un tableau associatif des sous-catégories
     */
    public static function findSubCategoryByCategory($categoryId)
    {
        $sql = "SELECT * FROM lf_sous_categories WHERE categorie_id = ?";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$categoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Cherche une sous-catégorie en fonction de son id
     * @param $id int
     * @return $subCategory int
     */
    public static function findSubCategoryById($id)
    {
        $sql = "SELECT * FROM lf_sous_categories WHERE id = :id";
        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $subCategory = $statement->fetch(PDO::FETCH_ASSOC);
        return $subCategory;
    }
}
