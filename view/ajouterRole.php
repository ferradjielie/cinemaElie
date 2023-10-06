<?php 
ob_start();

?> 

<form action="index.php?action=ajouterRole" method="POST">
    <input type="text" name="nomPersonnage" id="nomPersonnage">
    <input type="submit" name="submit" value="Ajouter Role">
</form>

<?php 
$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
require "view/template.php";
?>