<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
//echo \app\DefaultApp\DefaultApp::block("menu_institution");
?>
<div class="card">
    <div class="card-header">
        <h4>Liste des ventes</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Institution</th>
                    <th>Client</th>
                    <th>No compte</th>
                    <th>Station</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=new \app\DefaultApp\Models\Institution();
                $cl=new \app\DefaultApp\Models\Client();
                $comp=new \app\DefaultApp\Models\CompteClient();
                $st=new \app\DefaultApp\Models\Station();
                if (isset($listeVente)) {
                    foreach ($listeVente as $vente) {
                        $id_institution=$vente->getIdInstitution();
                        $i=$i->findById($id_institution);
                        $id_client=$vente->getIdClient();
                        $cl=$cl->findById($id_client);
                        $id_compte=$vente->getIdCompte();
                        $comp=$comp->findById($id_compte);
                        $id_station=$vente->getIdStation();
                        $st=$st->findById($id_station);
                        ?>
                        <tr>
                            <td><?= $vente->getId() ?></td>
                            <td><?php if($i!==null)echo $i->getNom(); ?></td>
                            <td><?php if($cl!==null)echo $cl->getNom()." ".$cl->getPrenom(); ?></td>
                            <td><?php if($comp!==null)echo $comp->getNo(); ?></td>
                            <td><?php if($st!==null)echo $st->getNom(); ?></td>
                            <td><?= $vente->getDate()." ".$vente->getHeure() ?></td>
                            <td><?= \app\DefaultApp\DefaultApp::formatComptable($vente->getMontant()) ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <!-- <a class="dropdown-item" href="profil-institution-<?/*= $institution->getId() */?>">Profil</a>-->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
