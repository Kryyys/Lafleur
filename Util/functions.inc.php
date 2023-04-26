<?php 

/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
 */
function initBasket() {
    if (!isset($_SESSION['articles'])) {
        $_SESSION['articles'] = array();
    }
}

/**
 * Supprime le panier
 *
 * Supprime la variable de type session 
 */
function destroyBasket() {
    unset($_SESSION['articles']);
}


/**
 * Ajoute un article au panier
 *
 * Teste si l'identifiant de l'article est déjà dans la variable session 
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant de l'article n'a pas été trouvé
 * @param $id : identifiant de l'article
 * @return : true or false 
 */
function addToBasket($idItem) {
    $ok = false;
    if (!in_array($idItem, $_SESSION['articles'])) {
        $_SESSION['articles'][] = $idItem;
        $ok = true;
    }
    return $ok;
}


/**
 * Retire un article du panier
 *
 * Recherche l'idde l'article dans la variable session et détruit cette valeur
 * @param $idItem : identifiant de jeu

 */
function withdrawItem($idItem) {
    $index = array_search($idItem, $_SESSION['articles']);
    unset($_SESSION['articles'][$index]);
}
