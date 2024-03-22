<?php 
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
	
	require("View.php");
}