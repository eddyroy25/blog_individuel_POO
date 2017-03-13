<?php
require_once 'controller/pdo.php';
$page = "index.php";
define('WEBROOT', str_replace($page, '', $_SERVER['SCRIPT_NAME']));

    $page = "views/accueil.php";

    if (isset($_GET['page'])) {
        $page = "views/".$_GET['page'].".php";
    }

include("views/templates/head.php");
