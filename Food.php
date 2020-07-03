<?php
    require 'Random/FoodController.php';
    $FoodController = new FoodController();

    if(isset($_POST['types']))
    {
        $foodTables = $FoodController->CreateFoodTables($_POST['types']);
    }
    else
    {
        $foodTables = $FoodController->CreateFoodTables('%');
    }



    $title = 'Food Overview';
    $content = $FoodController->CreateFoodDropdownList(). $foodTables;

    include 'Template.php';