<?php 
ob_start();
$acteur = $requeteActeur->fetch();
$acteurs2 = $requeteActeur2->fetchAll();
?> 

<h2><?= $acteur["prenom"]." ".$acteur["nom"] ." ". " a joué dans" ?></h2>

<?php foreach ($acteurs2 as $acteur2) { ?>
    <h4><?=  $acteur2["nomPersonnage"]." " ."dans" ." ". " ". $acteur2["titre"]?></h4>
<?php } ?>

<?php 
$titre = "Détail d'un acteur";
$titre_secondaire = "Détail d'un acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>