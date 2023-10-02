<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteRealisateurs-> rowCount() ?> réalisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Nom </th>
             <th> Date de naissance </th>
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteRealisateurs->fetchAll() as $film) { ?>
             <tr>
                   <td><?= $film["prenom"]?> </td>
                   <td><?= $film["nom"]?> </td>
                   
                

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