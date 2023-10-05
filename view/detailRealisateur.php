<?php 
ob_start();
$realisateurs = $requeteRealisateurs->fetchAll();
?> 
 

 <?php foreach ($realisateurs as $realisateur) {     ?>                           
               <h4> <?= $realisateur["titre"]    ?> ( <?= $realisateur [ "anneeSortie"]  ?> )  </h4>                          
  
 <?php } ?>



<?php 

    $titre = "Détail d'un réalisteur";
    $titre_secondaire = "Détail d'un réalisateur";
    $contenu = ob_get_clean();
    require "view/template.php";
?>