<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteActeur-> rowCount() ?> acteurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Prenom Nom </th>
          
             <th> Date de naissance </th>
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteActeur->fetchAll() as $acteur) { 
              
                ?>
             <tr>
                   
             <td><a href="index.php?action=detailActeurs&id=<?=$acteur["id_acteur"] ?>">  <?=$acteur["prenom"]?>  <?= $acteur["nom"]?>        </a> </td>
                    <td><?= $acteur["dateDeNaissance"] ?> </td>

             </tr>
        <?php    } ?>
        </tbody>
</table>

<?php 

    $titre = "Ma liste d'acteurs";
    $titre_secondaire = "Liste des acteurs";
    $contenu = ob_get_clean();
    require "view/template.php";
?>