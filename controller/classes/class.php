<?php
require_once '../controller/pdo.php';

class Article {
	
	
	public function CreateArticle() {
		global $pdo;
		
		$titre = $_POST['title'];
		$contenu = $_POST['content'];
		$authorname = $_POST['authorname'];
		$authorfname = $_POST['authorfname'];
		$categoryname = $_POST['category'];
		
		// $sqlart="INSERT INTO articles (titre, contenu, nom_auteur, prenom_auteur, nom_categorie) VALUES ('".$titre."', '".$contenu."', '".$authorname."', '".$authorfname."', '".$categoryname."')";
		$sqlcat="INSERT INTO categories (nom_cat) VALUES ('".$categoryname."')";
		$sqlaut="INSERT INTO auteurs (nom_auteur, prenom_auteur) VALUES ('".$authorname."', '".$authorfname."')";
		$sqlselectcatid = "SELECT :id_cat FROM categories";
		$sqlselectautid = "SELECT :id_auteur FROM auteurs";
		$verifyauthor = "SELECT nom_auteur,prenom_auteur FROM auteurs";
		$verifycategory = "SELECT nom_cat FROM categories";
		// $sqlinsertcatid = "INSERT INTO articles (idcategorie) VALUES ('".$id_cat."')";
		// $sqlinsertcatid = "INSERT INTO articles (idauteur) VALUES ('".$id_aut."')";
		
		// $query= $pdo->query($verifyauthor);
		// $res = $query->fetchAll();
		
		// foreach ($res as $row) {
			
			// $row->nom_auteur;
			// $row->prenom_auteur;
		// }
		
		// $query= $pdo->query($verifycategory);
		// $rlt = $query->fetchAll();
		
		// foreach ($rlt as $line) {
			
			// $line->nom_cat;
		// }
		
		// if (!isset($row->nom_auteur) && !isset($row->prenom_auteur) && !isset($line->nom_cat)) {	
		// $query = $pdo->query($sqlart);
		$query = $pdo->query($sqlcat);
		$checkid = $pdo->prepare($sqlselectcatid);
        $id_cat = $pdo->lastInsertId();
		var_dump($id_cat);
		$exe = $checkid->execute( [":id_cat" => $id_cat]);
		$query = $pdo->query($sqlaut);
		// $inscat = $pdo->query("INSERT INTO articles (idcategorie) VALUES ('".$id_cat."')");
		$checkaut = $pdo->prepare($sqlselectautid);
        $id_aut = $pdo->lastInsertId();
		var_dump($id_aut);
		$exec = $checkaut->execute( [":id_auteur" => $id_aut]);
		// $insaut = $pdo->query("INSERT INTO articles (idauteur) VALUES ('".$id_aut."')");
		$insintoart = $pdo->query("INSERT INTO articles (titre, contenu, nom_auteur, prenom_auteur, nom_categorie, idcategorie, idauteur) VALUES ('".$titre."', '".$contenu."', '".$authorname."', '".$authorfname."', '".$categoryname."', '".$id_cat."', '".$id_aut."')");

	}
	
	public function DisplayByCategory($category) {
		global $pdo;
		
		$sqldispcat="SELECT * FROM articles WHERE idcategorie='".$category."' ORDER BY idcategorie DESC";
		$query = $pdo->query($sqldispcat);
        return $query->fetchAll();
		
	}
	
	public function DisplayByAuthor($author) {
		global $pdo;
		$sqldispaut= "SELECT * FROM articles WHERE idauteur=".$author." ORDER BY idauteur DESC";
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
		$sqlmenuaut = "SELECT idauteur,nom_auteur,prenom_auteur FROM articles GROUP BY nom_auteur";
		$query = $pdo->query($sqlmenuaut);
		return $query->fetchAll();
	}
	public function CategoryMenu() {
		global $pdo;
		$sqlmenucat = "SELECT idcategorie, nom_categorie FROM articles GROUP BY nom_categorie";
		$query = $pdo->query($sqlmenucat);
		return $query->fetchAll();
	}
}
