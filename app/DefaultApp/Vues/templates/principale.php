<?php

use app\DefaultApp\Models\GeoLocalisation;
use systeme\Application\Application as App;

if (!\systeme\Model\Utilisateur::session()) {
    app::redirection("connexion");
}
$role = \systeme\Model\Utilisateur::role();
$localisation = new GeoLocalisation();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Capital - <?php if (isset($titre)) echo $titre; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= App::autre("vendors/mdi/css/materialdesignicons.min.css"); ?>">
    <link rel="stylesheet" href="<?= App::autre("vendors/base/vendor.bundle.base.css"); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= App::autre("vendors/datatables.net-bs4/dataTables.bootstrap4.css"); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= App::autre("css/style.css"); ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= App::autre("images/favicon.png"); ?>"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg"
                                                                               alt="logo"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                        <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search now" aria-label="search"
                               aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src=""/>
                        <span class="nav-profile-name"><?= ucfirst(\systeme\Model\Utilisateur::pseudo()) ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?= App::genererUrl("logout") ?>">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <?php
                if ($role === "agent") {
                    $u=\systeme\Model\Utilisateur::Rechercher(\systeme\Model\Utilisateur::session_valeur());
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="vente-<?= $u->id_station ?>">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Ajouter Vente</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="vente">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Liste des Ventes</span>
                        </a>
                    </li>


                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="institution">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Institution</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="client">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Client</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="station">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Station</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="vente">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Vente</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="utilisateur">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Utilisateur</span>
                        </a>
                    </li>
                    <?php
                }
                ?>

                <!--  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                          <i class="mdi mdi-circle-outline menu-icon"></i>
                          <span class="menu-title">UI Elements</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="ui-basic">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/forms/basic_elements.html">
                          <i class="mdi mdi-view-headline menu-icon"></i>
                          <span class="menu-title">Form elements</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/charts/chartjs.html">
                          <i class="mdi mdi-chart-pie menu-icon"></i>
                          <span class="menu-title">Charts</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/tables/basic-table.html">
                          <i class="mdi mdi-grid-large menu-icon"></i>
                          <span class="menu-title">Tables</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/icons/mdi.html">
                          <i class="mdi mdi-emoticon menu-icon"></i>
                          <span class="menu-title">Icons</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                          <i class="mdi mdi-account menu-icon"></i>
                          <span class="menu-title">User Pages</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="auth">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                              <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                              <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                              <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="documentation/documentation.html">
                          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                          <span class="menu-title">Documentation</span>
                      </a>
                  </li>-->
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php if (isset($contenue)) echo $contenue; ?>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date("Y") ?> <a
                                href="https://haitisolution.net/"
                                target="_blank">SolutionIp</a>. All rights reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= App::autre("vendors/base/vendor.bundle.base.js") ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= App::autre("vendors/chart.js/Chart.min.js") ?>"></script>
<script src="<?= App::autre("vendors/datatables.net/jquery.dataTables.js") ?>"></script>
<script src="<?= App::autre("vendors/datatables.net-bs4/dataTables.bootstrap4.js") ?>"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= App::autre("js/off-canvas.js") ?>"></script>
<script src="<?= App::autre("js/hoverable-collapse.js") ?>"></script>
<script src="<?= App::autre("js/template.js") ?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= App::autre("js/dashboard.js") ?>"></script>
<script src="<?= App::autre("js/data-table.js") ?>"></script>
<script src="<?= App::autre("js/jquery.dataTables.js") ?>"></script>
<script src="<?= App::autre("js/dataTables.bootstrap4.js") ?>"></script>
<!-- End custom js for this page-->

<script>
    $("document").ready(function () {
        $("form").addClass("was-validated");

        $(".form-institution").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/institution.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if (reponse.trim() === "ok") {
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('Fait avec success');
                        document.location.href = 'lister-institution';
                    } else {
                        $(".message").html("<div class='alert alert-success'>" + reponse + "</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-client").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/client.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if (reponse.trim() === "ok") {
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('Fait avec success');
                        document.location.href = 'lister-client';
                    } else {
                        $(".message").html("<div class='alert alert-success'>" + reponse + "</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-transactions").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/transaction.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if (reponse.trim() === "ok") {
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('Fait avec success');
                        location.reload(true);
                    } else {
                        $(".message").html("<div class='alert alert-success'>" + reponse + "</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-station").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/station.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    if (reponse.trim() === "ok") {
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('Fait avec success');
                        document.location.href = 'lister-station';
                    } else {
                        $(".message").html("<div class='alert alert-success'>" + reponse + "</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form_passer_carte").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/station.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    $(".form_passer_carte").closest('form').find("input[type=text], textarea").val("");
                    let mes = JSON.parse(reponse);
                    let statut = mes.statut;
                    if (statut === "ok") {
                        $(".message").html("");
                        let id_compte = mes.id_compte;
                        $(".id_compte").val(id_compte);
                        $('#mvente').modal('show');
                    } else {
                        let message = $mes.message;
                        $(".message").html(message);
                    }
                    $('#load').hide();
                }
            });

        });

        $(".form-vente").on("submit", function (e) {
            e.preventDefault();
            $('#load').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/station.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },

                success: function (reponse) {
                    if (reponse.trim() === "ok") {
                        $(".message").html("<div class='alert alert-success'>Fait avec success</div>");
                        alert('Fait avec success');
                        location.reload(true);
                    } else {
                        $(".message").html("<div class='alert alert-success'>" + reponse + "</div>");
                    }
                    $('#load').hide();
                }
            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        /* $(".datepicker").datepicker(
             {
                 "dateFormat":"yy-mm-dd"
             }
         );
 */

        $('.datatable').DataTable({
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });

    });
</script>
</body>
</html>
