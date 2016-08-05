<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 22:03:17
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    Router::uses('/\/$/', function ($param, $url) {
        $o = Router::O('404');
        Router::Render($o);
    });

?>
