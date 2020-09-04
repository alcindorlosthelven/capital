<?php
/**
 * capital - InstitutionControlleur.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */

namespace app\DefaultApp\Controlleurs;


use app\DefaultApp\DefaultApp;
use app\DefaultApp\Models\Client;
use app\DefaultApp\Models\CompteInstitution;
use app\DefaultApp\Models\Institution;

class InstitutionControlleur extends BaseControlleur
{

    public function lister(){
        $var['titre']="Liste des institution";
        $ins=new Institution();
        $listeInstitution=$ins->findAll();
        $var['listeInstitution']=$listeInstitution;
        $this->render("institution/lister",$var);
    }

    public function ajouter(){
        $var['titre']="Ajouter Institution";

        $this->render("institution/ajouter",$var);
    }

    public function modifier($id){
        $var['titre']="Modifier Institution";
        $ins=new Institution();
        $ins=$ins->findById($id);
        if($ins!==null){
            $var['institution']=$ins;
        }
        $this->render("institution/modifier",$var);
    }

    public function supprimer($id){
        $var['titre']="Supprimer Institution";
        $ins=new Institution();
        $ins->deleteById($id);
        DefaultApp::redirection("lister_institution");
    }


    public function profil($id){
        $var['titre']="Profil Institution";
        $ins=new Institution();
        $ins=$ins->findById($id);
        if($ins!==null){
            $listeCompte=CompteInstitution::listerParInstitution($ins->getId());
            $listeClient=Client::listerParInstitution($ins->getId());
            $var['institution']=$ins;
            $var['listeCompte']=$listeCompte;
            $var['listeClient']=$listeClient;
        }
        $this->render("institution/profil",$var);
    }



}