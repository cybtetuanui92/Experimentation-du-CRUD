<?php
    require_once 'data.php';
    require_once 'header.php';
    require_once 'functions/function.php';
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
    <?php
        // ! RECEP DATA OK
        // echo'<pre>';
        // print_r($carsDb);
        // echo'</pre><hr>';
        // die();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // * Recupération database
            $database = $carsDb;

            function counter ($i){
                $lastCar = end($i);
                $indexElement = key($i);
                foreach($i as $car){
                    if ($car['id'] > $indexElement) {
                        $indexElement = $car['id'];
                    }
                };
                $indexElement++;
                return $indexElement;
            };

            // !DOUBLON model existant
            $modelExist = $_POST['model'];

            if(!somethingExist($pdo, $modelExist)){
                if (!empty($_POST['model']) && !empty($_POST['vendu']) && !empty($_POST['stock']) && !empty($_POST['info']) && !empty($_POST['image'])) {
                    $newId = counter($database);
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
                    array_push($carsDb, $newLayer);
    
                    // requête PDO
                    $stmt = $pdo->prepare("INSERT INTO car (id, model, vendu, stock, info, image) VALUES (:id, :model, :vendu, :stock, :info, :image)");
                    
                    // Liaison des valeurs
                    $stmt->bindParam(':id', $newLayer['id']);
                    $stmt->bindParam(':model', $newLayer['model']);
                    $stmt->bindParam(':vendu', $newLayer['vendu']);
                    $stmt->bindParam(':stock', $newLayer['stock']);
                    $stmt->bindParam(':info', $newLayer['info']);
                    $stmt->bindParam(':image', $newLayer['image']);
                    
                    // Exécution de la requête
                    $stmt->execute();
                    echo "<h2>***Nouvelle voiture ajoutée avec succès***</h2><hr>";
                }else{
                    echo "<h2>***ERROR : Veuillez remplir les champs du formulaire correctement***</h2> ";
                };                
            }else{
                echo"<h2>***Le modèle existe déjà. Veuillez créer un nouveau modèle ou modifier l'existant !***</h2>";
            };
        };
        
        foreach ($carsDb as $car) {
            $id = $car['id'];
            $model = $car['model'];
            $image = $car['image'];
            $vendu = $car['vendu'];
            $stock = $car['stock'];
            $info = $car['info'];

            echo " 
                <div>
                    <h4>Identifiant véhicule : {$id}</h4>
                    <hr>
                    <h2>Marque véhicule : {$model}</h2>
                    <div>
                        <img src='{$image}' alt='image alternative {$model}'>
                        <p> Il y a {$stock} véhicule(s) disponibles. </p>
                    </div>
                    <a href='detail.php?id={$id}'>Détails ...</a>
                </div>
            ";
        };
    ?>
</body>
</html>