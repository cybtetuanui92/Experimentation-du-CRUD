<?php
    session_start();
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Expérimentation CRUD</title>
</head>
<body>
    <!-- ICI FIRST ACT TO DO, vérif de la récupération des données (var_dump => data) RAS-->
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // ! ICI, gestion de l'incrémentation des IDs
        function counter (){          
            $lastCar = end($_SESSION['cars']);
            $indexElement = key($_SESSION['cars']);

            foreach($_SESSION['cars'] as $car){
                if ($car['id'] > $indexElement) {
                    $indexElement = $car['id'];
                }
            };
            $indexElement++;
            return $indexElement;
        };
        // ! ICI, recup des inputs NEW CAR (fonctionnalité CREATE/ADD)
        $newId = counter();
        $newModel = $_POST['model'];
        $newImage = $_POST['image'];
        $newVendu = $_POST['vendu'];
        $newStock = $_POST['stock'];
        $newInfo = $_POST['info'];


        $newLayer = [
            "id" => "$newId", 
            "model" => "$newModel", 
            "vendu" => "$newVendu", 
            "stock" => "$newStock", 
            "info" => "$newInfo",
            "image" => "$newImage" 
        ];

        array_push($_SESSION['cars'], $newLayer);
        
    };


        // ! ICI, boucle pour parcourir mon tableau de donnée ($_SESSION['cars'])
        // ! et avoir un accés aux différents éléments et leurs clés associatives
        foreach ($_SESSION['cars'] as $car) {
            $id = $car['id'];
            $model = $car['model'];
            $image = $car['image'];
            $vendu = $car['vendu'];
            $stock = $car['stock'];
            $info = $car['info'];

            // ! définition du READ
            echo " 
                <div>
                    <h4>Identifiant véhicule : {$id}</h4>
                    <hr>
                    <h2>Marque véhicule : {$model}</h2>
                    <div>
                        <img src='{$image}' alt='image alternative {$model}'>
                    </div>
                    <a href='detail.php?id={$id}'>Détails ...</a>
                </div>
            ";
        };
    ?>
</body>
</html>