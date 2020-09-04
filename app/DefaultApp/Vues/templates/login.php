<?php
if(\app\DefaultApp\Models\Utilisateur::session()){
    \app\DefaultApp\DefaultApp::redirection("dashboard");
}
use app\DefaultApp\DefaultApp as app;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if(isset($titre))echo $titre; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= app::autre("vendors/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= app::autre("vendors/base/vendor.bundle.base.css") ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= app::autre("css/style.css") ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= app::autre("images/favicon.png") ?>" />
</head>

<body>
<div class="container-scroller">
    <?php
    if(isset($contenue)){echo $contenue;}else{echo "pas de contenue";}
    ?>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= app::autre("vendors/base/vendor.bundle.base.js") ?>"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= app::autre("js/off-canvas.js") ?>"></script>
<script src="<?= app::autre("js/hoverable-collapse.js") ?>"></script>
<script src="<?= app::autre("js/template.js") ?>"></script>
<!-- endinject -->
</body>
<script>
    $('document').ready(function () {
        $('#load').hide();
        $(".form-signin").on("submit", function (e) {
            $("#btn-login").css("display","none");
            e.preventDefault();
            $('#ajax-loading').show();
            $.ajax({
                type: 'POST',
                url: "app/DefaultApp/traitements/login_process.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $(".message").html("<div class='alert alert-info'>Patienter un instant.........</div>")
                },
                success: function (reponse) {
                    $(".message").html(reponse);
                    var data=$.parseJSON(reponse);
                    if(data.message==="ok"){
                        //$(".message").html("<div class='alert alert-info' style='text-align: center'>Success</div>");
                        document.location.href="dashboard";
                        //location.reload(true);
                    }else{
                        $(".message").html("<div class='alert alert-info' style='text-align: center'>"+data.message+"</div>");
                        setTimeout(function(){
                            $(".message").html("");
                        },6000)
                        $("#btn-login").css("display","inline-block");
                    }
                    $('#load').hide();
                }
            });

        });
        $("form").addClass("was-validated");
    });
</script>
</html>