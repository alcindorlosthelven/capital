<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="<?= \app\DefaultApp\Models\Configuration::getValueOfConfiguraton("logo")?>" alt="logo">
                    </div>
                    <form class="pt-3 form-signin was-validated" method="post">
                        <input type="hidden" name="login">
                        <div class="message">
                            <?php
                            if (isset($message)) {
                                echo "<div class='alert alert-warning'>$message</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <input name="user_email" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Se connecter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

