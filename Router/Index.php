<?php

    Router::uses('/\/$/', function ($param, $url) {
        $o = Router::O('404');
        Router::Render($o);
    });

?>
