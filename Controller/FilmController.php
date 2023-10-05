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

}