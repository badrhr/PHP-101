<?php 

//Section 1
////////////////////////////.......Modèle.........../////////////
function getDetailEtudiant($code) {
	$cn = new PDO('mysql:host=localhost;dbname=SMI2021', 'root', '');
	return $cn->query("select * from Etudiant where code='$code'")-> fetch();
}



//Section 3
////////////////////////////.......Contrôlleur.........../////////////


function detailAction($code){
	//validation des données fournies par l'utilisateur
	if(empty($code)) 
		die("Erreur: Vous n'avez pas fourni le code de l'étudiant à chercher");
	elseif(!is_string($code)) 
		die("Erreur: Le code fourni n'est pas valide");
	else
		$c=htmlspecialchars($code);

	//appel au modèle
	$etudiant= getDetailEtudiant($c);

	if (empty($etudiant)){ 
		die("Erreur: Aucun étudiant trouvé!");
	}
	
	
	
	//Section 2
	////////////////////////////.......La Vue.........../////////////
?>
	 
	<!DOCTYPE html>
	<html>
	<body>

	<h1>Détail de l'étudiant: </h1>

	<hr />

    <b> Code :    <?= $etudiant["code"]    ?>  </b><br />
    <b> Nom :     <?= $etudiant["nom"]     ?>  </b><br />
    <b> Prénom :  <?= $etudiant["prenom"]  ?>  </b><br />
    <b> Filière : <?= $etudiant["filiere"] ?>  </b><br />
    <b> Note :    <?= $etudiant["note"]    ?>  </b><br />

	<br />
	</body>
	</html>

<?php
}


//Section 0
////////////////////////.......L'index...l'entrée de l'application.......///////

//appel de l'action, C'est le vrai début de l'exécution
 detailAction($_GET["CodeE"]);

 