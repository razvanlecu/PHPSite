<?php
    require 'Random/BooksController.php';
    $BooksController = new BooksController();

    if(isset($_POST['types']))
    {
        $booksTables = $BooksController->CreateBooksTables($_POST['types']);
    }
    else
    {
        $booksTables = $BooksController->CreateBooksTables('%');
    }



    $title = 'Books Overview';
    $content = $BooksController->CreateBooksDropdownList(). $booksTables;

    include 'Template.php';