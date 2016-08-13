<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-08 21:55:34
        Filename: Config.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    $CONFIG = array(
        'DB_HOST' => '127.0.0.1',
        'DB_USER' => 'root',
        'DB_PASS' => 'sksks',
        'DB_NAME' => 'alxw_judge',
        'HASH_SALT' => 'SpringHack',
        'SEO_INFO' => array(
            'meta' => array(
                array(
                    'name' => 'keyword',
                    'content' => 'Alxw, Virtual Judge, Online Judge, SpringHack'
                ),
                array(
                    'name' => 'viewport',
                    'content' => 'width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'
                )
            ),
            'link' => array(
                array(
                    'rel' => 'icon',
                    'type' => 'image/x-icon',
                    'href' => 'favicon.ico'
                ),
                array(
                    'href' => '//cdn.muicss.com/mui-0.6.8/css/mui.min.css',
                    'rel' => 'stylesheet',
                    'type' => 'text/css',
                    'media' => 'screen'
                )
            )/**,
            'script' => array(
                array(
                    'language' => 'javascript',
                    'src' => 'demo.src.js'
                )
            )**/
        )
    );

    $DB_STRUCT = array(
        array(
            'table' => 'User',
            'struct' => array(
                'id' => 'int primary key not null auto_increment',
                'user' => 'text',
                'pass' => 'text',
                'nick' => 'text',
                'info' => 'text'
            )
        ),
        array(
            'table' => 'Record',
            'struct' => array(
                'id' => 'int primary key not null auto_increment',
                'oid' => 'text',
                'rid' => 'text',
                'tid' => 'text',
                'user' => 'text',
                'time' => 'text',
                'memory' => 'text',
                'long' => 'text',
                'lang' => 'text',
                'result' => 'text',
                'oj' => 'text',
                'oj_u' => 'text',
                'oj_p' => 'text',
                'code' => 'longtext',
                'contest' => 'int'
            )
        )
    );

?>
