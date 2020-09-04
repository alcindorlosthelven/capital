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
        <h4>Ajouter Une institution</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form-institution">
            <input type="hidden" name="ajouter_institution">
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
