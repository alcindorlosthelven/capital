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

if(isset($_POST['passer_carte'])){
    $resultat=array();
    $no_carte=$_POST['no_carte'];
    $no_carte= str_replace(array("?", "%"), "", $no_carte);
    $compteClient=\app\DefaultApp\Models\CompteClient::rechercherParNumero($no_carte);
    if($compteClient===null){
        $resultat['statut']="no";
        $resultat['message']="Imposible de trouver le no compte";
        echo json_encode($resultat);
        return;
    }

    $resultat['statut']="ok";
    $resultat['id_compte']=$compteClient->getId();
    echo json_encode($resultat);
    return;
}

if(isset($_POST['vente'])){
    $cl=new \app\DefaultApp\Models\CompteClient();
    $id_station=$_POST['id_station'];
    $id_compte=$_POST['id_compte'];
    $pin=$_POST['pin'];
    $montant=(float)$_POST['montant'];
    $compte=new \app\DefaultApp\Models\CompteClient();
    $compte=$compte->findById($id_compte);
    if($compte->getPin()!==$pin){
        echo "Pin Incorrect";
        return;
    }
    $client=new \app\DefaultApp\Models\Client();
    $client=$client->findById($compte->getIdClient());
    if($client===null){
        echo "Client introuvable...";
        return;
    }

    $vente=new \app\DefaultApp\Models\Vente();
    $vente->remplire($_POST);
    $vente->setIdInstitution($client->getIdInstitution());
    $vente->setIdClient($client->getId());
    $vente->setDate(date("Y-m-d"));
    $vente->setHeure(date("h:i:s"));

    $m=$cl->retrait($client->getId(),$montant);
    if($m==="ok"){
        $m=$vente->add();
        echo $m;
        return;
    }

    echo $m;
}