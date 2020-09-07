<?php
/**
 * capital - VenteControlleur.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/7/2020
 */

namespace app\DefaultApp;
use app\DefaultApp\Controlleurs\BaseControlleur;
use app\DefaultApp\Models\Vente;

class VenteControlleur extends BaseControlleur
{
    public function lister(){
        $var['titre']="liste des ventes";
        $vente=new Vente();
        $listeVente=$vente->findAll();


        $var['listeVente']=$listeVente;
        $this->render("vente/lister",$var);
    }
}