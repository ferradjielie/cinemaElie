<?php


namespace Controller;
use Model\Connect ;

class CinemaController {
    

/**
     * Lister les acteurss
     */
    
    


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


    public function ListGenres () {
        $pdo = Connect::seConnecter();
        $requeteGenres= $pdo -> prepare(
        "SELECT id_genre,  libelle
        FROM genre
        
        WHERE genre.id_genre");
        $requeteGenres->execute();

        require "view/listGenre.php";

    }

    public function DetailGenres($id) {
        $pdo = Connect::seConnecter();
        
        $requeteGenres1 = $pdo->prepare(
            "SELECT libelle FROM genre WHERE id_genre = :id"
        );

        $requeteGenres2= $pdo -> prepare(
            "SELECT titre
            FROM genre_film
            INNER JOIN film
            ON film.id_film  = genre_film.id_film
            INNER JOIN genre
            ON genre.id_genre = genre_film.id_genre
            
            WHERE genre_film.id_genre    = :id");

            $requeteGenres1->execute([ "id" => $id]);
            $requeteGenres2->execute([ "id" => $id]);
    

        require "view/detailGenre.php";
    }

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
}