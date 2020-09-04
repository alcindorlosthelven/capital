<?php
/**
 * capital - institution.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
require "../../../vendor/autoload.php";
if(isset($_POST['ajouter_institution'])){
    $ins=new \app\DefaultApp\Models\Institution();
    $ins->remplire($_POST);
    $m=$ins->add();
    if($m==="ok"){
        $id_institution=\app\DefaultApp\Models\Institution::dernierId();
        $compte=new \app\DefaultApp\Models\CompteInstitution();
        $compte->setIdInstitution($id_institution);
        $compte->setSold('0.00');
        $no=mt_rand(10,99)."-".mt_rand(10,99)."0000-0000-".mt_rand(1000,9999);
        $compte->setNo($no);
        $compte->setPin("0000");
        $m=$compte->add();
    }
    echo $m;
}

if(isset($_POST['modifier_institution'])){
    $ins=new \app\DefaultApp\Models\Institution();
    $ins->remplire($_POST);
    $m=$ins->update();
    echo $m;
}