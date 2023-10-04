<?php


namespace Controller;
use Model\Connect ;

class CinemaController {
    /*****
     * Lister les films
     */
    public function ListFilms() {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("SELECT id_film, titre, DATE_FORMAT(DateDeSortie, '%d-%m-%Y') AS anneeSortie FROM film ORDER BY DateDeSortie DESC");
        $requeteFilm->execute();

        require "view/listFilm.php";

    }

    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("SELECT * FROM film WHERE id_film = :id");
        $requeteFilm->execute(["id" => $id]);

        require "view/detailFilm.php";

    }

/**
     * Lister les acteurss
     */
    
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
        $requeteActeur = $pdo -> prepare(
        "SELECT * FROM acteur WHERE id_acteur = :id");
        $requeteActeur->execute(["id" => $id]);

        require "view/detailActeur.php";

    }


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
        "SELECT * FROM realisateur WHERE id_realisateur = :id");
        $requeteRealisateurs->execute([ "id" => $id]);

        require "view/detailRealisateur.php";

    }


    public function ListGenres () {
        $pdo = Connect::seConnecter();
        $requeteGenres= $pdo -> prepare(
        "SELECT id_genre, libelle
        FROM genre");
        $requeteGenres->execute();

        require "view/listGenre.php";

    }

    public function DetailGenres($id) {
        $pdo = Connect::seConnecter();
        $requeteGenres= $pdo -> prepare(
        "SELECT libelle
        FROM genre
        WHERE id_genre = :id");
        
        $requeteGenres->execute([ "id" => $id]);

        $requeteGenres2= $pdo -> prepare(
            "SELECT titre
            FROM film
            
            WHERE id_film = :id");
            $requeteGenres2->execute([ "id" => $id]);
    

        require "view/detailGenre.php";

    }


   


    public function ListRoles () {
        $pdo = Connect::seConnecter();
        $requeteRoles= $pdo -> prepare(
        "SELECT role.id_role, acteur.id_acteur, role.nomPersonnage
        FROM casting
        INNER JOIN role
        ON role.id_role = casting.id_role
        INNER JOIN acteur
        ON acteur.id_acteur = casting.id_film
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
         ("SELECT role.nomPersonnage, acteur.prenom, acteur.nom
         FROM casting
         INNER JOIN role
         ON role.id_role = casting.id_role
         INNER JOIN acteur
         ON acteur.id_acteur = casting.id_film
         WHERE acteur.id_acteur = :id");
         $requeteRoles2->execute(["id" => $id]);
           

     

        require "view/detailRole.php";

    }





}