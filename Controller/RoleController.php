<?php

namespace Controller;
use Model\Connect ;

class RoleController {
    public function ListRoles () {
        $pdo = Connect::seConnecter();
        $requeteRoles= $pdo -> prepare(
        "SELECT id_role, nomPersonnage
        FROM role ORDER BY nomPersonnage
        ");
        $requeteRoles->execute();

        require "view/listRole.php";

    }
    public function DetailRoles ($id) {
        $pdo = Connect::seConnecter();
        $requeteRoles1 = $pdo->prepare(
            "SELECT nomPersonnage
            FROM role
            WHERE id_role = :id"
        );
    
        $requeteRoles1->execute(["id" => $id]);
    

         $requeteRoles2= $pdo -> prepare
         ("SELECT DISTINCT acteur.prenom, acteur.nom, film.titre
         FROM casting
         INNER JOIN role ON role.id_role = casting.id_role
         INNER JOIN acteur ON acteur.id_acteur = casting.id_acteur
         INNER JOIN film ON casting.id_film = film.id_film
         WHERE role.id_role = :id");
         $requeteRoles2->execute(["id" => $id]);
           
        require "view/detailRole.php";

    }

    public function formAjouterRole() {
        require "view/ajouterRole.php";
    }

    public function ajouterRole() {
         // Connection à la bdd
        $pdo = Connect::seConnecter();

        // si je soumet le formulaire
        if(isset($_POST["submit"])) {
            // va filtrer le champ de texte "nomPersonnage" et le protéger des failles XSS
            $nomPersonnage = filter_input(INPUT_POST, "nomPersonnage", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             // verifie bien que nomPersonnage existe c'est à dire qu'il a passé l'étape précèdente en respectant les conditions de notre filter_input
            if($nomPersonnage) {
                // On prépare notre requete afin de la protéger des failles injection SQL
                $requeteInsertRole = $pdo->prepare("INSERT INTO role (nomPersonnage) VALUES (:nomPersonnage)");
                // Une fois qu'on a prépare notre requete on peut tranquillement éxécuter notre requete sans craindre les failles SQL
                $requeteInsertRole->execute(["nomPersonnage" => $nomPersonnage]);

                //Une fois qu'on a ajouter notre rôle on se redirige vers listRole afin de vérifier si notre nouveau role a bien été ajouté
                header("Location: index.php?action=ListRoles");
            }
        }
    }
}
