<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_institution");
?>
<div class="card">
    <div class="card-header">
        <h4>Liste des institutions</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Addresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($listeInstitution)) {
                    foreach ($listeInstitution as $institution) {
                        ?>
                        <tr>
                            <td><?= $institution->getId() ?></td>
                            <td><?= $institution->getNom() ?></td>
                            <td><?= $institution->getAddresse() ?></td>
                            <td><?= $institution->getTelephone() ?></td>
                            <td><?= $institution->getEmail() ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="profil-institution-<?= $institution->getId() ?>">Profil</a>
                                        <a class="dropdown-item" href="modifier-institution-<?= $institution->getId() ?>">Modifier</a>
                                        <a class="dropdown-item" href="supprimer-institution-<?= $institution->getId() ?>">Supprimer</a>
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
