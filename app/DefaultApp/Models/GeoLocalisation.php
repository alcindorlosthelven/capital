<?php
/**
 * reparation - GeoLocalisation.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/24/2020
 */

namespace app\DefaultApp\Models;


class GeoLocalisation
{
    private $latitude, $longitude;

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    function __construct()
    {
        ?>
        <script>
            function surveillePosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var days = 10;
                var expires;
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
                document.cookie = escape("longitude") + "=" + escape(longitude) + expires + "; path=/";
                document.cookie = escape("latitude") + "=" + escape(latitude) + expires + "; path=/";
            }

            function erreurPosition(error) {
                var info = "Erreur lors de la géolocalisation : ";
                switch (error.code) {
                    case error.TIMEOUT:
                        info += "Timeout !";
                        break;
                    case error.PERMISSION_DENIED:
                        info += "Vous n’avez pas donné la permission";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        info += "La position n’a pu être déterminée";
                        break;
                    case error.UNKNOWN_ERROR:
                        info += "Erreur inconnue";
                        break;
                }

                //alert(info);
            }

            function maPosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                $("#latitude").val(latitude);
                $("#longitude").val(longitude);
            }

            if (navigator.geolocation) {
                //navigator.geolocation.getCurrentPosition(maPosition,erreurPosition,{maximumAge:0,enableHighAccuracy:true});
                var survId = navigator.geolocation.watchPosition(surveillePosition, erreurPosition, {
                    maximumAge: 5000,
                    enableHighAccuracy: true
                });
            }
        </script>
        <?php

        if (isset($_COOKIE['longitude'])) {
            $this->longitude = $_COOKIE['longitude'];
        }

        if (isset($_COOKIE['latitude'])) {
            $this->latitude = $_COOKIE['latitude'];
        }

    }

}