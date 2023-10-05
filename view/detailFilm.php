<?php 
ob_start();
$film = $requeteFilm->fetch();
$films2 = $requeteFilm2 -> fetchAll ();

?> 

<h1><?= $film["titre"] ?></h1>
<p> <strong>Date de Sortie : </strong> <?= $film["dateSortie"] ?>   </p>
<p> <strong> Note :</strong> <?= $film["note"] ?></p>
<img src="<?= $film["afficheDeFilm"] ?>" alt="">
<p> <strong>Durée : </strong><?= $film["duree"]." ". "minutes" ?>      </p>
<p><strong>Synopsis : </strong>  <?= $film["synopsis"] ?> </p>

<h2>Casting</h2>

<?php     foreach($films2 as $film2) {
          echo "<h4> {$film2["prenom"]}   {$film2["nom"]}  dans le rôle de  {$film2["nomPersonnage"]}          </h4>";   
    
}                                           ?>

<?php 

    $titre = "Détail d'un film";
    $titre_secondaire = "Détail d'un film";
    $contenu = ob_get_clean();
    require "view/template.php";
?>