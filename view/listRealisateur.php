<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteRealisateurs-> rowCount() ?> réalisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Prenom Nom </th>
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteRealisateurs->fetchAll() as $realisateur) { ?>
             <tr>
             <td><a href="index.php?action=detailRealisateurs&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["prenom"]?>  <?= $realisateur["nom"]?>     </a></td>
                   
                   
                

             </tr>
        <?php    } ?>
        </tbody>
</table>

<?php 

    $titre = "Ma liste de réalisateurs";
    $titre_secondaire = "Liste des réalisteurs";
    $contenu = ob_get_clean();
    require "view/template.php";
?>