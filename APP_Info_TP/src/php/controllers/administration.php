<!-- Lahmar Nelly | Controller Administration (supprimer/modifier un message) -->

<?php session_start(); 

include "../models/requetes.php";

if (!isset($_POST['form']) || empty($_POST['form'])) {
	$function = "notdone";
} else {
	// L'utilisateur a soit rempli le formulaire d'inscription, soit de connexion
	$function = $_POST['form'];
}

switch ($function){
	case 'modifier' :
		$article = afficherMessage();
		$actualite = $article->fetch();
		
		
		if(isset($_POST['sujet']) && !empty($_POST['sujet'])){
			$nouveau_contenu = $_POST['sujet'];
			$colonne = 'contenu';
			$id = $actualite['id'];
			$table = 'messages';
			modification($bdd, $nouveau_contenu, $colonne, $id, $table);
		}
		
		header('location:../views/administration.php');
		break;
		
	case 'supprimer' :
		$article = afficherMessage();
		$actualite = $article->fetch();
		$id = $actualite['id'];
		$table = 'messages';
		supprimer($bdd, $id, $table);
		header('location:../views/administration.php');
		break;
	default :
		header('location:../views/administration.php');
}







?>