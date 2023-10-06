<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteFilm-> rowCount() ?> films </p>
 
<a href="index.php?action=formAjouterFilm">Ajouter un film</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>TITRE</th>
             <th> ANNEE SORTIE </th>
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteFilm->fetchAll() as $film) { ?>
             <tr>
                   <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"]?></a></td>
                    <td><?= $film["dateSortie"] ?> </td>

             </tr>
        <?php    } ?>
        </tbody>
</table>

<?php 

    $titre = "Ma liste des films";
    $titre_secondaire = "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";
?>