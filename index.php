<?php

session_start();

// Pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);


require('./Util/functions.inc.php');
require('./Util/validators.inc.php');
require("./App/Models/DataAccess.php");
include "./App/Models/M_Item.php";

$sessionClient = [];
if (!empty($_SESSION['id'])) {
    $sessionClient = $_SESSION['id'];
}

$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action'); // Action

initBasket();

if (!$uc) {
    $uc = 'home';
}

// Controleur principal
switch ($uc) {
    case "home":
        $results = M_Item::selectionItem();

        $resultArray = array();
        foreach ($results as $result) {
            $resultArray[] = array(
                'id' => $result['id'],
                'nom' => $result['nom'],
                'image' => $result['image'],
                'prix' => $result['prix_unitaire']
            );
        };
        break;
    case 'connection':
        include 'App/Controllers/C_Connection.php';
        break;
    case 'category':
        include 'App/Controllers/C_Navigation.php';
        break;
    case 'sub_category':
        include 'App/Controllers/C_Navigation.php';
        break;
    case 'event':
        include 'App/Controllers/C_Navigation.php';
        break;
    case 'sub_event':
        include 'App/Controllers/C_Navigation.php';
        break;
    case 'item':
        include 'App/Controllers/C_Navigation.php';
        break;
    case 'contact':
        include 'App/Controllers/C_Form.php';
        break;
    case 'account':
        include 'App/Controllers/C_Connection.php';
        break;
    case 'modification':
        include 'App/Controllers/C_Connection.php';
        break;
    case 'basket':
        include 'App/Controllers/C_Basket.php';
        break;
    case 'validation':
        include 'App/Controllers/C_Basket.php';
        break;
}

include("App/View/template.php");
