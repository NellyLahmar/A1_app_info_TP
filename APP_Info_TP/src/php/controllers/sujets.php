<!-- Lahmar Nelly | Entre un sujet dans la base de données (table 'messages') | Filtre Date essayé, non abouti -->

<?php

include "../models/requetes.php";

if (isset($_GET['date'])){
	$filtre_date = $_GET['date'];
	messageFiltreDate($filtre_date);
	header('location:../views/actualitesApresConnexion.php');
}
else {
	$article = afficherMessage();
}



/**
 * $categorie = $bdd->query('SELECT c.nom FROM categorie c INNER JOIN message m ON c.id=m.id_categorie');
 * $personne = $bdd->query('SELECT p.nom FROM personne p INNER JOIN message m ON p.id_personne=m.id_personne');
 * 'SELECT c.nom m.contenu, m.date, p.nom FROM messages m INNER JOIN categorie c ON m.id_categorie = c.id INNER JOIN personne p ON p.id_personne = p.id_personne'
 */

if (isset($_GET['categorie']) && !empty($_GET['categorie']) && isset($_GET['sujet']) && !empty($_GET['sujet'])) {
	session_start();
	$Nouveau_message = array(
			'contenu' => $_GET['sujet'],
			'date' => date("Y-m-d"),
			'personne' => $_SESSION['login'],
			'categorie' => $_GET['categorie']);
	insertion($bdd, $Nouveau_message, 'messages');
	header('location: ../views/actualitesApresConnexion.php');
}








?>