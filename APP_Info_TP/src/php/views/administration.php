<!-- Lahmar Nelly | Page Administration -->


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
					<a href = "accueilApresConnexion.php"> Accueil</a>
					<a href = "actualitesApresConnexion.php"> Actualités</a>
					<a href = "contact.php"> Contact</a>
					<?php 
					if($_SESSION['type']=='administrateur'){
						?>
						<a href = "administration.php"> Administration</a>
					<?php 
					}
					else {
						?>
						<a href = "administrationUtilisateurLambda.php"> Administration</a>
					<?php 
					}
					?>
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
			<h1>Actualités | ISEP</h1>
			
			<section id='message_admin'>
			
				<?php 
						while($actualite = $article->fetch()){ ?>
							<section class="sujet">
							
								<p><?php echo $actualite['contenu'];?></p>
								<p>Posté par <?php echo $actualite['personne'];?> le <?php echo $actualite['date']; ?></p>
								<p>Catégorie <?php echo $actualite['categorie']?></p>
								<p>id de l'auteur <?php echo $actualite['id']?></p>
								
								<form name='modification' method='post' action='modification.php'>
									<input type='hidden' name='form' value='modifier'/>
									<button type='submit'>Modifier</button>
								</form>
								
								
								<form name='form2' method='post' action='../controllers/administration.php'>
									<input type='hidden' name='form' value='supprimer'/>
									<button type='submit'> Supprimer</button>
								</form>
								
							</section>
							
						<?php 
						}
						?>
			
			</section>
