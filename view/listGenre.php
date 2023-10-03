<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteGenres-> rowCount() ?> Genres </p>
<p>test</p>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Nom des genres </th>
             
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteGenres->fetchAll() as $genre) { ?>
             <tr>
             <td><a href="index.php?action=DetailGenres&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle"] ?>  </a></td>
             
                   
                

             </tr>
        <?php    } ?>
        </tbody>
</table>

<?php 

    $titre = "Ma liste de genres";
    $titre_secondaire = "Liste des genres";
    $contenu = ob_get_clean();
    require "view/template.php";
?>