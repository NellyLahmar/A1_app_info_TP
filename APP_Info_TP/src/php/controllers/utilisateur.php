<!-- Lahmar Nelly | Affiche une vue en fonction de l'état de connexion | Inspiré de KingDome -->


<?php


// Si l'utilisateur n'a rien fait, on affiche la vue par default
if (!isset($_POST['form']) || empty($_POST['form'])) {
    $function = "notdone";
} else {
    // L'utilisateur a soit rempli le formulaire d'inscription, soit de connexion
	$function = $_POST['form'];
}
include "../models/requetes.php";


$Validation = true;


switch ($function) {
    case 'notdone':
        if (isUserConnected()){
            // On affiche la vue du compte utilisateur
            header('location:../views/accueilApresConnexion.php');
            
        }
        else {
            // formulaire pas encore rempli -> on affiche le formulaire
        	header('location:../views/inscription.php');
        }
            break;

    case 'inscription':
        // formulaire inscription rempli -> verification des données

    	$Validation = true;
    	$Message_erreur = "";
    	
    	$Validation = true;
    	$Message_erreur = "";
    	
    	if(Login_Exists($bdd, 'personne', $_POST['login'])){
    		$Validation = false;
    		$Message_erreur = "Ce login est déjà pris";
    	}
    	
    	else if ($_POST['password']!=$_POST['password_confirmation'] ){
    		$Validation = false;
    		$Message_erreur = "Les mots de passe ne sont pas identiques";
    	}
    	
    	
    	if ($Validation){
    		
    		$Nouvelle_personne = array(
    				'nom' => $_POST['nom'],
    				'prenom' => $_POST['prenom'],
    				'login' => $_POST['login'],
    				'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    		);
    		
    		insertion($bdd, $Nouvelle_personne, 'personne');
    		session_start();
    		$_SESSION['connected']='connected';
    		$_SESSION['nom']=$_POST['nom'];
    		$_SESSION['prenom']=$_POST['prenom'];
    		$_SESSION['login']=$_POST['login'];
 
    		header('Location: ../views/accueilApresConnexion.php');
    		
    	}
    	
    	else {
    		echo $Message_erreur ;
    	}

        break;

    case 'connexion':
        // formulaire connexion rempli -> verification des données;

    	$Validation = false;
    	$Message_erreur = "";
    	$personne = recupereTous($bdd, 'personne');

    	foreach($personne as $donnees){
    		if($_POST['login']==$donnees['login']){
    			if(password_verify($_POST['password'],$donnees['password'])==true){
    				session_start();
    				$_SESSION['login']=$donnees['login'];
    				$_SESSION['prenom']=$donnees['prenom'];
    				$_SESSION['nom']=$donnees['nom'];
    				$_SESSION['id']=$donnees['id'];
    				$_SESSION['type']=$donnees['type'];
    				$Validation=true;
    			}
    		}
    	}
    	
    	if($Validation){
    		header('Location: ../views/accueilApresConnexion.php');
    	}
    	
    	else{
    		echo "Vérifiez votre login ou mot de passe";
    	}
    	break;

    case 'deconnexion':
        // On détruit la session utilisateur
        session_destroy();
        header('Location: ../views/accueil.php');
        break;


    default :
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
}


