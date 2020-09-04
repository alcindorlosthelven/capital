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
        <h4>Vente</h4>
    </div>

    <div class="card-body">
        <div class="message"></div>
        <form method="post" class="form_passer_carte">
            <div class="form-group">
                <input autofocus type="text" class="form-control no_carte" name="no_carte" placeholder="Passer la carte" required>
            </div>
        </form>
        <form method="post" class="form-station">
            <input type="hidden" name="vente">
            <input type="hidden" name="id" value="<?= $station->getId(); ?>">

        </form>
    </div>
</div>
