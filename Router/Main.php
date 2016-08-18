<?php
    
    Router::uses('/\/Main$/', function ($param, $url) {
        if (!App::S('uid'))
            Router::R('Login');
        $view = Router::V('Main');
        Router::Render(
            $view, 
            array_merge(
                $GLOBALS['CONFIG']['SEO_INFO'],
                array('title' => 'Welcome to Alxw Judge System')
            )
        );
    });

?>
