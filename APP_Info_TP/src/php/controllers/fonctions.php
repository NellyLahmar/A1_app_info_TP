<!-- Lahmar Nelly | Récupéré et modifié via KingDome (seules les fonctions utiles ont été gardées) -->

<?php
include "../models/requetes.php";

function crypterMdp($password){
	//return sha1($password);
	return password_hash($password, PASSWORD_BCRYPT);
}


function isUserConnected(){
	if (isset($_SESSION['connected']) && !empty($_SESSION['connected']) && $_SESSION['connected'])
		return true;
}


?>