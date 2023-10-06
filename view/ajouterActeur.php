<?php 
ob_start();

?> 

<form action="index.php?action=ajouterActeur" method="POST">
    <label for="prenom">Prénom</label>    
    <input type="text" name="prenom" id="prenom"><br>
    <label for="nom">Nom</label>    
    <input type="text" name="nom" id="nom"><br>
    
    <label for="sexe">Sexe</label>    
    <input type="text" name="sexe" id="sexe"><br>
    
    <label for="dateDeNaissance">Date de Naissance (YYYY-MM-DD)  </label>    
    <input type="date" name="dateDeNaissance" id="dateDeNaissance"  placeholder="YYYY-MM-DD">       ><br>

    <input type="submit" name="submit" value="Ajouter un Acteur">
</form>

<?php 
$titre = "Ajouter un Acteur";
$titre_secondaire = "Ajouter un Acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>