<?php 	
header('Content-Type: text/html; charset=utf-8');
// require_once '/home/eddyr/Blog_indiv_POO/controller/classes/class.php';
// $article = new Article();
?>
<main class="container">
	<div class="display">
	<div class="divarticle">
<?php
   if (isset($_GET['author'])) {
	  
	  $result = $article->DisplayByAuthor($_GET['author']); 
	  
   }
   else if (isset($_GET['category'])) {
	   $result = $article->DisplayByCategory($_GET['category']);
   }
   else if (isset($_GET['article'])) {
	   $result = $article->DisplayByArticle();
   }
   else {
	    $result = $article->DisplayByDefault();
   }  
   
   foreach ($result as $row){
	   ?>
		<div>
		<br>
		<h2 class='title'><?= $row->titre?></h2>
		<p class='content'><?= $row->contenu?><p>
		<p class='cat'><?= $row->nom_categorie?></p>
		<h5 class='author'>Article de <?= $row->prenom_auteur?> <?= $row->nom_auteur?></h5>
		<hr>
		
  <?php }?>
</div>
</div>
<!----<script>
// $(document).ready(function(e) { 	
		
		// $('.popup').on('click',function(e) {
		// e.preventDefault();	
		// $("body").append('<div id="green"></div>');
		// $('div#pop').fadeIn()				
	
		// });
	
		// $('.bouton').on('click',function() { 
		// $("#green").remove();

		// $('div#pop').fadeOut()         
		// });
// });
</script>---->
	<!----<div id="pop">
		<?php 	//print "<h2 class='titre'>".$row["titre"]."</h2>";
					// print "<p class='text'>".$row["contenu"]."<p>";
					// print "<p class='cat'>".$row["nom_categorie"]."</p>";
					// print "<h5 class='author'>Article de ".$row["prenom_auteur"]. " ".$row["nom_auteur"]."</h5>";
			?>
		
		<button class="bouton">Cacher</button>
	</div>---->
	<img class="branch" src="views/images/branch.png">
</main>