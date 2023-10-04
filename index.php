<?php
use Controller\CinemaController;

spl_autoload_register(function ($class_name){ 
include $class_name . '.php';

});

 $ctrlCinema = new CinemaController();

 $id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]){
        case "ListFilms" : $ctrlCinema -> ListFilms(); break;
        case "detailFilm" : $ctrlCinema -> detailFilm($id); break;
        case "ListActeurs" : $ctrlCinema-> ListActeurs() ; break;
        case "detailActeurs" : $ctrlCinema-> detailActeurs($id) ; break;

        case "ListRealisateurs" : $ctrlCinema-> ListRealisateurs() ; break;
        case "detailRealisateurs" : $ctrlCinema->detailRealisateurs($id) ; break;
         case "ListGenres" : $ctrlCinema-> ListGenres() ; break;
         case "DetailGenres" : $ctrlCinema-> DetailGenres($id) ; break;
        
        
         case "ListRoles" : $ctrlCinema-> ListRoles() ; break;
         case "DetailRoles" : $ctrlCinema-> DetailRoles($id) ; break;
        }
}