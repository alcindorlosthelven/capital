<?php
/**
 * capital - InstitutionControlleur.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */

namespace app\DefaultApp\Controlleurs;


use app\DefaultApp\DefaultApp;
use app\DefaultApp\Models\Client;
use app\DefaultApp\Models\Institution;

class ClientControlleur extends BaseControlleur
{

    public function lister(){
        $var['titre']="Liste des clients";
        $cli=new Client();
        $listeClient=$cli->findAll();
        $var['listeClient']=$listeClient;
        $this->render("client/lister",$var);
    }

    public function ajouter(){
        $var['titre']="Ajouter Client";

        $this->render("client/ajouter",$var);
    }

    public function modifier($id){
        $var['titre']="Modifier Client";
        $cli=new Client();
        $cli=$cli->findById($id);
        if($cli!==null){
            $var['client']=$cli;
        }
        $this->render("client/modifier",$var);
    }

    public function supprimer($id){
        $var['titre']="Supprimer Client";
        $ins=new Client();
        $ins->deleteById($id);
        DefaultApp::redirection("lister_client");
    }



}