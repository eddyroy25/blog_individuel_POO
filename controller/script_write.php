<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once 'classes/class.php';
require_once 'pdo.php';

$article = new Article();

$nom = $prenom = $titre = $categorie = $contenu = "";
$error = false;

	if ( (isset($_POST["authorname"])) && (strlen(trim($_POST["authorname"])) > 0) ) {
        $nom = stripslashes(strip_tags($_POST["authorname"]));	
    }
	else {
        $_SESSION["errnom"] = "Merci d'écrire votre nom <br />";
		$error = true;
        $nom = "";
	}	
    if ( (isset($_POST["authorfname"])) && (strlen(trim($_POST["authorfname"])) > 0) ) {
        $prenom = stripslashes(strip_tags($_POST["authorfname"]));	
    }
	else {
        $_SESSION["errprenom"] = "Merci d'écrire votre prénom <br />";
		$error = true;
        $prenom = "";
    }
    if ( (isset($_POST["title"])) && (strlen(trim($_POST["title"])) > 0) ) {
        $titre = stripslashes(strip_tags($_POST["title"]));	
    }
	else {
        $_SESSION["errtitre"] = "Merci d'écrire un titre <br />";
		$error = true;
        $titre = "";
    }

    if ( (isset($_POST["category"])) && (strlen(trim($_POST["category"])) > 0) ) {
        $categorie = stripslashes(strip_tags($_POST["category"]));	
    } 
	else {
        $_SESSION["errcategorie"] = "Merci d'écrire une catégorie <br />";
		$error = true;
        $categorie = "";
    }

    if ( (isset($_POST["content"])) && (strlen(trim($_POST["content"])) > 0) ) {
        $contenu = stripslashes(strip_tags($_POST["content"]));	
    } 
	else {
        $_SESSION["errarticle"] = "Merci d'écrire votre article <br />";
		$error = true;
        $contenu = "";
    }
	
	if ($error == false) {
	
	$article->CreateArticle();
	echo 'Hello';
	}

	 //header('Location: ../views/write.php');
	 ?>