<?php
    session_start();
    require_once 'header.php';



    // ! création d'une base de donnée (ICI, un tableau "$cars" de tableaux de voitures "$car")
    // * utilisation de $_SESSION['cars'], pour persister ma data pendant la manipulation CRUD
    $_SESSION['cars'] = [
        ["id" => "1", 
        "model" => "VOLVO", 
        "vendu" => "150", 
        "stock" => "620",
        "info" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facilis eveniet dolorum ea illum et facere nihil ratione excepturi temporibus 
                    sint adipisci, nulla alias fugiat dolore omnis magnam! Nihil, quibusdam aperiam.", 
        "image" => "https://upload.wikimedia.org/wikipedia/commons/3/3c/Volvo_Trucks_Logo.png" ],

        ["id" => "2", 
        "model" => "BMW", 
        "vendu" => "50", 
        "stock" => "520", 
        "info" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facilis eveniet dolorum ea illum et facere nihil ratione excepturi temporibus 
                    sint adipisci, nulla alias fugiat dolore omnis magnam! Nihil, quibusdam aperiam.",
        "image" => "https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg" ],

        ["id" => "3", 
        "model" => "SAAB", 
        "vendu" => "250", 
        "stock" => "420", 
        "info" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facilis eveniet dolorum ea illum et facere nihil ratione excepturi temporibus 
                    sint adipisci, nulla alias fugiat dolore omnis magnam! Nihil, quibusdam aperiam.",
        "image" => "https://cdn.freebiesupply.com/logos/large/2x/saab-2-logo-png-transparent.png" ],
        
        ["id" => "4", 
        "model" => "MERCEDES", 
        "vendu" => "350", 
        "stock" => "320", 
        "info" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Facilis eveniet dolorum ea illum et facere nihil ratione excepturi temporibus 
                    sint adipisci, nulla alias fugiat dolore omnis magnam! Nihil, quibusdam aperiam.",
        "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/1200px-Mercedes-Logo.svg.png" ]
    ];

    echo '
        <h1>---- Mise à Jour Effective ----</h1>
        <hr>
    ';

?>