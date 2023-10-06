<?php


use Controller\FilmController;
use Controller\ActeurController;
use Controller\RealisateurController;
use Controller\GenreController;
use Controller\RoleController;



spl_autoload_register(function ($class_name){ 
include $class_name . '.php';

});

 
 $ctrlFilm = new FilmController();
 $ctrlActeur = new ActeurController();
 $ctrlRealisateur = new RealisateurController();
 $ctrlGenre = new GenreController();
 $ctrlRole = new  RoleController();



 $id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]){
        case "ListFilms" : $ctrlFilm -> ListFilms(); break;
        case "detailFilm" : $ctrlFilm -> detailFilm($id); break;
        case "formAjouterFilm": $ctrlFilm->formAjouterFilm(); break;
        case "ajouterFilm": $ctrlFilm->ajouterFilm(); break;
    
        
        case "ListActeurs" : $ctrlActeur-> ListActeurs() ; break;
        case "detailActeurs" : $ctrlActeur-> detailActeurs($id) ; break;
        case "formAjouterActeur": $ctrlActeur->formAjouterActeur(); break;
        case "ajouterActeur": $ctrlActeur->ajouterActeur(); break;
    

        case "ListRealisateurs" : $ctrlRealisateur-> ListRealisateurs() ; break;
        case "detailRealisateurs" : $ctrlRealisateur->detailRealisateurs($id) ; break;
        case "formAjouterRealisateur": $ctrlRealisateur->formAjouterRealisateur(); break;
        case "ajouterRealisateur": $ctrlRealisateur->ajouterRealisateur(); break;
    
        
        case "ListGenres" : $ctrlGenre-> ListGenres() ; break;
        case "DetailGenres" : $ctrlGenre-> DetailGenres($id) ; break;
        case "formAjouterGenre": $ctrlGenre->formAjouterGenre(); break;
        case "ajouterGenre": $ctrlGenre->ajouterGenre(); break;
    
    
        case "ListRoles" : $ctrlRole-> ListRoles() ; break;
        case "DetailRoles" : $ctrlRole-> DetailRoles($id) ; break;
        case "formAjouterRole": $ctrlRole->formAjouterRole(); break;
        case "ajouterRole": $ctrlRole->ajouterRole(); break;
        
    }
}