<?php

include_once "DataAccess.php";

/**
 * Les articles sont rangés par catégorie
 *
 * @author BECKER Marine
 */
class M_Category
{

    /**
     * Retourne toutes les catégories pour la navbar dont la colonne affiche est égal à 1
     * @return $rows un tableau associatif des catégories dont la colonne affiche = 1
     */
    public static function findCategoryNavBar()
    {
        $sql = "SELECT * FROM lf_categories WHERE affiche = 1";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     * @return $rows un tableau associatif des catégories
     */
    public static function findCategory()
    {
        $sql = "SELECT * FROM lf_categories";
        $statement = DataAccess::prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Sélectionne une image de la catégorie
     * @param $categoryId int
     * @return $rows string
     */
    public static function selectImage($categoryId)
    {
        $sql = "SELECT a.image 
        FROM lf_articles a
        JOIN lf_sous_categories sc ON sc.id = a.sous_categorie_id
        JOIN lf_categories c ON c.id = sc.categorie_id
        WHERE c.id = ?
        LIMIT 1";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$categoryId]);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * Cherche une catégorie en fonction de son id
     * @param $id int
     * @return $category int
     */
    public static function findCategoryById($id)
    {
        $sql = "SELECT * FROM lf_categories WHERE id = :id";
        $statement = DataAccess::prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    /**
     * Retourne la catégorie associée à la sous-catégorie
     * @param $subCategoryId int
     * @return $row un tableau associatif de la catégorie
     */
    public static function findCategoryBySubCategory($subCategoryId)
    {
        $sql = "SELECT c.* FROM lf_categories c JOIN lf_sous_categories sc ON c.id = sc.categorie_id WHERE sc.id = ?";
        $statement = DataAccess::prepare($sql);
        $statement->execute([$subCategoryId]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
