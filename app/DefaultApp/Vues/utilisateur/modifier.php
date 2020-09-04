<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_utilisateur") ?>
        <?php
       if(!isset($utilisateur)){
           return;
       }
        $suc = new \app\DefaultApp\Models\Succursal();
        $listeSuc = $suc->findAll();
        ?>
        <div class="card">
            <div class="card-header"><h4>Modifier Utilisateur</h4></div>

            <div class="card-body">
                <?php
                if (isset($erreur)) {
                    ?>
                    <div class="alert alert-danger">
                        <?= $erreur ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                    <script>
                        alert('<?=$success?>');
                        document.location.href = 'lister-utilisateur';
                    </script>
                    <?php
                }
                ?>


                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Nom</label>
                                <input value="<?= $utilisateur->getNom() ?>" required type="text" class="form-control nom" id="nom" name="nom"
                                       placeholder="Nom Utilisateur">
                            </div>

                            <div class="form-group">
                                <label for="company">Prénom</label>
                                <input value="<?= $utilisateur->getPrenom() ?>" required type="text" class="form-control  prenom" name="prenom"
                                       placeholder="Prénom Utilisateur">
                            </div>

                            <div class="form-group">
                                <label for="company">Pseudo</label>
                                <input value="<?= $utilisateur->getPseudo(); ?>" required type="text" class="form-control identifiant" name="pseudo"
                                       placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <label for="company">Email</label>
                                <input value="<?= $utilisateur->getEmail(); ?>" type="email" class="form-control" name="email"
                                       placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="company">Télephone</label>
                                <input value="<?= $utilisateur->getTelephone(); ?>" type="text" class="form-control" name="telephone"
                                       placeholder="Télephone">
                            </div>
                        </div>

                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="company">Motdepasse</label>
                                <input value="1x1" required type="password" class="form-control" id="prenom" name="motdepasse"
                                       placeholder="Motdepasse">
                            </div>

                            <div class="form-group">
                                <label for="company">Confirmer Motdepasse</label>
                                <input value="1x1" required type="password" class="form-control" id="prenom"
                                       name="confirmermotdepasse"
                                       placeholder="Confirmer motdepasse">
                            </div>

                            <div class="form-group float-right">
                                <input type="submit" value="Modifier" class="btn btn-primary btn-lg"/>
                            </div>

                        </div>
                    </div>

                </form>


            </div>
        </div>


    </div>
</div>
