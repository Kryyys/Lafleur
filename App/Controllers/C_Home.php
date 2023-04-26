<?php

include 'App/Models/M_Item.php';
include 'App/Models/M_Category.php';

/**
 * Controleur pour la gestion de la connexion et de l'inscription
 * @author BECKER Marine
 */

switch ($action) {
    case 'home':
        $results = M_Item::selectionItem();
        $categories = M_Category::findCategoryNavBar();

        $resultArray = array();
        foreach ($results as $result) {
            $resultArray[] = array(
                'nom' => $result['nom'],
                'image' => $result['image'],
                'prix' => $result['prix_unitaire']
            );
        }

    break;
}
