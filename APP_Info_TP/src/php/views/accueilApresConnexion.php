<!-- Lahmar Nelly | Page d'accueil après connexion -->

<?php session_start();
include "../controllers/sujets.php";
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
echo 'Bienvenue ' . $prenom . ' ' . $nom . ' !';
?>

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
		
		<!--  Titre -->
		<h1>ISEP | Actualités</h1>
		
		
		<!-- 2 premiers blocs -->
		<section id="bloc_haut">
		
		<!-- 1e bloc -->
		<div id="div1">
		
		<!-- 1e Sous-titre -->
		<h2> Ecole d'ingénieurs du numérique</h2>
				
							<!-- Paragraphe -->
							<p>
								<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit</em>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
				
							<!-- Liste pucée -->
							<ul>
								<li> Ut auctor sem non eros blandit molestie, </li>
								<li> Pellentesque odio ipsum, </li>
								<li> mollis sit amet augue ac, </li>
								<li> bibendum condimentum nibh. </li>
							</ul>
				
							<!-- Paragraphe -->
							<p>
								Nullam <strong> vel nihb pellentesque </strong>, aliquet urna nec, faucibus nisi.
							</p>
				
						</div>
				
		
					<div id="div2">
					
						<h2>Sujets en cours</h2>
						
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
						
					</div>
				
					</section>
				
				</body>
		