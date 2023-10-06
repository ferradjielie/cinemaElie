<?php 
ob_start();

?> 

<form action="index.php?action=ajouterGenre" method="POST">
    <label for="libelle">Nom du genre :</label>
    <input type="text" name="libelle" id="libelle" placeholder="Saisir le nom du genre">
    <input type="submit" name="submit" value="Ajouter Genre">
</form>

<?php 
$titre = "Ajouter un Genre";
$titre_secondaire = "Ajouter un Genre";
$contenu = ob_get_clean();
require "view/template.php";
?>