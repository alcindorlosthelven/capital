<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 31/03/2018
 * Time: 19:39
 */

namespace app\DefaultApp;
use systeme\Application\Application;
class DefaultApp extends Application
{
    //---

    public static function convertDate($date){
        if(stripos($date, "/") !== false) {
            $dfin = explode("/", $date);
            $finab = $dfin[2] . "-" . $dfin[0] . "-" . $dfin[1];
            return $finab;
        }else{
            return $date;
        }
    }
}