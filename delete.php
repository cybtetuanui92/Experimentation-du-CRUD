<?php
    require_once 'data.php';
    require_once 'header.php';

    $urlId = $_GET['id'];
    $tab = $carsDb;


    foreach($tab as &$car) {
        
        $tab;
        $idCor = $car['id'];
        if ($urlId == $idCor) {
            $index = array_search($car, $tab);
            $viewRemoved = array_splice($tab, $index, 1);
    
            echo '<h1>Voici l\'élément supprimé et le tableau à jour :</h1>';
            echo '<pre>';
            print_r ($viewRemoved);
            echo '</pre><hr>';
            echo '<pre>';
            print_r ($tab);
            echo '</pre>';

            $requete = "DELETE FROM car WHERE id = :id";
            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':id', $urlId);
            $stmt->execute();

        }
    };



?>