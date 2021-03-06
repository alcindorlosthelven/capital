<?php
/**
 * capital - Institution.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/3/2020
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class Institution extends Model
{

    private $id,$nom,$addresse,$telephone,$email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    private function existe($nom)
    {
        $con = self::connection();
        $req = "SELECT *FROM institution WHERE nom=:nom";
        $stmt = $con->prepare($req);
        $stmt->execute(array(
            ":nom" => $nom
        ));
        $res = $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        if (count($res) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add()
    {
        if($this->existe($this->nom)){
            return "Institution existe";
        }
        return parent::add(); // TODO: Change the autogenerated stub
    }

    public static function dernierId()
    {
        $con = self::connection();
        $req = "select id from institution  ORDER BY id DESC LIMIT 1";
        $rps = $con->query($req);
        $data = $rps->fetch();
        $id = $data['id'];
        return $id;
    }

}