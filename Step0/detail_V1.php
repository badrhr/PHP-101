<?php 
//Modèle
//accès aux données (modèle)
function getDetailEtudiant($code) {
	$cn = new PDO('mysql:host=localhost;dbname=phplabs', 'root', '');
	return $cn->query("select * from Etudiant where code='$code'")-> fetch();
}


//Controlleur

//validation des données fournies par l'utilisateur
if(!isset($_GET["CodeE"])) 
	die("Erreur: Vous n'avez pas fourni le code de l'étudiant à chercher");
elseif(!is_string($_GET["CodeE"])) 
	die("Erreur: Le code fourni n'est pas valide");
else
	$c=htmlspecialchars($_GET["CodeE"]);


$etudiant= getDetailEtudiant($c);

if (empty($etudiant)){ 
	die("Erreur: Aucun étudiant trouvé!");
}



//affichage (Vue)

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


 