<?php
    require_once 'header.php'; 
?>

<form action='index.php' method='POST' class='form-example'>
        <div class='form-example'>
            <label for='model'>Entrer votre modèle : </label>
            <input type='text' name='model' id='model'  />
        </div>
        <div class='form-example'>
            <label for='image'>Url de l'image : </label>
            <input type='text' name='image' id='image' />
        </div>
        <div class='form-example'>
            <label for='vendu'>Entrer la quantité de véhicule vendu : </label>
            <input type='number' name='vendu'id='vendu'  />
        </div>
        <div class='form-example'>
            <label for='stock'>Entrer la quantité en stock : </label>
            <input type='number' name='stock' id='stock' />
        </div>
        <div class='form-example'>
            <label for='info'>Informations : </label>
            <input type='text' name='info' id='info' />
        </div>
        <div class='form-element'>
            <input type='submit'value='Ajouter un nouveau véhicule !' />
        </div>
</form>