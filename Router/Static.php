<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-11 13:59:38
        Filename: Static.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php
    
    Router::uses('/^\/Static.*/', function ($param, $url) {
        Router::R(WEB_ROOT.$url);
    });

?>
