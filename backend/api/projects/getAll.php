<?php 

    require_once "../../init.php";

    responseHeader();

    $projects = Project::getAll();
    
    $error = "";

    echo json_encode($projects); // ovde da vratim da se vraca niz

?>