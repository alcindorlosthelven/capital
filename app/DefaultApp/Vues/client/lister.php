<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_client");
?>
<div class="card">
    <div class="card-header">
        <h4>Liste des clients</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Institution</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>No Compte</th>
                    <th>Sold</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $ins = new \app\DefaultApp\Models\Institution();
                if (isset($listeClient)) {
                    foreach ($listeClient as $cli) {
                        $id_institution = $cli->getIdInstitution();
                        $ins = $ins->findById($id_institution);

                        $compteC=\app\DefaultApp\Models\CompteClient::rechercherParClient($cli->getId());
                        $sold=$compteC->getSold();
                        ?>
                        <tr>
                            <td><?= $cli->getId() ?></td>
                            <th>
                                <?php
                                if ($ins !== null) {
                                    ?>
                                    <a href="profil-institution-<?= $ins->getId() ?>"><?php echo $ins->getNom(); ?></a>
                                    <?php
                                }
                                ?>

                            </th>
                            <td><?= $cli->getNom() ?></td>
                            <td><?= $cli->getPrenom() ?></td>
                            <td><?= $cli->getTelephone() ?></td>
                            <td><?= $cli->getEmail() ?></td>
                            <td><?= $compteC->getNo() ?></td>
                            <td><?= \app\DefaultApp\DefaultApp::formatComptable($sold) ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="modifier-client-<?= $cli->getId() ?>">Modifier</a>
                                        <a class="dropdown-item"
                                           href="supprimer-client-<?= $cli->getId() ?>">Supprimer</a>
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
