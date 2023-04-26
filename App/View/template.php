<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/CSS/style.css" type="text/css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/118b9f06c6.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Headland+One&family=Karla:wght@300&display=swap" rel="stylesheet">

    <title>Lafleur - Boutique de Fleurs</title>
</head>

<body>

    <?php
    include "Common/v_header.php";
    ?>

    <main>
        <?php

        // Controleur de vues
        switch ($uc) {
            case 'home':
                include 'App/View/v_home.php';
                break;
            case 'connection':
                include 'App/View/v_connection.php';
                break;
            case 'account':
                include 'App/View/v_account.php';
                break;
            case 'contact':
                include 'App/View/v_contact.php';
                break;
            case 'about':
                include 'App/View/v_about.php';
                break;
            case 'category':
                include 'App/View/v_category.php';
                break;
            case 'sub_category':
                include 'App/View/v_sub_category.php';
                break;
            case 'event':
                include 'App/View/v_event.php';
                break;
            case 'sub_event':
                include 'App/View/v_sub_event.php';
                break;
            case 'item':
                include 'App/View/v_item.php';
                break;
            case 'modification':
                include 'App/View/v_modification.php';
                break;
            case 'basket':
                include 'App/View/v_basket.php';
                break;
            case 'validation':
                include 'App/View/v_validation.php';
                break;
            default:
                break;
        }

        ?>
    </main>


    <?php
    include "Common/v_footer.php";
    ?>



</body>

<script src="./Public/JS/main.js"></script>


</html>