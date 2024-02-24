<?php
    require_once 'header.php';

    $host = 'localhost'; 
    $dbname = 'cars_db';
    $user = 'root';
    $password = '**********';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion réussie à la base de données<hr>";
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    };

    try {
        $requete = 'SELECT * FROM car';
        $stmt = $pdo->query($requete);
        // ! STOCK VARIABLE DATABASE ($carsDb)
        $carsDb = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    };

    // ! RECEPTION DATA OK
    // var_dump($carsDb);
    // echo '
    //     <h1>---- Mise à Jour Effective ----</h1>
    //     <hr>
    // ';

?>
