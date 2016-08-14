<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-11 14:46:05
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    import('Util.StaticTools');

    Router::uses('/\/$/', function ($param, $url) {
        $view = Router::V('Index');
        Router::Render(
            $view, 
            array_merge(
                $GLOBALS['CONFIG']['SEO_INFO'],
                array('title' => 'Welcome to Alxw Judge System - Login && Register')
            )
        );
    });

    Router::uses('/Index$/', function ($param, $url) {
        if (App::PF('action', '/^login$/'))
        {
            if (App::PF('user', '/^[0-9a-zA-Z]{4,23}$/') && App::PF('pass', '/^[0-9a-zA-Z_]{4,23}$/'))
            {
                $user = App::P('user');
                $pass = StaticTools::hash(App::P('pass'), $GLOBALS['CONFIG']['HASH_SALT']);
                $uid = App::$M->from('User')->where("`user`='$user' and `pass`='$pass'")->select('id')->fetch_one();
                if ($uid != '')
                {
                    App::S('uid', $uid['id']);
                    echo json_encode(array(
                        'result' => 'success',
                        'uid' => $uid['id']
                    ));
                } else {
                    echo json_encode(array(
                        'result' => 'failed',
                        'reason' => 'No such user or password wrong !'
                    ));
                }
            } else {
                echo json_encode(array(
                    'result' => 'failed',
                    'reason' => 'Illegal user or password !'
                ));
            }
        } else {
            echo json_encode(array(
                'result' => 'failed',
                'reason' => 'Illegal request !'
            ));
        }
    });

?>
