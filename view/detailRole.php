<?php 
ob_start();
$role1 = $requeteRoles1->fetch(); // Récupère les résultats de la première requête
$role2 = $requeteRoles2->fetch(); // Récupère les résultats de la deuxième requête
?>

<h4><?= $role1["nomPersonnage"] ?></h4>

<h4><?= $role2["prenom"] ?> <?= $role2["nom"] ?></h4>

<?php 
$titre = "Détail d'un role";
$titre_secondaire = "Détail d'un role";
$contenu = ob_get_clean();
require "view/template.php";
?>
