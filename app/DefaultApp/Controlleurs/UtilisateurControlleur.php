<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 24/03/2018
 * Time: 21:28
 */

namespace app\DefaultApp\Controlleurs;

use app\DefaultApp\Models\Utilisateur;

class UtilisateurControlleur extends BaseControlleur
{

    public function ajouter()
    {
        try{
            $variable = array();
            $variable['titre'] = "Utilisateur / Ajouter";
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $utlisateur = new Utilisateur();
                $utlisateur->setNom($_POST['nom']);
                $utlisateur->setPrenom($_POST['prenom']);
                $utlisateur->setPseudo($_POST['pseudo']);
                $utlisateur->setRole($_POST['role']);
                $utlisateur->setActive("oui");
                $utlisateur->setTelephone(trim(addslashes($_POST['telephone'])));
                $utlisateur->setEmail(trim(addslashes($_POST['email'])));
                $motdepasse = $_POST['motdepasse'];
                $confirmer = $_POST['confirmermotdepasse'];

                if ($motdepasse != $confirmer) {
                    $variable['erreur'] = "Verifier les mot de passe";
                } else {
                    $utlisateur->setMotdepasse($motdepasse);
                    $message = $utlisateur->Enregistrer();
                    if ($message === 'ok') {
                        $variable['success'] = "Fait avec sucess";
                    } else {
                        $variable['erreur'] = $message;
                    }
                }

            }

            $this->render("utilisateur/ajouter", $variable);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function modifier($id)
    {

        $variable = array();
        $variable['titre'] = "Utilisateur / modifier";
        $utlisateur=Utilisateur::Rechercher($id);
        $variable['utilisateur']=$utlisateur;
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $utlisateur->setNom($_POST['nom']);
            $utlisateur->setPrenom($_POST['prenom']);
            $utlisateur->setPseudo($_POST['pseudo']);
            $utlisateur->setTelephone(trim(addslashes($_POST['telephone'])));
            $utlisateur->setEmail(trim(addslashes($_POST['email'])));
            $motdepasse = $_POST['motdepasse'];
            $confirmer = $_POST['confirmermotdepasse'];
            if ($motdepasse != $confirmer) {
                $variable['erreur'] = "Verifier les mot de passe";
            } else {
                if($motdepasse!=="1x1") {
                    $utlisateur->setMotdepasse($motdepasse);
                }
                $message = $utlisateur->update();
                if ($message === "ok") {
                    $variable['success'] = "Modifier avec success";
                } else {
                    $variable['erreur'] = $message;
                }
            }

        }

        $this->render("utilisateur/modifier", $variable);
    }

    public function lister()
    {
        if(isset($_GET['tous'])){
            $listeUtilisateur = $this->getModel("utilisateur")->findAll();
        }elseif(isset($_GET['admin'])){
            $listeUtilisateur=Utilisateur::listeAdmin();
        }elseif(isset($_GET['agent'])){
            $listeUtilisateur=Utilisateur::listeAgent();
        }elseif(isset($_GET['reparateur'])){
            $listeUtilisateur=Utilisateur::listeReparateur();
        }else{
            $listeUtilisateur = $this->getModel("utilisateur")->findAll();
        }

        $variable['titre']="Liste des utilisateurs";
        $variable['listeUtilisateur']=$listeUtilisateur;
        $this->render("utilisateur/lister", $variable);
    }

    public function blocker($id)
    {
        Utilisateur::blocker($id);
        header("location: lister-utilisateur");
    }

    public function deblocker($id)
    {
        Utilisateur::deblocker($id);
        header("location: lister-utilisateur");
    }

    public function supprimer($id)
    {
        Utilisateur::Supprimer($id);
        header("location: lister-utilisateur");
    }

    public function module()
    {
        $variable['titre'] = "Module";
        if (isset($_POST['module'])) {
            $md = new Module();
            $listeModule = $md->findAll();
            if (isset($_POST['id_module'])) {
                $modules = $_POST['id_module'];
                foreach ($listeModule as $md) {
                    if (in_array($md->getId(), $modules)) {
                        $md->setActif('oui');
                    } else {
                        $md->setActif('non');
                    }
                    $md->update();
                }

                $variable['succes'] = "Fait avec success";
            } else {
                foreach ($listeModule as $md) {

                    $md->setActif('non');
                    $md->update();
                }
                $variable['succes'] = "Fait avec success";
            }
        }
        $this->render("module/index", $variable);
    }
}