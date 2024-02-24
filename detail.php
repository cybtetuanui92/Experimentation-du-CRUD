<?php 
    require_once 'header.php';
    require_once 'data.php';
    require_once 'functions/function.php';

    
    $urlId = $_GET['id'];
    $tab = $carsDb;

    // ! PARTIE UPDATE incluse dans une PARTIE READ 
    // *  BLOC TRAITEMENT APRES MODIFICATION si POST alors MODIFICATION TRUE 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $modelExist = $_POST['model'];
        if(somethingExist($pdo, $modelExist)){
            $tab = $carsDb;
            // ! ICI, recup des données update (modifiées)
            $model = $_POST['model'];
            $image = $_POST['image'];
            $vendu = $_POST['vendu'];
            $stock = $_POST['stock'];
            $info = $_POST['info'];
            // ! ICI, parcours du tableau pour màj des inputs modifiés ('&' référence l'élément afin de modif direct)
            foreach($tab as &$car) {
                $idCor = $car['id'];
                if ($urlId == $idCor) {
                    $car['model'] = $model;
                    $car['vendu'] = $vendu;
                    $car['stock'] = $stock;
                    $car['image'] = $image;
                    $car['info'] = $info;

                    $nouvellesValeurs = [
                        'id' => $urlId, 
                        'model' => $model,
                        'vendu' => $vendu,
                        'stock' => $stock,
                        'info' => $info,
                        'image' => $image
                    ];

                    // requête PDO
                    $requete = "UPDATE car SET model = :model, vendu = :vendu, stock = :stock, info = :info, image = :image WHERE id = :id";
                    $stmt = $pdo->prepare($requete);
                    
                    // Liaison des valeurs
                    $stmt->bindParam(':id', $urlId);
                    $stmt->bindParam(':model', $model);
                    $stmt->bindParam(':vendu', $vendu);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':info', $info);
                    $stmt->bindParam(':image', $image);
                    
                    
                    // Exécution de la requête
                    $stmt->execute($nouvellesValeurs);

                    // ! Condition pour vérifier le bon UPDATE sur la DB
                    if ($stmt->rowCount() > 0) {
                        echo "La voiture a été mise à jour avec succès sur la database.";
                    } else {
                        echo "Aucune mise à jour réalisée sur la database.";
                    }

                }
            };
            // ! pour lacher la référence prise en début de boucle par "&$car"
            unset($car);
            echo '
                <h3>// Modification effectuée //</h3>  
            ';
        }else{
            echo '
            <h2>***Veuillez Créer un nouveau modèle à l\'aide du formulaire !***</h2>
            ';
        };
    }


    // * BLOC AFFICHAGE DETAIL
    // ! ICI, boucle pour parcours de la DATA (comme dab)
    foreach ($tab as $car) {
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