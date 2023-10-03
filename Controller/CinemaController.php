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

    public function DetailGenres () {
        $pdo = Connect::seConnecter();
        $requeteGenres= $pdo -> prepare(
        " SELECT *
        FROM genre_film
        INNER JOIN film
        ON film.id_film = genre_film.id_film;
        WHERE id_film = :id");
        $requeteGenres->execute()

        require "view/detailGenre.php";

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