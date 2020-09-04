<?php
//LES CONSTANTS
define('ENVIRONMENT', 'development');
//define('ENVIRONMENT', 'production');

if (defined('ENVIRONMENT'))
{
    switch (ENVIRONMENT)
    {
        case 'development':
            error_reporting(E_ALL);
            break;

        case 'testing':
        case 'production':
            error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}else{
    exit('The application environment is not set correctly.');
}


//configuration base de donnee
$database = array(
    "serveur"=>"db_host",
    "nom_base"=>"db_name",
    "utilisateur"=>"db_user",
    "motdepasse"=>"db_password"
);

//configuration email
$from=array(
    "email"=>"",
    "nom"=>""
);

$configurationEmail = array(
    "host" =>"",
    "utilisateur" =>"",
    "motdepasse" =>"",
    "port"=>465,
    "from"=>$from
);
//fin configuration email

$configuration = array(
    "defaultRoot"=>"RoutingInstall",
    "url" => $_GET['url'],
    "database" => $database,
    "configurationEmail"=>$configurationEmail,
    "dossierProjet" => "los-framework",
    "nomApp" => "DefaultApp"
);
\systeme\Application\Configuration::addConfiguration($configuration,"DefaultApp");

