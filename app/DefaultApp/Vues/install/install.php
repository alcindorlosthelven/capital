
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>INSTALATION</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="<?= \systeme\Application\Application::autre("install/install.css") ?>" type="text/css" media="screen"/>
    <script type="text/javascript" src="<?= \systeme\Application\Application::autre("install/jquery.js") ?>"></script>
    <script type="text/javascript" src="<?= \systeme\Application\Application::autre("install/sliding.form.js") ?>"></script>
    <script type="text/javascript" src="<?= \systeme\Application\Application::autre("install/script.js") ?>"></script>
</head>
<style>
    #ajax-loading {
        position: fixed;
        z-index: 9999;
        background: url('<?= \systeme\Application\Application::autre("img/load.gif") ?>') 50% 50% no-repeat;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        cursor: wait;
    }
    span.reference {
        position: fixed;
        left: 5px;
        top: 5px;
        font-size: 10px;
        text-shadow: 1px 1px 1px #fff;
    }

    span.reference a {
        color: #555;
        text-decoration: none;
        text-transform: uppercase;
    }

    span.reference a:hover {
        color: #000;

    }

    h1 a {
        color: #ccc;
        font-size: 26px;
        text-shadow: 1px 1px 1px #fff;
        padding: 20px;
        text-decoration: none;
    }
</style>
<body>
<div id="ajax-loading"></div>
<center><br>
    <h1>
        LOS FRAME-WORK
    </h1>
</center>
<div id="content">


    <div id="wrapper">
        <div class="message"></div>
        <div id="steps">

            <form method="post" action="" class="finstall" enctype="multipart/form-data">

                <fieldset class="step">
                    <legend>INSTALATION</legend>
                    <br>
                    <div class="message"></div>

                    <br><br><br><br><br><br>
                    <p>
                        Installez le script en quelques clics.<br>
                        paramètres de base de données et d'administration,
                        et exécutez le programme d'installation. C'est facile !
                    </p>
                    <ol style="clear:both;margin-top:100px;margin-left:50px; text-align:left;">
                        <li>
                            <span style="color:#900;font-weight:bold;">Obligatoire</span> - fichier de configuration to be <span style="color:#063;font-weight:bold;">writtable</span>
                            <?php
                            $fichier=$_SERVER['DOCUMENT_ROOT']."/".\systeme\Application\Application::fichier("configuration.php");
                            if (is_writable($fichier)) {
                                ?>
                                <input type="hidden" name="fichierConfiguration" value="<?= $fichier ?>">
                                <img src="<?= \systeme\Application\Application::autre("install/images/tick.png") ?>" title="writtable"
                                     style="vertical-align:middle;"/>
                                <?php
                            } else {
                                ?>
                                <img src="<?= \systeme\Application\Application::autre("install/images/cross.png") ?>" title="not writtable"
                                     style="vertical-align:middle;"/>
                            <?php
                            }
                            ?>
                        </li>

                        <li>
                            <span style="color:#900;font-weight:bold;">Obligatoire</span> - fichier base de donnée to be <span style="color:#063;font-weight:bold;">writtable</span>
                            <?php
                            $fichierSchema=$_SERVER['DOCUMENT_ROOT']."/".\systeme\Application\Application::fichier("public/install/database.sql");
                            if (is_writable($fichierSchema)) {
                                ?>
                                <input type="hidden" name="fichierSchema" value="<?= $fichierSchema ?>">
                                <img src="<?= \systeme\Application\Application::autre("install/images/tick.png") ?>" title="writtable"
                                     style="vertical-align:middle;"/>
                                <?php
                            } else {
                                ?>
                                <img src="<?= \systeme\Application\Application::autre("install/images/cross.png") ?>" title="not writtable"
                                     style="vertical-align:middle;"/>
                                <?php
                            }
                            ?>
                        </li>


                        <li>
                            <span style="color:#900;font-weight:bold;">Obligatoire</span> - Connecter a Internet <span style="color:#063;font-weight:bold;">writtable</span>
                            <?php
                            if (\systeme\Application\Application::isConnectedToInternet()) {
                                ?>
                                <img src="<?= \systeme\Application\Application::autre("install/images/tick.png") ?>" title="writtable"
                                     style="vertical-align:middle;"/>
                                <?php
                            } else {
                                ?>
                                <img src="<?= \systeme\Application\Application::autre("install/images/cross.png") ?>" title="not writtable"
                                     style="vertical-align:middle;"/>
                                <?php
                            }
                            ?>
                        </li>


                    </ol>
                </fieldset>
                <fieldset class="step">
                    <legend>Paramètres de la base de données</legend>
                    <p>
                        <label for="name">Nom de la base de données</label>
                        <input id="db_name" name="db_name" type="text" AUTOCOMPLETE=OFF value="los_framework"/>
                    </p>
                    <p>
                        <label for="country">Nom d'utilisateur</label>
                        <input id="db_uname" name="db_uname" type="text" AUTOCOMPLETE=OFF value="root"/>
                    </p>
                    <p>
                        <label for="phone">Mot de passe</label>
                        <input id="db_password" name="db_password" type="text" AUTOCOMPLETE=OFF/>
                    </p>
                    <p>
                        <label for="website">Nom d'hôte</label>
                        <input id="db_hname" name="db_hname" type="text" AUTOCOMPLETE=OFF value="localhost"/>
                    </p>
                </fieldset>

                <fieldset class="step">
                    <legend>Confirmation</legend>
                    <p>
                        Tout dans le formulaire a été correctement rempli si toutes les étapes ont une icône de coche verte. Une icône de coche rouge indique que certains champs sont manquants ou remplis de données non valides.
                    </p>

                    <ol style="clear:both;margin-top:100px;margin-left:50px; text-align:left;">

                        <li>
                            <label>Email </label><br>
                            <input type="email" name="email_instalation" required value="los-framework@gmail.com">
                        </li>

                        <br>
                        <br>
                        <li>
                            <label>Code Instalation </label><br>
                            <input type="text" name="code_instalation" required value="53-240-936-26">
                        </li>

                        <br>
                        <br>
                        <li>
                            <label>URL Licence Serveur </label><br>
                            <input style="width: 90%" type="text" name="url_serveur" required value="http://licence-serveur-sge.bioshaiti.com/licence-serveur-sge">
                        </li>

                    </ol>


                    <p class="submit">
                        <button id="registerButton" type="submit">Exécuter l'installateur</button>
                    </p>
                </fieldset>
            </form>

        </div>
        <div id="navigation" style="display:none;">
            <ul>
                <li class="selected">
                    <a href="#">Bienvenue</a>
                </li>
                <li>
                    <a href="#">Base de données</a>
                </li>

                <li>
                    <a href="#">Installer</a>
                </li>
            </ul>
        </div>
        <!--steps finishes here-->
    </div>


</div>
</body>
</html>