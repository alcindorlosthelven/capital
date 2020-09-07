<?php
/**
 * capital - CompteClient.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/4/2020
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class CompteClient extends Model
{

    protected $table = "compte_client";
    private $id, $id_client, $sold, $no, $pin;

    /**
     * @return mixed
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param mixed $no
     */
    public function setNo($no)
    {
        $this->no = $no;
    }

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    }


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
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * @param mixed $id_client
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    /**
     * @return mixed
     */
    public function getSold()
    {
        return $this->sold;
    }

    /**
     * @param mixed $sold
     */
    public function setSold($sold)
    {
        $this->sold = $sold;
    }

    public static function getMontant($id_client)
    {
        $con = self::connection();
        $req = "select sold from compte_client where id_client='{$id_client}'";
        $rps = $con->query($req);
        $data = $rps->fetch();
        $sold = $data['sold'];
        return (float)$sold;
    }

    public static function rechercherParClient($id_client)
    {
        $con = self::connection();
        $req = "SELECT *FROM compte_client WHERE id_client=:id_client";
        $stmt = $con->prepare($req);
        $stmt->execute(array(
            ":id_client" => $id_client
        ));
        $res = $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        if (count($res) > 0) {
            return $res[0];
        } else {
            return null;
        }
    }

    public function depot($id_client,$montant){
        $montantActuel=self::getMontant($id_client);
        $montantActuel+=$montant;
        $con=self::connection();
        $req="update compte_client set sold=:sold where id_client=:id_client";
        $stmt=$con->prepare($req);
        if($stmt->execute(array(
            ":id_client"=>$id_client,
            ":sold"=>$montantActuel
        ))){
            return "ok";
        }else{
            return "no";
        }
    }

    public function retrait($id_client,$montant){
        $montantActuel=self::getMontant($id_client);
        $montantActuel-=$montant;
        if($montantActuel<0){
            return "Fonds insufisant";
        }
        $con=self::connection();
        $req="update compte_client set sold=:sold where id_client=:id_client";
        $stmt=$con->prepare($req);
        if($stmt->execute(array(
            ":id_client"=>$id_client,
            ":sold"=>$montantActuel
        ))){
            return "ok";
        }else{
            return "no";
        }
    }

    public static function rechercherParNumero($numero)
    {
        $con = self::connection();
        $req = "SELECT *FROM compte_client WHERE no=:no";
        $stmt = $con->prepare($req);
        $stmt->execute(array(
            ":no" => $numero
        ));
        $res = $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        if (count($res) > 0) {
            return $res[0];
        } else {
            return null;
        }
    }

}