<?php


class Article {
	
	
	public function CreateArticle() {
		global $pdo;
		
		$titre = $_POST['title'];
		$contenu = $_POST['content'];
		$authorname = $_POST['authorname'];
		$authorfname = $_POST['authorfname'];
		$categoryname = $_POST['category'];
		
		$sqlart="INSERT INTO articles (titre, contenu, nom_auteur, prenom_auteur, nom_categorie) VALUES ('".$titre."', '".$contenu."', '".$authorname."', '".$authorfname."', '".$categoryname."')";
		$sqlcat="INSERT INTO categories (nom_cat) VALUES ('".$categoryname."')";
		$sqlaut="INSERT INTO auteurs (nom_auteur, prenom_auteur) VALUES ('".$authorname."', '".$authorfname."')";
		$query = $pdo->query($sqlart);
		$query = $pdo->query($sqlcat);
		$query = $pdo->query($sqlaut);
        
	}
	
	public function DisplayByCategory($categoryn) {
		global $pdo;
		
		$categoryn = $_GET['category'];
		$sqldispcat="SELECT * FROM articles WHERE nom_categorie='".$categoryn."' ORDER BY nom_categorie DESC";
		$query = $pdo->query($sqldispcat);
        return $query->fetchAll();
		
	}
	
	public function DisplayByAuthor($authorname) {
		global $pdo;
		
		$authorn = $_GET['author'];
		$sqldispaut= "SELECT * FROM articles WHERE nom_auteur='".$authorn."' ORDER BY nom_auteur DESC";
		$query = $pdo->query($sqldispaut);
        return $query->fetchAll();
	}
	
	public function DisplayByDefault() {
		global $pdo;
		$query = $pdo->query("SELECT * FROM articles ORDER BY id_article DESC");
        return $query->fetchAll();
		
	}
	
	public function DisplayByArticle($articleid) {
		global $pdo;
		$articleid = $_GET['article'];
		$sqldispdef= "SELECT * FROM articles WHERE id_article='".$articleid."'";
		$query = $pdo->query($sqldispdef);
        return $query->fetchAll();
	}
	
	public function AuthorMenu() {
		global $pdo;
		$sqlmenuaut = "SELECT nom_auteur,prenom_auteur FROM auteurs GROUP BY nom_auteur";
		$query = $pdo->query($sqlmenuaut);
		return $query->fetchAll();
	}
	public function CategoryMenu() {
		global $pdo;
		$sqlmenucat = "SELECT nom_cat FROM categories GROUP BY nom_cat";
		$query = $pdo->query($sqlmenucat);
		return $query->fetchAll();
	}
}
