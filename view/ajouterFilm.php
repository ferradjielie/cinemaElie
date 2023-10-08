<?php 
ob_start();
$realisateurs = $requeteRealisateurs->fetchAll();
?> 

<form action="index.php?action=ajouterFilm" method="POST">
    <label for="titre">Titre du film</label>    
    <input type="text" name="titre" id="titre"><br>
    
    <label for="dateDeSortie">Date de sortie</label>    
    <input type="date" name="DateDeSortie" id="DateDeSortie"><br>

    <label for="note">Note</label>    
    <input type="number" name="note" id="note"><br>

    <label for="affiche">Affiche du film</label>    
    <input type="text" name="afficheDeFilm" id="AfficheDeFilm"><br>

    <label for="duree">Durée</label>    
    <input type="number" name="duree" id="duree"><br>


    <label for="synopsis">Synopsis</label>    
    <input type="text" name="synopsis" id="synopsis"><br>

    <label for="realisateur">Realisateur</label>
    <select name="realisateur" id="realisateur">
        <?php
            foreach ($realisateurs as $realisateur) { ?>
                <option value="<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["prenom"]. " ".$realisateur["nom"] ?></option>
            <?php }
        ?>|
    </select>

     <input type="submit" name="submit" value="Ajouter un film">
</form>


<?php 
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();
require "view/template.php";
?>