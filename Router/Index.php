<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-11 14:46:05
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    Router::uses('/\/$/', function ($param, $url) {


        //Get view component 404
        $view = Router::V('Index');

        //Render view
        Router::Render(
            //View component
            $view, 
            //Merge SEO_INFO and title
            array_merge(
                //SEO_INFO
                $GLOBALS['CONFIG']['SEO_INFO'],
                //Title
                array('title' => 'Welcome to Alxw Judge System - Login && Register')
            )
        );
        

    });

?>
