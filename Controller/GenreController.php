<?php


namespace Controller;
use Model\Connect ;

class GenreController {
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

    public function formAjouterGenre() {
        require "view/ajouterGenre.php";
    }

    public function ajouterGenre() {
         // Connection à la bdd
        $pdo = Connect::seConnecter();

        // si je soumet le formulaire
        if(isset($_POST["submit"])) {
            // va filtrer le champ de texte "nomPersonnage" et le protéger des failles XSS
            $libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             // verifie bien que nomPersonnage existe c'est à dire qu'il a passé l'étape précèdente en respectant les conditions de notre filter_input
            if($libelle) {
                // On prépare notre requete afin de la protéger des failles injection SQL
                $requeteInsertGenre = $pdo->prepare("INSERT INTO genre (libelle) VALUES (:libelle)");
                // Une fois qu'on a prépare notre requete on peut tranquillement éxécuter notre requete sans craindre les failles SQL
                $requeteInsertGenre->execute(["libelle" => $libelle]);

                //Une fois qu'on a ajouter notre rôle on se redirige vers listRole afin de vérifier si notre nouveau role a bien été ajouté
                header("Location: index.php?action=ListGenres");
            }
        }
    }
         

}