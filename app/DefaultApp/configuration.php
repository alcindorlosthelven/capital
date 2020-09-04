<?php
//LES CONSTANTS
define('ENVIRONMENT', 'development');
//define('ENVIRONMENT', 'production');
define('VERSION', 'v0.0.1');

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
    "serveur"=>"localhost",
    "nom_base"=>"capital",
    "utilisateur"=>"root",
    "motdepasse"=>""
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
    "defaultRoot"=>"Routing",
    "url" => $_GET['url'],
    "database" => $database,
    "configurationEmail"=>$configurationEmail,
    "dossierProjet" => "capital",
    "nomApp" => "DefaultApp"
);
\systeme\Application\Configuration::addConfiguration($configuration,"DefaultApp");

