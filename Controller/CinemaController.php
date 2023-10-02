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
        "SELECT prenom,nom, dateDeNaissance
        FROM acteur");
        $requeteActeur->execute();

        require "view/listActeur.php";

    }

    public function detailActeurs($id) {
        $pdo = Connect::seConnecter();
        $requeteActeur = $pdo -> prepare(
        "SELECT * FROM acteur WHERE id_acteur = :id");
        $requeteActeur->execute(["id" =>$id]);

        require "view/detailActeur.php";

    }


    public function ListRealisateurs () {
        $pdo = Connect::seConnecter();
        $requeteRealisateurs= $pdo -> prepare(
        "SELECT prenom,nom
        FROM realisateur");
        $requeteRealisateurs->execute();

        require "view/listRealisateur.php";

    }


    public function ListGenres () {
        $pdo = Connect::seConnecter();
        $requeteGenres= $pdo -> prepare(
        "SELECT libelle
        FROM genre");
        $requeteGenres->execute();

        require "view/listGenre.php";

    }


    public function ListRoles () {
        $pdo = Connect::seConnecter();
        $requeteRoles= $pdo -> prepare(
        "SELECT nomPersonnage
        FROM role");
        $requeteRoles->execute();

        require "view/listRole.php";

    }




}