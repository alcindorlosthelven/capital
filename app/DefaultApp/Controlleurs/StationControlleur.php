<?php
/**
 * capital - StationControlleur.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/4/2020
 */

namespace app\DefaultApp\Controlleurs;


use app\DefaultApp\DefaultApp;
use app\DefaultApp\Models\Station;

class StationControlleur extends BaseControlleur
{


    public function lister(){
        $var['titre']="Liste des station";
        $cli=new Station();
        $listeStation=$cli->findAll();
        $var['listeStation']=$listeStation;
        $this->render("station/lister",$var);
    }

    public function ajouter(){
        $var['titre']="Ajouter Station";

        $this->render("station/ajouter",$var);
    }

    public function modifier($id){
        $var['titre']="Modifier Client";
        $cli=new Station();
        $cli=$cli->findById($id);
        if($cli!==null){
            $var['station']=$cli;
        }
        $this->render("station/modifier",$var);
    }

    public function supprimer($id){
        $var['titre']="Supprimer Client";
        $ins=new Station();
        $ins->deleteById($id);
        DefaultApp::redirection("lister_station");
    }

    public function vente($id){
        $var['titre']="Vente";
        $cli=new Station();
        $cli=$cli->findById($id);
        if($cli!==null){
            $var['station']=$cli;
        }
        $this->render("station/vente",$var);
    }

}