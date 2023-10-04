<?php 
ob_start();
$genre = $requeteGenres->fetch();
$genre2 = $requeteGenres2->fetch(); 

?> 

<h4><?= $genre["libelle"] ?></h4>

<h4><?= $genre2["titre"] ?></h4>

<?php 


    $titre = "Détail d'un genre";
    $titre_secondaire = "Détail d'un genre";
    $contenu = ob_get_clean();
    require "view/template.php";
?>
