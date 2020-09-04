<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_utilisateur") ?>
        <?php
        $suc = new \app\DefaultApp\Models\Succursal();
        $listeSuc = $suc->findAll();
        ?>
        <div class="card">
            <div class="card-header"><h4>Ajouter Utilisateur</h4></div>

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
                        document.location.href = 'ajouter-utilisateur';
                    </script>
                    <?php
                }
                ?>


                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Nom</label>
                                <input required type="text" class="form-control nom" id="nom" name="nom"
                                       placeholder="Nom Utilisateur">
                            </div>

                            <div class="form-group">
                                <label for="company">Prénom</label>
                                <input required type="text" class="form-control  prenom" name="prenom"
                                       placeholder="Prénom Utilisateur">
                            </div>

                            <div class="form-group">
                                <label for="company">Pseudo</label>
                                <input required type="text" class="form-control identifiant" name="pseudo"
                                       placeholder="Pseudo">
                            </div>

                            <div class="form-group">
                                <label for="company">Role</label>
                                <select name="role" class="form-control role" style="height: 40px;">
                                    <option value="administrateur">
                                        Administrateur
                                    </option>

                                    <option value="agent">
                                        Agent
                                    </option>

                                    <option value="reparateur">
                                        Réparateur
                                    </option>

                                </select>
                                <hr>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="company">Email</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="company">Télephone</label>
                                <input type="text" class="form-control" name="telephone"
                                       placeholder="Télephone">
                            </div>

                            <div class="form-group">
                                <label for="company">Motdepasse</label>
                                <input required type="password" class="form-control" id="prenom" name="motdepasse"
                                       placeholder="Motdepasse">
                            </div>

                            <div class="form-group">
                                <label for="company">Confirmer Motdepasse</label>
                                <input required type="password" class="form-control" id="prenom"
                                       name="confirmermotdepasse"
                                       placeholder="Confirmer motdepasse">
                            </div>

                            <div class="form-group float-right">
                                <input type="submit" value="Enregistrer" class="btn btn-primary btn-lg"/>
                            </div>

                        </div>
                    </div>

                </form>


            </div>
        </div>


    </div>
</div>
