<?php

include 'App/Models/M_Category.php';
include 'App/Models/M_Sub_Category.php';
include 'App/Models/M_Event.php';

/**
 * Controleur pour la navigation dans les différentes catégories, sous-catégories et articles
 * @author BECKER Marine
 */

switch ($action) {
    case 'category':
        $id = filter_input(INPUT_GET, 'id');
        $subCatgories = M_Sub_Category::findSubCategoryNavBar($id);
        $subCategoryDisplay = M_Sub_Category::findSubCategoryByCategory($id);
        break;

    case 'sub_category':
        $id = filter_input(INPUT_GET, 'id');
        $subCategories = M_Sub_Category::findSubCategoryNavBar($id);
        $subCategoryId = M_Category::findCategoryBySubCategory($id);
        $subCategoryItem = M_Item::findItemsBySubCategoryAll($id);
        break;

    case 'sub_category':
        $eventsDisplay = M_Event::findEventNavBar();
        $subEventItem = M_Item::findItemsByEventAll($id);
        break;

    case 'item':
        $id = filter_input(INPUT_GET, 'id');
        $item = M_Item::findItemById($id);
        break;
}
