<!-- Lahmar Nelly | Page d'acutalités avant connexion -->


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
					<a href = "inscription.php"> Inscription/Connexion</a>
					<a href = "actualites.php"> Actualités</a>
					<a href = "contact.php"> Contact</a>
				</nav>
												
			</header>

		<head>
		<link rel="stylesheet" href="../css/site.css">
		</head>
		
		<body>
		<?php 
		include "../controllers/sujets.php";
		?>
			<h1>Actualités | ISEP</h1>
			
			<section id='section_G'>
			
				<?php 
						while($actualite = $article->fetch()){ ?>
							<section class="sujet">
							
								<p><?php echo $actualite['contenu'];?></p>
								<p>Posté par <?php echo $actualite['personne'];?> le <?php echo $actualite['date']; ?></p>
								<p>Catégorie <?php echo $actualite['categorie']?></p>
							</section>
							
						<?php 
						}
						?>
			
			</section>
			
			<section id='section_D'>
			
				<h2>Filtrer :</h2>
				<form method="get" action="../controllers/actualites.php" enctype="multipart/form-data">
						
						
					<p><label for="auteur">Par auteur du sujet :</label>
					<select name="auteur">
					
						<?php 
						
						$personne = recupereTous($bdd, 'personne');
						foreach ($personne as $donnees) {
							$auteur = $donnees['login'];
							echo("<option> $auteur </option>");
						}
						
						?>
						
					</select></p>
					
					<p><label for="categorie">Par catégorie :</label>
					<select name="categorie">
						
						<?php 
					
						$categories = recupereTous($bdd, 'categories');
						foreach ($categories as $donnees) {
							$categorie = $donnees['nom'];
							echo("<option> $categorie </option>");
						}
					
						?>

					</select></p>
					
					<p><label for="date">Articles postérieurs à la date :</label>
					<input type="date" name="date"/></p>
																			
					<button type="submit">Sélectionner</button>
				</form>
			
			
			</section>


