<?php ob_start();?> 

<p class="uk-label uk-label-warning"> Il y a <?= $requeteRoles-> rowCount() ?> rôles </p>

<a href="index.php?action=formAjouterRole">Ajouter un rôle</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
             <th>Intitulé des rôles</th>
      
                   
        </tr>

    </thead>
    <tbody>
        <?php
             foreach($requeteRoles->fetchAll() as $role) { ?>
             <tr>
             <td><a href="index.php?action=DetailRoles&id=<?= $role["id_role"] ?>"> <?= $role["nomPersonnage"] ?> 
             <td><a href="index.php?action=SupprimerRole&id=<?= $role["id_role"] ?>">Supprimer</a></td>
                    

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