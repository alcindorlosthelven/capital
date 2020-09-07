<?php
use systeme\Application\Application as  App;
if(\systeme\Model\Utilisateur::role()==="agent"){

}else{
    ?>
    <a href="<?= App::genererUrl("ajouter_station"); ?>" class="btn btn-primary">Ajouter</a>
    <a href="<?= App::genererUrl("station"); ?>" class="btn btn-primary">Lister</a>
<?php
}
?>

<br>
<br>