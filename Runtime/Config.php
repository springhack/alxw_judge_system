<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 17:51:46
        Filename: Config.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php
    $CONFIG = array(
        'DB_HOST' => '127.0.0.1',
        'DB_USER' => 'root',
        'DB_PASS' => 'sksks',
        'DB_NAME' => 'build_vj',
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
?>
