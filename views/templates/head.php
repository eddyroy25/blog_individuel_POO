<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Projet mini blog acs</title>
        <meta name="description" content="Bootstrap" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="views/templates/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="views/css/style.css"/>
		<meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="views/templates/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1><a href="http://eddyr.marmier.codeur.online/blog_individual/index.php">Le Blog d'Eddy</a></h1>
		<header>
			<div class="container">
				<nav class="navbar">
					<ul class="nav navbar-nav">
						
							
							<li class="dropdown">
								<a class="link dropdown-toggle" data-toggle="dropdown" href="#">AUTEURS
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
										<?php $rlt = $article->AuthorMenu();
											foreach ($rlt as $aut) {
										?>
											<li><a href='views/accueil.php?author=<?= $aut->nom_auteur?>'><?= $aut->prenom_auteur?> <?= $aut->nom_auteur?></a></li>
										<?php }?>
								</ul>
							</li>
							<li class="dropdown">
								<a class="link dropdown-toggle" data-toggle="dropdown" href="#">CATEGORIES
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									  <?php $rlt = $article->CategoryMenu();
											foreach ($rlt as $cat) {
										?>
											<li><a href='views/accueil.php?category=<?= $cat->nom_cat?>'><?= $cat->nom_cat?></a></li>
										<?php }?>
								</ul>
							</li>
							
							
							<li class="writearticle">
								<a href="views/write.php">+ Ecrire un nouvel article</a>
							</li>
							
						
					</ul>	
				</nav>
			</div>
		</header>
		<body>
			<main>
				<?php include($page); ?>
			</main>
		</body>
	</html>