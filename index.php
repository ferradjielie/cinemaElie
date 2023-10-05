<?php

use Controller\CinemaController;
use Controller\FilmController;
use Controller\ActeurController;


spl_autoload_register(function ($class_name){ 
include $class_name . '.php';

});

 $ctrlCinema = new CinemaController();
 $ctrlFilm = new FilmController();
 $ctrlActeur = new ActeurController();

 $id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]){
        case "ListFilms" : $ctrlFilm -> ListFilms(); break;
        case "detailFilm" : $ctrlFilm -> detailFilm($id); break;
        case "ListActeurs" : $ctrlActeur-> ListActeurs() ; break;
        case "detailActeurs" : $ctrlActeur-> detailActeurs($id) ; break;

        case "ListRealisateurs" : $ctrlCinema-> ListRealisateurs() ; break;
        case "detailRealisateurs" : $ctrlCinema->detailRealisateurs($id) ; break;
         case "ListGenres" : $ctrlCinema-> ListGenres() ; break;
         case "DetailGenres" : $ctrlCinema-> DetailGenres($id) ; break;
        
        
         case "ListRoles" : $ctrlCinema-> ListRoles() ; break;
         case "DetailRoles" : $ctrlCinema-> DetailRoles($id) ; break;
        }
}