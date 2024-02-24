<?php

    function somethingExist ($pdo,$modelExist) {
        $stmt = $pdo->prepare("SELECT * FROM car WHERE model = :model");
        $stmt->bindParam(':model', $modelExist);
        $stmt->execute();

        if($stmt->fetch()) {
            return true;
        }else{
            return false;
        }
    };



?>