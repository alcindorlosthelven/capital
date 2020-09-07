<?php
/**
 * capital - VenteControlleur.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/7/2020
 */

namespace app\DefaultApp\Controlleurs;


use app\DefaultApp\Models\Utilisateur;
use app\DefaultApp\Models\Vente;

class VenteControlleur extends BaseControlleur
{

    public function lister(){
        $role=Utilisateur::role();
        $u=Utilisateur::Rechercher(Utilisateur::session_valeur());
        $var['titre']="Liste des ventes";
        $vente=new Vente();
        $listeVente=$vente->findAll();
        if($role==="agent"){
            $listeVente=Vente::listeParStation($u->id_station);
        }

        $var['listeVente']=$listeVente;
        $this->render("vente/lister",$var);
    }

}