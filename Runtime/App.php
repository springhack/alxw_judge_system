<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-05 16:36:40
        Filename: App.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    @session_start();

    function import($vendor)
    {
        require_once(APP_ROOT.'/Vendor/'.str_replace('.', '/', $vendor).'.class.php');
    }

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
                $_SESSION[$key] = $val;
            return isset($_SESSION[$key])?$_SESSION[$key]:NULL;
        }

        public static function F($key, $reg)
        {
            return (self::I($key) && preg_match($reg, self::I($key)));
        }

        public static function GF($key, $reg)
        {
            return (self::G($key) && preg_match($reg, self::G($key)));
        }

        public static function PF($key, $reg)
        {
            return (self::P($key) && preg_match($reg, self::P($key)));
        }

        public static function init()
        {
            global $CONFIG, $DB_STRUCT;
            self::$M = new MySQL($CONFIG['DB_HOST'],$CONFIG['DB_USER'], $CONFIG['DB_PASS'], $CONFIG['DB_NAME']);
            foreach ($DB_STRUCT as $table)
                if (self::$M->query("SHOW TABLES LIKE '".$table['table']."'")->num_rows() != 1)
                    self::$M->struct($table['struct'])->create($table['table']);
        }

    }

?>
