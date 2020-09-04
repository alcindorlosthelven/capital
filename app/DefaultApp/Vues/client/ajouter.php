<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_client");
$ins = new \app\DefaultApp\Models\Institution();
$lins = $ins->findAll();
?>
<div class="card">
    <div class="card-header">
        <h4>Ajouter Client</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form-client">
            <input type="hidden" name="ajouter_client">
            <div class="row">
                <div class="form-group col-6">
                    <label>Institution</label>
                    <select class="form-control" name="id_institution" required>
                        <?php
                        foreach ($lins as $ins) {
                            ?>
                            <option value="<?= $ins->getId() ?>"><?= $ins->getNom() ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required placeholder="Nom">
                </div>

                <div class="form-group col-6">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="form-control" required placeholder="Prénom">
                </div>

                <div class="form-group col-6">
                    <label>Addresse</label>
                    <input type="text" name="addresse" class="form-control" required placeholder="Addresse">
                </div>


                <div class="form-group col-6">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control telephone" required placeholder="Téléphone">
                </div>


                <div class="form-group col-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                </div>


                <div class="form-group col-12">
                    <input type="submit" value="Enregistrer" class="btn btn-primary float-right">
                </div>

            </div>


        </form>
    </div>
</div>
