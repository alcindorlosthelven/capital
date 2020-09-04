<?php
/**
 * capital - transaction.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/4/2020
 */
require "../../../vendor/autoload.php";
if(isset($_POST['depot_institution'])){
    $id_compte=$_POST['id_compte'];
    $id_institution=$_POST['id_institution'];
    $montant=(float)$_POST['montant'];
    if($montant<50){
        echo "montant transaction insufisant";
        return;
    }
    $compteIns=new \app\DefaultApp\Models\CompteInstitution();
    $m=$compteIns->depot($id_institution,$id_compte,$montant);
    echo $m;
}

if(isset($_POST['transfert_institution'])){
    $id_compte_institution=$_POST['id_compte_institution'];
    $id_institution=$_POST['id_institution'];
    $id_client=$_POST['id_client'];
    $montant=(float)$_POST['montant'];
    if($montant<50){
        echo "montant transaction insufisant";
        return;
    }
    $compteIns=new \app\DefaultApp\Models\CompteInstitution();
    $m=$compteIns->transfert($id_client,$id_institution,$id_compte_institution,$montant);
    echo $m;
}