<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_utilisateur") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des Utilisateurs</h4></div>

            <div class="card-body">
                <a href="utilisateur?admin" class="btn btn-warning">Admin</a>
                <a href="utilisateur?agent" class="btn btn-warning">Agent</a>
                <a href="utilisateur?reparateur" class="btn btn-warning">Réparateur</a>
                <a href="utilisateur?tous" class="btn btn-warning">Tous</a>
                <hr>

                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Nom et Prénom</th>
                        <th>Télephone</th>
                        <th>Email</th>
                        <th>Pseudo</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (isset($listeUtilisateur)) {
                        foreach ($listeUtilisateur as $utilisateur) {
                            if ($utilisateur->getPseudo() != "admin" or $utilisateur->getRole() !== "super_admin") {
                                ?>
                                <tr>
                                    <td><?= strtoupper($utilisateur->getNom() . " " . $utilisateur->getPrenom()); ?></td>
                                    <td><?= $utilisateur->getTelephone() ?></td>
                                    <td><?= $utilisateur->getEmail() ?></td>
                                    <td><?= $utilisateur->getPseudo(); ?></td>
                                    <td><?= $utilisateur->getRole(); ?></td>
                                    <td><?= $utilisateur->getActive(); ?></td>
                                    <td>
                                        <a href="modifier-utilisateur-<?= $utilisateur->getId() ?>">Modifier</a>
                                    </td>

                                    <?php

                                    if ($utilisateur->getActive() == "oui") {
                                        ?>
                                        <td style="<?php if ($utilisateur) ?>">
                                            <a href="blocker-utilisateur-<?= $utilisateur->getId() ?>">Bloquer</a>
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($utilisateur->getActive() == "non") {
                                        ?>
                                        <td>
                                            <a href="deblocker-utilisateur-<?= $utilisateur->getId() ?>">Debloquer</a>
                                        </td>
                                        <?php
                                    }

                                    ?>

                                </tr>
                                <?php
                            }
                        }
                    } else {
                        echo "Variabl listeEleve existe pas";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>