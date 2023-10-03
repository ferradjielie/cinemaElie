<?php 
ob_start();
$realisateur = $requeteRealisateurs->fetch();
?> 

<h4> <?= $realisateur["prenom"] ?>   <?= $realisateur["nom"] ?>  </h4>




<?php 

    $titre = "Détail d'un réalisteur";
    $titre_secondaire = "Détail d'un réalisateur";
    $contenu = ob_get_clean();
    require "view/template.php";
?>