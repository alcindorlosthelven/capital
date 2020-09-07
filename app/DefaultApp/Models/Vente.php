<?php
/**
 * capital - Vente.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 9/7/2020
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class Vente extends Model
{

    private $id,$id_institution,$id_client,$id_compte,$id_station,$date,$heure,$montant;

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
    public function getIdInstitution()
    {
        return $this->id_institution;
    }

    /**
     * @param mixed $id_institution
     */
    public function setIdInstitution($id_institution)
    {
        $this->id_institution = $id_institution;
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
    public function getIdCompte()
    {
        return $this->id_compte;
    }

    /**
     * @param mixed $id_compte
     */
    public function setIdCompte($id_compte)
    {
        $this->id_compte = $id_compte;
    }

    /**
     * @return mixed
     */
    public function getIdStation()
    {
        return $this->id_station;
    }

    /**
     * @param mixed $id_station
     */
    public function setIdStation($id_station)
    {
        $this->id_station = $id_station;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public static function listeParInstitution($id_institution){
        $con=self::connection();
        $req="select *from vente where id_institution=:id_institution";
        $stmt=$con->prepare($req);
        $stmt->execute(array(
            ":id_institution"=>$id_institution
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }


    public static function listeParStation($id_station){
        $con=self::connection();
        $req="select *from vente where id_station=:id_station";
        $stmt=$con->prepare($req);
        $stmt->execute(array(
            ":id_station"=>$id_station
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

}