<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 22:03:17
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    Router::uses('/.*/', function ($param, $url) {
        $view = Router::V('404');
        Router::Render($view, array_merge(
           $GLOBALS['CONFIG']['SEO_INFO'],
           array('title' => '404 Not Found !')
        ));
    });

?>
