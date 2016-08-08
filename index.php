<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-08 21:55:44
        Filename: index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php
    
    define('APP_ROOT', dirname(__FILE__));
    define('RUN_ROOT', APP_ROOT.'/'.'Runtime');
    define('WEB_ROOT', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

    require_once(RUN_ROOT.'/App.php');
    require_once(RUN_ROOT.'/MySQL.php');
    require_once(RUN_ROOT.'/Config.php');
    require_once(RUN_ROOT.'/Router.php');

    App::init();
    Router::init();

?>
