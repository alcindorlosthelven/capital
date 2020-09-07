<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 29/03/2018
 * Time: 22:30
 */

namespace app\DefaultApp\Controlleurs;

use app\DefaultApp\DefaultApp;
use app\DefaultApp\Models\TestModel;
use app\DefaultApp\Models\Utilisateur;
use systeme\Controlleur\Controlleur;

class DefaultControlleur extends Controlleur
{
    public function index()
    {
        $role = Utilisateur::role();
        if ($role === "agent") {
            $u = Utilisateur::Rechercher(Utilisateur::session_valeur());
            if($u!==null) {
                DefaultApp::redirection("vente_station", ["id" => $u->id_station]);
            }
        }else{
            DefaultApp::redirection("lister_vente");
        }
        $variable['titre'] = "Acceuil";
        return $this->render("default/index", $variable);
    }

}