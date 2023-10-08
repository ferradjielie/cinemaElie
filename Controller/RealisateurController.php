<?php

namespace Controller;
use Model\Connect ;

class RealisateurController {

    public function ListRealisateurs () {
        $pdo = Connect::seConnecter();
        $requeteRealisateurs= $pdo -> prepare(
        "SELECT id_realisateur, prenom,nom
        FROM realisateur");
        $requeteRealisateurs->execute();

        require "view/listRealisateur.php";

    }

    public function DetailRealisateurs($id) {
        $pdo = Connect::seConnecter();
        $requeteRealisateurs= $pdo -> prepare(
        " SELECT   film.titre , DATE_FORMAT(DateDeSortie, '%Y') AS anneeSortie 
        FROM film
        INNER JOIN  realisateur
        ON realisateur.id_realisateur = film.id_realisateur
        WHERE realisateur.id_realisateur= :id
         ORDER BY DateDeSortie DESC" );
        $requeteRealisateurs->execute([ "id" => $id]);

        require "view/detailRealisateur.php";

    }
    public function formAjouterRealisateur() {
        require "view/ajouterRealisateur.php";
    }

    public function ajouterRealisateur() {
         // Connection à la bdd
        $pdo = Connect::seConnecter();

        // si je soumet le formulaire
        if(isset($_POST["submit"])) {
            // va filtrer le champ de texte "nomPersonnage" et le protéger des failles XSS
            $prenomReal = filter_input(INPUT_POST, "prenom",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nomReal = filter_input(INPUT_POST, "nom",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             // verifie bien que nomPersonnage existe c'est à dire qu'il a passé l'étape précèdente en respectant les conditions de notre filter_input
            if($prenomReal && $nomReal) {
                // On prépare notre requete afin de la protéger des failles injection SQL
                $requeteInsertRealisateur = $pdo->prepare("INSERT INTO realisateur (prenom, nom) VALUES (:prenom, :nom)");
                // Une fois qu'on a prépare notre requete on peut tranquillement éxécuter notre requete sans craindre les failles SQL
                $requeteInsertRealisateur->execute(
                    [
                        "prenom" => $prenomReal, 
                        "nom" => $nomReal 
                    ]
                );

                
                header("Location: index.php?action=ListRealisateurs");
            }
        }
    }

    public function SupprimerRealisateur($id) {

      


        $pdo = Connect::seConnecter();
        if (isset($_GET["id"])) {
          $supprimerRealisateur = $pdo ->prepare(   "DELETE FROM realisateur
            WHERE id_realisateur= :id");
               $supprimerRealisateur->execute(["id" => $id]);
               header("Location: index.php?action=ListRealisateurs");
        }
    }
}



    

