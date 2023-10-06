<?php 
ob_start();

?> 

<form action="index.php?action=ajouterRealisateur" method="POST">
    <label for="prenom">Prénom</label>    
    <input type="text" name="prenom" id="prenom"><br>
    <label for="nom">Nom</label>    
    <input type="text" name="nom" id="nom"><br>
    <input type="submit" name="submit" value="Ajouter prénom d'un Réalisateur">
</form>


<?php 
$titre = "Ajouter un Réalisateur";
$titre_secondaire = "Ajouter un Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>