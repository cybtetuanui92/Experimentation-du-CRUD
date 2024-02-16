<?php
    session_start();
    require_once 'header.php';

    $urlId = $_GET['id'];
    foreach($_SESSION['cars'] as $car) {
        $idCor = $car['id'];
        if ($urlId == $idCor) {
            $upModel = $car['model'];
            $upVendu = $car['vendu'];
            $upStock = $car['stock'];
            $upImage = $car['image'];
            $upInfo = $car['info'];

            // ! traitement du update sur la page détails pour l'affichage direct après modification
            echo "
                <form action='detail.php?id=$idCor' method='POST' class='form-example'>
                    <div class='form-example'>
                        <label for='model'>Modifier le modèle : </label>
                        <input type='text' name='model' id='model' value='$upModel' />
                    </div>
                    <div class='form-example'>
                        <label for='image'>Nouvelle image : </label>
                        <input type='text' name='image' id='image' value='$upImage' />
                    </div>
                    <div class='form-example'>
                        <label for='vendu'>Nouvelle quantité vendu : </label>
                        <input type='number' name='vendu'id='vendu' value='$upVendu' />
                    </div>
                    <div class='form-example'>
                        <label for='stock'>Changement des stocks : </label>
                        <input type='number' name='stock' id='stock' value='$upStock' />
                    </div>
                    <div class='form-example'>
                        <label for='info'>Modification Informations : </label>
                        <input type='text' name='info' id='info' value='$upInfo' />
                    </div>
                    <div class='form-element'>
                        <input type='submit'value='Valider les modifications' />
                    </div>
                </form>
            ";

        }
    };

?>