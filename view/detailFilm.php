<?php 
ob_start();
$film = $requeteFilm->fetch();
?> 

<h1><?= $film["titre"] ?></h1>
<p> <strong>Date de Sortie : </strong> <?= $film["DateDeSortie"] ?>         </p>
<p> <strong> Note :</strong> <?= $film["note"] ?></p>
<img src="<?= $film["afficheDeFilm"] ?>" alt="">
<p> <strong>Durée : </strong><?= $film["duree"]." ". "minutes" ?>                             </p>
<p><strong>Synopsis : </strong>  <?= $film["synopsis"] ?> </p>

<?php 

    $titre = "Détail d'un film";
    $titre_secondaire = "Détail d'un film";
    $contenu = ob_get_clean();
    require "view/template.php";
?>