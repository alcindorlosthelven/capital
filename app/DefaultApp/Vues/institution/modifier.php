<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_institution");
if(!isset($institution)){
    return;
}
?>
<div class="card">
    <div class="card-header">
        <h4>Modifier institution</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form-institution">
            <input type="hidden" name="modifier_institution">
            <input type="hidden" name="id" value="<?= $institution->getId() ?>">
            <div class="row">
                <div class="form-group col-6">
                    <label>Nom</label>
                    <input value="<?= $institution->getNom() ?>" type="text" name="nom" class="form-control" required placeholder="Nom">
                </div>

                <div class="form-group col-6">
                    <label>Addresse</label>
                    <input value="<?= $institution->getAddresse() ?>" type="text" name="addresse" class="form-control" required placeholder="Addresse">
                </div>


                <div class="form-group col-6">
                    <label>Téléphone</label>
                    <input value="<?= $institution->getTelephone() ?>" type="text" name="telephone" class="form-control telephone" required placeholder="Téléphone">
                </div>


                <div class="form-group col-6">
                    <label>Email</label>
                    <input value="<?= $institution->getEmail(); ?>" type="email" name="email" class="form-control" required placeholder="Email">
                </div>


                <div class="form-group col-12">
                   <input type="submit" value="Modifier" class="btn btn-primary float-right">
                </div>

            </div>


        </form>
    </div>
</div>
