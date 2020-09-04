<?php
/**
 * reparation - succursal.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/25/2020
 */

use app\DefaultApp\Models\Succursal;

require "../../../vendor/autoload.php";
if(isset($_POST['ajouter_succursal'])){
    $suc=new Succursal();
    $suc->remplire($_POST);
    $photo="";
    $fichier=new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'],$suc->getNom());
    if($fichier->upload()){
        $photo=$suc->setPhoto($fichier->getSrc());
    }
    $m=$suc->add();
    echo $m;
}

if(isset($_POST['modifier_succursal']))
{
    $id=$_POST['id'];
    $suc=new Succursal();
    $suc->remplire($_POST);
    $photo="";
    $fichier=new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'],$suc->getNom());
    if($fichier->upload()){
        $photo=$suc->setPhoto($fichier->getSrc());
    }
    if($photo===""){
        $succ=$suc->findById($id);
        $suc->setPhoto($succ->getPhoto());
    }
    $m=$suc->update();
    echo $m;
}