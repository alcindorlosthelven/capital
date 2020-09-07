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
        <h4></h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form_passer_carte">
            <input type="hidden" name="passer_carte">
            <div class="form-group">
                <input autofocus type="text" class="form-control no_carte" name="no_carte" placeholder="Passer la carte" required>
            </div>
        </form>
        <div class="modal" id="mvente">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">...</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="message"></div>
                        <form method="post" class="form-vente">
                            <input type="hidden" name="vente">
                            <input type="hidden" name="id_station" value="<?= $station->getId(); ?>">
                            <input type="hidden" name="id_compte" value="" class="id_compte">
                            <div class="form-group">
                                <label>Votre Pin</label>
                                <input type="password" name="pin" class="form-control" required placeholder="pin">
                            </div>

                            <div class="form-group">
                                <label>Montant</label>
                                <input step="any" type="number" name="montant" class="form-control" required placeholder="montant">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Valider" class="btn btn-primary float-right">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-danger" data-dismiss="modal">Annuler</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
