<!DOCTYPE html>
<html>
<body>

<h1>Détail de l'étudiant: </h1>

<hr/>

<?php

//validation des données fournies par l'utilisateur
if (!isset($_GET["CodeE"]))
    die("Vous n'avez pas fourni le code de l'étudiant à chercher");
elseif (!is_string($_GET["CodeE"]))
    die("Le code fourni n'est pas valide");
else
    $c = htmlspecialchars($_GET["CodeE"]);


//connexion à la base de données
$cn = new PDO('mysql:host=localhost;dbname=phplabs', 'root', '');

//accéder à la base de données pour chercher l'étudiant du code $c
$resultat = $cn->query("select * from Etudiant where code='$c'");
if ($resultat->rowCount() == 0)
    echo("Aucun étudiant trouvé!");
else {
    $etudiant = $resultat->fetch();
    ?>


    <b> Code : <?= $etudiant["code"] ?>  </b><br/>
    <b> Nom : <?= $etudiant["nom"] ?>  </b><br/>
    <b> Prénom : <?= $etudiant["prenom"] ?>  </b><br/>
    <b> Filière : <?= $etudiant["filiere"] ?>  </b><br/>
    <b> Note : <?= $etudiant["note"] ?>  </b><br/>

    <br/>


<?php } ?>

</body>
</html>
 