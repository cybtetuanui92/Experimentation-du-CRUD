<?php 
    session_start();
    require_once 'header.php';

    // ! utilisation superglobale $_GET pour récupérer l'ID de l'URL et permettre le traitement unique
    // ! d'un élément 
    $urlId = $_GET['id'];

    // ! PARTIE UPDATE incluse dans une PARTIE READ 
    // *  BLOC TRAITEMENT APRES MODIFICATION si POST alors MODIFICATION TRUE 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // ! ICI, recup des données update (modifiées)
        $model = $_POST['model'];
        $image = $_POST['image'];
        $vendu = $_POST['vendu'];
        $stock = $_POST['stock'];
        $info = $_POST['info'];
        // ! ICI, parcours du tableau pour màj des inputs modifiés ('&' référence l'élément afin de modif direct)
        foreach($_SESSION['cars'] as &$car) {
            $idCor = $car['id'];
            if ($urlId == $idCor) {
                $car['model'] = $model;
                $car['vendu'] = $vendu;
                $car['stock'] = $stock;
                $car['image'] = $image;
                $car['info'] = $info;

                // break;
            }
        };
        // ! pour lacher la référence prise en début de boucle
        unset($car);
        echo '
            <h3>// Modification effectuée //</h3>  
        ';
    }

    // * BLOC AFFICHAGE DETAIL
    // ! ICI, boucle pour parcours de la DATA (comme dab)
    foreach ($_SESSION['cars'] as $car) {
        $id = $car['id'];
        $model = $car['model'];
        $image = $car['image'];
        $vendu = $car['vendu'];
        $stock = $car['stock'];
        $info = $car['info'];

        // ! ICI, c'est la condition qui choisie l'élément à afficher en DETAIL
        if ($urlId == $id) {
            echo "
                <head>
                    <link rel='stylesheet' href='css/style.css'>
                </head>
                <h1> PAGE DETAIL CAR </h1>
                <div>
                    <h4>Identifiant véhicule : {$id}</h4>
                    <hr>
                    <h2>Marque véhicule : {$model}</h2>
                    <div>
                        <img src='{$image}' alt='image alternative {$model}'>
                    </div>
                    <h3>Véhicules vendus : {$vendu}</h3>
                    <h3>Véhicules en stock : {$stock}</h3>
                    <p>{$info}</p>
                    <a href='update.php?id={$id}'>Modifier</a>
                    <a href='delete.php?id={$id}'>Supprimer</a>
                </div>
            ";
        };
    };



?>