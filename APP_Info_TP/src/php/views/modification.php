<!-- Lahmar Nelly | Page de modification des messages -->


<?php session_start(); ?>



<!DOCTYPE html>

	<html>
	
		<head>
		
			<meta charset="UTF-8">
			<title>Ma page</title>
			<link rel="stylesheet" href="../../css/style.css">
   			
		</head>
			<header>
			
				<!-- Logo ISEP -->
				<img src = "../../../res/logo_isep.png" alt = "Logo du site" id="logo"/>
				
				
				<!-- Liens -->
				<nav>
					<a href = "accueil.php"> Accueil</a>
					<a href = "actualitesHorsConnexion.php"> Actualités</a>
					<a href = "contact.php"> Contact</a>
					<a href = "administration.php"> Administration</a>
				</nav>
				
				<form method="post" action="../controllers/utilisateur.php">
							
					<input type="hidden" name='form' value='deconnexion'>
					<button type = "submit"> Déconnexion </button>
				
				</form>
								
			</header>

		<head>
			<link rel="stylesheet" href="../css/site.css">
		</head>
		
		<body>
		<?php 
		include "../controllers/sujets.php";
		?>
			<h1>Messages</h1>
			
			<section id='message_admin'>
			
				<form name='form' method='post' action='../controllers/administration.php'>
					<input type='hidden' name='form' value='modifier'/>
					<p><label>Modifier le message : 
					<textarea name ="sujet" cols="45" rows="8"></textarea></label></p>
					<p><label>Modifier la catégorie :
					<input type='text' name='categorie'></label></p>
					<button type="submit"> Modifier</button>
				</form>
				
				
				
				
			</section>
