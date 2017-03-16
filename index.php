<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once 'controller/pdo.php';
require_once 'controller/classes/class.php';

$article = new Article();

$page = "index.php";
define('WEBROOT', str_replace($page, '', $_SERVER['SCRIPT_NAME']));

    $page = "views/accueil.php";

    if (isset($_GET['page'])) {
        $page = "views/".$_GET['page'].".php";
    }

include("views/templates/head.php");
