<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 22:03:17
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    Router::uses('/.*/', function ($param, $url) {

        //Get view component 404
        $view = Router::V('404');

        //Render view
        Router::Render(
            //View component
            $view, 
            //Merge SEO_INFO and title
            array_merge(
                //SEO_INFO
                $GLOBALS['CONFIG']['SEO_INFO'],
                //Title
                array('title' => 'Default page, 404 Not Found !')
            )
        );

    });

?>
