<?php

namespace Controller;
use Model\Connect ;

class FilmController {

/*****
     * Lister les films
     */
    public function ListFilms() {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare
        ("SELECT id_film, titre, DATE_FORMAT(DateDeSortie, '%d-%m-%Y') AS dateSortie 
        FROM film ORDER BY DateDeSortie DESC");
        $requeteFilm->execute();

        require "view/listFilm.php";

    }

    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
            SELECT titre, DATE_FORMAT(DateDeSortie, '%d-%m-%Y') AS dateSortie, note, duree, afficheDeFilm, synopsis  
            FROM film WHERE id_film = :id");
        $requeteFilm->execute(["id" => $id]);

        $requeteFilm2 = $pdo ->prepare("SELECT acteur.prenom, acteur.nom, role.nomPersonnage
        FROM casting
        INNER JOIN acteur
        ON acteur.id_acteur = casting.id_acteur
        INNER JOIN role
        ON role.id_role = casting.id_role
        INNER JOIN film ON film.id_film = casting.id_film
        WHERE film.id_film = :id"
            
    );
    $requeteFilm2->execute(["id" => $id]);

        require "view/detailFilm.php";

    }

    public function formAjouterFilm() {

        $pdo = Connect::seConnecter();
        $requeteRealisateurs = $pdo->prepare("
        SELECT * FROM realisateur");
        $requeteRealisateurs->execute();

        require "view/ajouterFilm.php";
    }

    public function ajouterFilm() {
         // Connection à la bdd
        $pdo = Connect::seConnecter();

        // si je soumet le formulaire
        if(isset($_POST["submit"])) {
            // va filtrer le champ de texte "nomPersonnage" et le protéger des failles XSS
            $titreFilm = filter_input(INPUT_POST, "titre",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dureeFilm = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT );
            $noteFilm = filter_input(INPUT_POST, "note", FILTER_VALIDATE_INT );
            $afficheFilm = filter_input(INPUT_POST, "afficheDeFilm",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsisFilm = filter_input(INPUT_POST, "synopsis",  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sortieFilm = filter_input(INPUT_POST, "DateDeSortie", FILTER_VALIDATE_REGEXP, array(
                "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")));
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_VALIDATE_INT );

             // verifie bien que nomPersonnage existe c'est à dire qu'il a passé l'étape précèdente en respectant les conditions de notre filter_input
            if($realisateur && $titreFilm && $dureeFilm && $noteFilm && $afficheFilm && $synopsisFilm && $sortieFilm  ) {
                // On prépare notre requete afin de la protéger des failles injection SQL
                $requeteInsertFilm = $pdo->prepare("INSERT INTO film (titre, duree, note, afficheDeFilm, synopsis,DateDeSortie, id_realisateur) VALUES (:titre, :duree, :note, :afficheDeFilm, :synopsis,:DateDeSortie, :realisateur)");
                // Une fois qu'on a prépare notre requete on peut tranquillement éxécuter notre requete sans craindre les failles SQL
                $requeteInsertFilm->execute(
                    [
                        "titre" => $titreFilm, 
                        "duree" => $dureeFilm,
                        "note" => $noteFilm,
                        "afficheDeFilm" => $afficheFilm,
                        "synopsis" => $synopsisFilm,
                        "DateDeSortie" => $sortieFilm,
                        "realisateur" => $realisateur
                    ]
                );

                
                header("Location: index.php?action=ListFilms");
            }
        }
    }


}