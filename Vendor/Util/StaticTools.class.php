<?php

    class StaticTools {
        public static function hash($pass, $salt)
        {
            return substr(md5($pass.$salt, false), 0, 16).substr(md5($salt.$pass), 16);
        }
    }

?>
