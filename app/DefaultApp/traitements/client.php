<?php
/**
 * capital - institution.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
require "../../../vendor/autoload.php";
if(isset($_POST['ajouter_client'])){
    $ins=new \app\DefaultApp\Models\Client();
    $ins->remplire($_POST);
    $m=$ins->add();
    if($m==="ok"){
        $id_cli=\app\DefaultApp\Models\Client::dernierId();
        $compteClient=new \app\DefaultApp\Models\CompteClient();
        $compteClient->setIdClient($id_cli);
        $compteClient->setSold("0.00");
        $no=mt_rand(10,99)."".mt_rand(10,99)."0000-0000-".mt_rand(1000,9999);
        $compteClient->setNo($no);
        $compteClient->setPin("0000");
        $m=$compteClient->add();
    }
    echo $m;
}

if(isset($_POST['modifier_client'])){
    $ins=new \app\DefaultApp\Models\Client();
    $ins->remplire($_POST);
    $m=$ins->update();
    echo $m;
}