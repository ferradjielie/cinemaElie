<?php 
ob_start();


$genres1 = $requeteGenres1->fetch();
$genres2 = $requeteGenres2->fetchAll();



?> 

<?php
    echo "<h2>".$genres1["libelle"]."</h2>";
?>

<?php foreach ($genres2 as $genre2) {
    echo "<h4>{$genre2["titre"]}            </h4>";   
    

} ?>

<?php
    $titre = "Détail d'un genre";
    $titre_secondaire = "Détail d'un genre";
    $contenu = ob_get_clean();
    require "view/template.php";
?>
