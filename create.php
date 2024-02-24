<?php
    require_once 'header.php'; 
?>

<form action='index.php' method='POST' enctype="multipart/form-data" class='form-example'>
        <div class='form-example'>
            <label for='model'>Entrer votre modèle : </label>
            <input type='text' name='model' id='model' placeholder='Modèle du véhicule' />
        </div>
        <div class='form-example'>
            <label for='image'>Url de l'image : </label>
            <input type='text' name='image' id='image' placeholder='https://exemple.com/image.jpg' />
        </div>
        <div class='form-example'>
            <label for='vendu'>Entrer la quantité de véhicule vendu : </label>
            <input type='number' name='vendu' id='vendu' placeholder='Quantité vendue' />
        </div>
        <div class='form-example'>
            <label for='stock'>Entrer la quantité en stock : </label>
            <input type='number' name='stock' id='stock' placeholder='Quantité en stock' />
        </div>
        <div class='form-example'>
            <label for='info'>Informations : </label>
            <input type='text' name='info' id='info' placeholder='Informations supplémentaires' />
        </div>
        <div class='form-element'>
            <input type='submit'value='Ajouter un nouveau véhicule !' />
        </div>
</form>
