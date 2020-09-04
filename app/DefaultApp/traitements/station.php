<?php
/**
 * capital - institution.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
require "../../../vendor/autoload.php";
if(isset($_POST['ajouter_station'])){
    $ins=new \app\DefaultApp\Models\Station();
    $ins->remplire($_POST);
    $m=$ins->add();
    echo $m;
}

if(isset($_POST['modifier_station'])){
    $ins=new \app\DefaultApp\Models\Station();
    $ins->remplire($_POST);
    $m=$ins->update();
    echo $m;
}