<?php 
ob_start();
$film = $requeteActeur->fetch();
?> 

<h3><?= $film["prenom"] ?></h3>
<h3><?= $film["nom"] ?></h3>

<h3><?= $film["dateDeNaissance"] ?></h3>

<?php 

    $titre = "Détail d'un acteur";
    $titre_secondaire = "Détail d'un acteur";
    $contenu = ob_get_clean();
    require "view/template.php";
?>
YTREZ