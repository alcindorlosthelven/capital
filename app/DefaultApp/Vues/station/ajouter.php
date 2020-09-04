<?php
/**
 * capital - lister.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */
echo \app\DefaultApp\DefaultApp::block("menu_station");
$ins = new \app\DefaultApp\Models\Institution();
$lins = $ins->findAll();
?>
<div class="card">
    <div class="card-header">
        <h4>Ajouter Station</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form-station">
            <input type="hidden" name="ajouter_station">
            <div class="row">

                <div class="form-group col-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required placeholder="Nom">
                </div>


                <div class="form-group col-6">
                    <label>Addresse</label>
                    <input type="text" name="addresse" class="form-control" required placeholder="Addresse">
                </div>

                <div class="form-group col-6">
                    <label>Latitude</label>
                    <input value="<?php if(isset($_COOKIE['latitude']) and $_COOKIE['latitude']!==null)echo $_COOKIE['latitude'] ?>" type="text" name="latitude" class="form-control" placeholder="Latitude">
                </div>

                <div class="form-group col-6">
                    <label>Longitude</label>
                    <input value="<?php if(isset($_COOKIE['longitude']) and $_COOKIE['longitude']!==null)echo $_COOKIE['longitude'] ?>" type="text" name="longitude" class="form-control" placeholder="Longitude">
                </div>


                <div class="form-group col-12">
                    <input type="submit" value="Enregistrer" class="btn btn-primary float-right">
                </div>

            </div>


        </form>
    </div>
</div>
