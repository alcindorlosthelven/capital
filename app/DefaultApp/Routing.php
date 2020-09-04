<?php
use app\DefaultApp\DefaultApp as App;
$role=\systeme\Model\Utilisateur::role();
App::get("/logout", function (){
    session_destroy();
    App::redirection("connexion");
}, "logout");


App::get("/", "login.login");
App::post("/", "login.login");

App::get("/login", "login.login", "connexion");
App::post("/login", "login.login");

App::post("/dashboard", "default.index","dashboard");
App::get("/dashboard", "default.index","dashboard");

//instituion
App::get("/institution", "institution.lister","institution");
App::get("/lister-institution", "institution.lister","lister_institution");
App::get("/ajouter-institution", "institution.ajouter","ajouter_institution");
App::get("/modifier-institution-:id", "institution.modifier","modifier_institution")->avec("id","[0-9]+");
App::get("/supprimer-institution-:id", "institution.supprimer","supprimer_institution")->avec("id","[0-9]+");
App::get("/profil-institution-:id", "institution.profil","profil_institution")->avec("id","[0-9]+");
//fin institution

//client
App::get("/client", "client.lister","client");
App::get("/lister-client", "client.lister","lister_client");
App::get("/ajouter-client", "client.ajouter","ajouter_client");
App::get("/modifier-client-:id", "client.modifier","modifier_client")->avec("id","[0-9]+");
App::get("/supprimer-client-:id", "client.supprimer","supprimer_client")->avec("id","[0-9]+");
App::get("/profil-client-:id", "client.profil","profil_client")->avec("id","[0-9]+");
//fin client

//station
App::get("/station", "station.lister","station");
App::get("/lister-station", "station.lister","lister_station");
App::get("/ajouter-station", "station.ajouter","ajouter_station");
App::get("/modifier-station-:id", "station.modifier","modifier_station")->avec("id","[0-9]+");
App::get("/supprimer-station-:id", "station.supprimer","supprimer_station")->avec("id","[0-9]+");
App::get("/profil-station-:id", "station.profil","profil_station")->avec("id","[0-9]+");
App::get("/vente-:id", "station.vente","vente_station")->avec("id","[0-9]+");
//fin station
