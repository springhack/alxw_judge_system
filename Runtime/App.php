<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 18:10:29
        Filename: App.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    @session_start();

    class App {

        public static $M;

        public static function I($key)
        {
            return isset($_REQUEST[$key])?$_REQUEST[$key]:NULL;
        }

        public static function G($key)
        {
            return isset($_GET[$key])?$_GET[$key]:NULL;
        }

        public static function P($key)
        {
            return isset($_POST[$key])?$_POST[$key]:NULL;
        }
        
        public static function S($key, $val = NULL)
        {
            if ($val != NULL)
                $_SESSION[$KEY] = $VAL;
            return isset($_SESSION[$key])?$_SESSION[$key]:NULL;
        }

        public static function init()
        {
            global $CONFIG;
            self::$M = new MySQL($CONFIG['DB_HOST'],$CONFIG['DB_USER'], $CONFIG['DB_PASS'], $CONFIG['DB_NAME']);
        }

    }

?>
