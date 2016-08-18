<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-11 14:46:05
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    import('Util.StaticTools');

    function login($param, $url)
    {
        if (App::S('uid'))
            Router::R('Main');
        $view = Router::V('Login');
        Router::Render(
            $view, 
            array_merge(
                $GLOBALS['CONFIG']['SEO_INFO'],
                array('title' => 'Welcome to Alxw Judge System - Login && Register')
            )
        );
    }

    Router::uses('/\/Login$/', 'login');

    Router::uses('/\/$/', 'login');

    Router::uses('/\/Status$/', function ($param, $url) {
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
        } elseif (App::F('action', '/^register$/')) {
            if (App::PF('user', '/^[0-9a-zA-Z]{4,23}$/') &&
                App::PF('pass', '/^[0-9a-zA-Z_]{4,23}$/') &&
                App::PF('nick', '/^[0-9a-zA-Z_\x80-\xff]{2,23}$/') &&
                App::PF('verify', '/^[0-9a-zA-Z]{4,4}$/'))
            {
                $user = App::P('user');
                $pass = StaticTools::hash(App::P('pass'), $GLOBALS['CONFIG']['HASH_SALT']);
                $verify = App::P('verify');
                $y_verify = App::S('verify');
                if (strtolower($verify) != strtolower($y_verify))
                {
                    echo json_encode(array(
                        'result' => 'failed',
                        'reason' => 'Verify code error !'
                    ));
                    return;
                }
                $uid = App::$M->from('User')->where("`user`='$user'")->select('id')->fetch_one();
                if ($uid != '')
                {
                    echo json_encode(array(
                        'result' => 'failed',
                        'reason' => 'User exist !'
                    ));
                } else {
                    App::$M->value(array(
                        'user' => $user,
                        'pass' => $pass,
                        'nick' => $nick
                    ))->insert('User');
                    echo json_encode(array(
                        'result' => 'success'
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
