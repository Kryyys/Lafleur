<?php

include 'App/Models/M_Connection.php';

/**
 * Controleur pour le panier
 * @author BECKER Marine
 */

switch ($action) {
    case 'addToBasket':
        $idItem = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $quantity = filter_input(INPUT_POST, 'quantite', FILTER_SANITIZE_NUMBER_INT);
    
        if (!addToBasket($idItem, $quantity)) {
            $message = "Cet article est déjà dans votre panier.";
        } else {
            $message = "L'article a été ajouté à votre panier avec succès.";
        }
    
        $_SESSION['message'] = $message;
        header('Location: index.php?uc=basket');
        break;

    case 'withdrawItem':
        $id= filter_input(INPUT_GET, 'id');
        unset($_SESSION['articles'][$id]);
        break;

    case 'validation':
        if (empty($_SESSION['id'])) {
            header('Location: index.php?uc=connection');
        }
        $person = M_Connection::getInfos($_SESSION['id']);
}