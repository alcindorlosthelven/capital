<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_institution");
if (!isset($institution)) {
    return;
}
?>
<div class="card">
    <div class="card-header">
        <h4>Profil institution</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>

        <input type="hidden" name="modifier_institution">
        <input type="hidden" name="id" value="<?= $institution->getId() ?>">
        <div class="row">
            <div class="form-group col-3">
                <label>Nom</label>
                <input readonly value="<?= $institution->getNom() ?>" type="text" name="nom" class="form-control"
                       required
                       placeholder="Nom">
            </div>

            <div class="form-group col-3">
                <label>Addresse</label>
                <input readonly value="<?= $institution->getAddresse() ?>" type="text" name="addresse"
                       class="form-control"
                       required placeholder="Addresse">
            </div>


            <div class="form-group col-3">
                <label>Téléphone</label>
                <input readonly value="<?= $institution->getTelephone() ?>" type="text" name="telephone"
                       class="form-control telephone" required placeholder="Téléphone">
            </div>


            <div class="form-group col-3">
                <label>Email</label>
                <input readonly value="<?= $institution->getEmail(); ?>" type="email" name="email"
                       class="form-control"
                       required placeholder="Email">
            </div>

            <div class="col-12">
                <a class="btn btn-success" href="profil-institution-<?= $institution->getId() ?>?lcompte">Compte</a>
                <a class="btn btn-success" href="profil-institution-<?= $institution->getId() ?>?lclient">Client</a>
                <a class="btn btn-success" href="profil-institution-<?= $institution->getId() ?>?lvente">Vente</a>

                <hr>
                <?php
                if (isset($_GET['lcompte'])) {
                    ?>
                    <h4>Liste des Comptes</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No Compte</th>
                            <th>Sold</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if (isset($listeCompte)) {
                            foreach ($listeCompte as $compte) {
                                ?>
                                <tr>
                                    <td><?= $compte->getNo() ?></td>
                                    <td><?= \app\DefaultApp\DefaultApp::formatComptable($compte->getSold()) ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" data-toggle="modal"
                                                   data-target="#depot<?= $compte->getId() ?>">Depot</a>
                                                <a class="dropdown-item" data-toggle="modal"
                                                   data-target="#transfert<?= $compte->getId() ?>" href="">Transfert</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal" id="depot<?= $compte->getId() ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Dépot</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="message"></div>
                                                <form method="post" class="form-transactions">
                                                    <input type="hidden" name="depot_institution">
                                                    <input type="hidden" name="id_institution"
                                                           value="<?= $institution->getId() ?>">

                                                    <input type="hidden" name="id_compte"
                                                           value="<?= $compte->getId() ?>">

                                                    <div class="form-group">
                                                        <label>Montant</label>
                                                        <input name="montant" type="number" step="any" class="form-control"
                                                               required
                                                               value="0.00">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" value="Enregistrer"
                                                               class="btn btn-primary float-right">
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="transfert<?= $compte->getId() ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Transfert</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="message"></div>
                                                <form method="post" class="form-transactions">
                                                    <input type="hidden" name="transfert_institution">
                                                    <input type="hidden" name="id_institution"
                                                           value="<?= $institution->getId() ?>">
                                                    <input type="hidden" name="id_compte_institution"
                                                           value="<?= $compte->getId() ?>">
                                                    <div class="form-group">
                                                        <label>Client</label>
                                                        <select class="form-control" name="id_client">
                                                            <?php
                                                            if (isset($listeClient)) {
                                                                foreach ($listeClient as $cli) {
                                                                    ?>
                                                                    <option value="<?= $cli->getId() ?>"><?= ucfirst($cli->getNom() . " " . $cli->getPrenom()) ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Montant</label>
                                                        <input name="montant" type="number" step="any" class="form-control"
                                                               required
                                                               value="0.00">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" value="Enregistrer"
                                                               class="btn btn-primary float-right">
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        </tbody>

                    </table>
                    <?php
                } elseif (isset($_GET['lclient'])) {
                    ?>
                    <h4>Liste des Clients</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>No Compte</th>
                            <th>Sold</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if (isset($listeClient)) {
                            foreach ($listeClient as $cli) {
                                $compteC = \app\DefaultApp\Models\CompteClient::rechercherParClient($cli->getId());
                                $sold = $compteC->getSold();
                                ?>
                                <tr>
                                    <td><?= $cli->getNom() . " " . $cli->getPrenom() ?></td>
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
                    <?php
                } elseif (isset($_GET['lvente'])) {
                    v:
                    ?>
                    <h4>Liste des ventes</h4>
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
                            $listeVente = \app\DefaultApp\Models\Vente::listeParInstitution($institution->getId());
                            $i = new \app\DefaultApp\Models\Institution();
                            $cl = new \app\DefaultApp\Models\Client();
                            $comp = new \app\DefaultApp\Models\CompteClient();
                            $st = new \app\DefaultApp\Models\Station();
                            if (isset($listeVente)) {
                                foreach ($listeVente as $vente) {
                                    $id_institution = $vente->getIdInstitution();
                                    $i = $i->findById($id_institution);
                                    $id_client = $vente->getIdClient();
                                    $cl = $cl->findById($id_client);
                                    $id_compte = $vente->getIdCompte();
                                    $comp = $comp->findById($id_compte);
                                    $id_station = $vente->getIdStation();
                                    $st = $st->findById($id_station);
                                    ?>
                                    <tr>
                                        <td><?= $vente->getId() ?></td>
                                        <td><?php if ($i !== null) echo $i->getNom(); ?></td>
                                        <td><?php if ($cl !== null) echo $cl->getNom() . " " . $cl->getPrenom(); ?></td>
                                        <td><?php if ($comp !== null) echo $comp->getNo(); ?></td>
                                        <td><?php if ($st !== null) echo $st->getNom(); ?></td>
                                        <td><?= $vente->getDate() . " " . $vente->getHeure() ?></td>
                                        <td><?= \app\DefaultApp\DefaultApp::formatComptable($vente->getMontant()) ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <!-- <a class="dropdown-item" href="profil-institution-<?/*= $institution->getId() */ ?>">Profil</a>-->
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
                    <?php
                } else {
                    goto v;
                }
                ?>
            </div>

        </div>
    </div>
</div>
