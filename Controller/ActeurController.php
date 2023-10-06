<?php
 
 namespace Controller;
use Model\Connect ;

class   ActeurController { 
    public function ListActeurs () {
        $pdo = Connect::seConnecter();
        $requeteActeur = $pdo -> prepare(
        "SELECT id_acteur, prenom,nom, dateDeNaissance
        FROM acteur");
        $requeteActeur->execute();

        require "view/listActeur.php";

    }

    public function detailActeurs($id) {
        $pdo = Connect::seConnecter();
        $requeteActeur = $pdo -> prepare(" SELECT * FROM acteur 
        WHERE acteur.id_acteur = :id" );
        $requeteActeur -> execute(["id" => $id]);
       
       
        $requeteActeur2 = $pdo -> prepare(
        "SELECT  role.nomPersonnage, film.titre
        FROM casting
        INNER JOIN acteur
        ON acteur.id_acteur = casting.id_acteur
        INNER JOIN role
        ON role.id_role = casting.id_role
        INNER JOIN film
        ON casting.id_film = film.id_film
        WHERE acteur.id_acteur = :id");
        $requeteActeur2->execute(["id" => $id]);

        require "view/detailActeur.php";

    }

    public function formAjouterActeur() {
        require "view/ajouterActeur.php";
    }

    public function ajouterActeur() {
         // Connection à la bdd
        $pdo = Connect::seConnecter();

        // si je soumet le formulaire
        if(isset($_POST["submit"])) {
            // va filtrer le champ de texte "nomPersonnage" et le protéger des failles XSS
            $prenomActeur = filter_input(INPUT_POST, "prenom",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nomActeur = filter_input(INPUT_POST, "nom",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexeActeur = filter_input(INPUT_POST, "sexe",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $naissanceActeur = filter_input(INPUT_POST, "dateDeNaissance", FILTER_VALIDATE_REGEXP, array(
                "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
            ));
           

             // verifie bien que nomPersonnage existe c'est à dire qu'il a passé l'étape précèdente en respectant les conditions de notre filter_input
            if($prenomActeur && $nomActeur && $sexeActeur && $naissanceActeur   ) {
                // On prépare notre requete afin de la protéger des failles injection SQL
                $requeteInsertActeur = $pdo->prepare("INSERT INTO acteur (prenom, nom, dateDeNaissance, sexe) VALUES (:prenom, :nom, :dateDeNaissance, :sexe)");
                // Une fois qu'on a prépare notre requete on peut tranquillement éxécuter notre requete sans craindre les failles SQL
                $requeteInsertActeur->execute(
                    [
                        "prenom" => $prenomActeur, 
                        "nom" => $nomActeur,
                        "sexe" => $sexeActeur,
                        "dateDeNaissance" => $naissanceActeur
                        

                        
                        
                    ]
                );

                
                header("Location: index.php?action=ListActeurs");
            }
        }
    }

}