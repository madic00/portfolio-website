<?php 

    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT']. "/portfolio-website/");
    define("MODELS", SITE_ROOT . "backend/models/");
    define("IMG_PATH", SITE_ROOT . "assets/images/");

    require_once "functions.php";

    require_once MODELS . "database.php";
    require_once MODELS . "dbobject.php";
    require_once MODELS . "session.php";


?>