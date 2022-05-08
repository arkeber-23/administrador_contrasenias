<?php
namespace Eber\config;

class Utilidad{


    public static function destrySession($nombre_session){
        if(isset($_SESSION[$nombre_session])){
            $_SESSION[$nombre_session]= null;
            unset($_SESSION[$nombre_session]);
        }
        return $nombre_session;
    }


}


?>