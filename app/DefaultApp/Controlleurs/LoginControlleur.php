<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 14/03/2018
 * Time: 20:32
 */

namespace app\DefaultApp\Controlleurs;

use PDOException;
use systeme\Application\Application;

class LoginControlleur extends BaseControlleur
{
    protected $nom_template="login";

    public function login()
    {
        $variables=array(
            "titre"=>"Login"
        );

        $this->render("utilisateur/login",$variables);
    }
}