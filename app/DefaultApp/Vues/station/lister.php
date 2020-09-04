<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_station");
?>
<div class="card">
    <div class="card-header">
        <h4>Liste des Stations</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Localisation</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($listeStation)) {
                    foreach ($listeStation as $cli) {
                        ?>
                        <tr>
                            <td><?= $cli->getId() ?></td>
                            <td><?= $cli->getNom() ?></td>
                            <td><?= $cli->getAddresse() ?></td>
                            <td>
                                <a target="_blank"
                                   href="https://www.google.com/maps/dir//<?= $cli->getLatitude() ?>,<?= $cli->getLongitude() ?>"><?= $cli->getLatitude() ?>
                                    ,<?= $cli->getLongitude() ?></a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="vente-<?= $cli->getId() ?>">Vente</a>

                                        <a class="dropdown-item"
                                           href="modifier-station-<?= $cli->getId() ?>">Modifier</a>
                                        <a class="dropdown-item"
                                           href="supprimer-station-<?= $cli->getId() ?>">Supprimer</a>
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
