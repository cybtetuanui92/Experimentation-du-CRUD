<?php
    session_start();
    require_once 'header.php';

    $urlId = $_GET['id'];
    
    foreach($_SESSION['cars'] as &$car) {
        $idCor = $car['id'];
        if ($urlId == $idCor) {
            $index = array_search($car,$_SESSION['cars']);
            $viewRemoved = array_splice($_SESSION['cars'], $index, 1);

            echo '<h1>Voici l\'élément supprimé et le tableau à jour :</h1>';
            echo '<pre>';
            print_r ($viewRemoved);
            echo '</pre><hr>';
            echo '<pre>';
            print_r ($_SESSION['cars']);
            echo '</pre>';


        }
    };



?>