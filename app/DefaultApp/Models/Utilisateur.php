<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 30/03/2018
 * Time: 16:10
 */

namespace app\DefaultApp\Models;
use \systeme\Model\Utilisateur as user;
class Utilisateur extends user
{
    protected $table="utilisateur";
    public static function total(){
        $bdd=self::connection();
        $total = $bdd->query('SELECT * FROM utilisateur');
        return $total->rowCount();
    }

    public static function listeAgent(){
        $con=self::connection();
        $req="select *from utilisateur where role='agent'";
        $stmt=$con->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

    public static function listeReparateur(){
        $con=self::connection();
        $req="select *from utilisateur where role='reparateur'";
        $stmt=$con->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

    public static function listeAdmin(){
        $con=self::connection();
        $req="select *from utilisateur where role='administrateur'";
        $stmt=$con->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

    public function update(){
        $con=self::connection();
        $req="update utilisateur set nom=:nom,prenom=:prenom,pseudo=:pseudo,email=:email,telephone=:telephone,motdepasse=:motdepasse where id=:id";
        $param=array(
          ":nom"=>$this->nom,
          ":prenom"=>$this->prenom,
          ":pseudo"=>$this->pseudo,
          ":email"=>$this->email,
          ":telephone"=>$this->telephone,
          ":motdepasse"=>$this->motdepasse,
          ":id"=>$this->id
        );
        $stmt=$con->prepare($req);
        if($stmt->execute($param)){
            return "ok";
        }else{
            return "no";
        }
    }
}