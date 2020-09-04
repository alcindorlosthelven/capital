<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_station");
if(!isset($station)){
    return;
}
?>
<div class="card">
    <div class="card-header">
        <h4>Modifier Station</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form-station">
            <input type="hidden" name="modifier_station">
            <input type="hidden" name="id" value="<?= $station->getId(); ?>">
            <div class="row">

                <div class="form-group col-6">
                    <label>Nom</label>
                    <input value="<?= $station->getNom() ?>" type="text" name="nom" class="form-control" required placeholder="Nom">
                </div>


                <div class="form-group col-6">
                    <label>Addresse</label>
                    <input value="<?= $station->getAddresse() ?>" type="text" name="addresse" class="form-control" required placeholder="Addresse">
                </div>

                <div class="form-group col-6">
                    <label>Latitude</label>
                    <input  value="<?= $station->getLatitude(); ?>" type="text" name="latitude" class="form-control" placeholder="Latitude">
                </div>

                <div class="form-group col-6">
                    <label>Longitude</label>
                    <input value="<?= $station->getLongitude() ?>" type="text" name="longitude" class="form-control" placeholder="Longitude">
                </div>


                <div class="form-group col-12">
                    <input type="submit" value="Modifier" class="btn btn-primary float-right">
                </div>

            </div>


        </form>
    </div>
</div>
