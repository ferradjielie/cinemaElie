<?php 
ob_start();
$role1 = $requeteRoles1->fetch(); // Récupère les résultats de la première requête
$roles2 = $requeteRoles2->fetchAll(); // Récupère les résultats de la deuxième requête
?>

<h2><?= $role1["nomPersonnage"] ?></h2>

<?php
// Utilisez une boucle pour parcourir les résultats de la deuxième requête
foreach ($roles2 as $role2) {
    echo "<h4>{$role2["prenom"]} {$role2["nom"]} ({$role2['titre']})</h4>";
}
?>

<?php 
$titre = "Détail d'un role";
$titre_secondaire = "Détail d'un role";
$contenu = ob_get_clean();
require "view/template.php";
?>
