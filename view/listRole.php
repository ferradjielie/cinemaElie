<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteRoles-> rowCount() ?> rôles </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Intitulé des rôles</th>
      
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteRoles->fetchAll() as $film) { ?>
             <tr>
                   <td><?= $film["nomPersonnage"]?> </td>
                    

             </tr>
        <?php    } ?>
        </tbody>
</table>

<?php 

    $titre = "Ma liste de rôles";
    $titre_secondaire = "Liste des rôles";
    $contenu = ob_get_clean();
    require "view/template.php";
?>