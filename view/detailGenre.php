<?php 
ob_start();
$genre = $requeteGenres->fetch();
?> 

<td><?= $genre["titre"]?> </td>




<?php 

    $titre = "Détail d'un réalisteur";
    $titre_secondaire = "Détail d'un réalisateur";
    $contenu = ob_get_clean();
    require "view/template.php";
?>