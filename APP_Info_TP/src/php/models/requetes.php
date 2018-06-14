<!-- Lahmar Nelly | Récupéré et modifié au besoin via KingDome -->


<?php
include "connexionPDO.php";

/**
 * Récupère tous les éléments d'une table
 * @param PDO $bdd
 * @param string $table
 * @return array
 */
function recupereTous(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/**
 * Recherche des éléments en fonction des attributs passés en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function recherche(PDO $bdd, string $table, array $attributs): array {

    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);


    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();

}

/**
 * CREATE
 * Insère une nouvelle entrée à une table
 * @param PDO $bdd
 * @param array $values (Souvent le $_POST)
 * @param string $table
 * @return boolean
 */
function insertion(PDO $bdd, array $values, string $table): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }

    $attributs = substr_replace($attributs, '', -2, 2); //Enleve la dernière virgule pour ne pas faire échouer la requète
    $valeurs = substr_replace($valeurs, '', -2, 2); // Pareil

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key]); // pq pas juste value ?
    }

    return $donnees->execute();
}

/**
 * UPDATE
 * Modifie une variable dans une ligne d'une table ciblant son id
 * @param PDO $bdd
 * @param array $values
 * @param int $id (id de l'entrée à modifier)
 * @param string $table
 * @return boolean
 */
function modification(PDO $bdd, string $nouvelle_valeur,string $colonne, int $id, string $table): bool{
	$req = $bdd->prepare('UPDATE '.$table.' SET '.$colonne.'= :nouveau_texte WHERE id ='.$id);
	return $req->execute(array('nouveau_texte' => $nouvelle_valeur));
}

/**
 * REMOVE
 * Supprime une entrée dans devices ciblant son id
 * @param PDO $bdd
 * @param int $id
 * @param string $table
 * @return boolean
 */
function supprimer(PDO $bdd, int $id, string $table): bool{

	$req = $bdd->prepare('DELETE FROM '.$table.' WHERE id='.$id);
    return $req->execute();
}


/**
 * Retourne vrai ou faux si le login est déjà dans la base de données
 * @param PDO $bdd
 * @param string $table
 * @param string $login
 * @return bool
 */
function Login_Exists(PDO $bdd, string $table, string $login): bool {
	$statement = $bdd->prepare('SELECT COUNT(*) FROM ' . $table . ' WHERE login = :login');
	$statement->execute(array(':login' => $login));
	if($statement->fetchColumn() > 0){
		return true;
	} else {
		return false;
	}
}

/**
 * Affiche les messages dans la base de données (table 'messages')
 */
function afficherMessage(){
	global $bdd;
	$actualite = $bdd->query('SELECT * FROM messages');
	return $actualite;
	$actualite ->closeCursor();
}

/**
 * Affiche les messages filtré en fonctions de la date
 */

function messageFiltreDate($filtre_date){
	global $bdd;
	$messageFiltre = $bdd->prepare('SELECT * FROM messages m WHERE m.date <= '.$filtre_date);
	//$messageFiltre = $bdd->prepare('SELECT * FROM messages m WHERE m.date <= ?');
	//$messageFiltre->execute($filtre_date);
	return $messageFiltre;
	$messageFiltre ->closeCursor();
}
