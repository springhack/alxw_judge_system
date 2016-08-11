<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 17:57:06
        Filename: Router.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php
    class Router {
        
        public static $match = array();

        public static function init()
        {
            $dir = opendir(APP_ROOT.'/Router');
            while ($file = readdir($dir))
                if ($file != '..' && $file != '.')
                    require_once(APP_ROOT.'/Router/'.$file);
            foreach (self::$match as $item)
                if (preg_match_all($item['REG'], $_SERVER['REQUEST_URI'], $m))
                {
                    $item['FUNC']($m, $_SERVER['REQUEST_URI']);
                    exit(0);
                }
            self::R('404');
        }

        public static function uses($reg, $func)
        {
            self::$match[] = array(
                'REG' => $reg,
                'FUNC' => $func
            );
        }

        public static function R($page)
        {
            if ($page != '404')
            {
                header('Location: '.$page);
                exit(0);
            }
            self::Render(self::V('404'));
        }
        
        public static function V($model)
        {
            return array(
                'html' => file_get_contents(APP_ROOT.'/View/'.$model.'/dist/index.html'),
                'name' => $model
            );
        }

        public static function Render($view, $param = array())
        {
            $buffer = str_replace('./js/', WEB_ROOT.'/View/'.$view['name'].'/dist/js/', $view['html']);
            $buffer = str_replace('./css/', WEB_ROOT.'/View/'.$view['name'].'/dist/css/', $buffer);
            if (isset($param['title']))
                $buffer = str_replace('<title>SpringHack</title>', '<title>'.$param['title'].'</title>', $buffer);
            if (isset($param['meta']))
            {
                $tmp_buffer = '';
                foreach ($param['meta'] as $meta)
                    $tmp_buffer .= PHP_EOL.'<meta content="'.$meta['content'].'" name="'.$meta['name'].'">';
                $buffer = str_replace('<meta charset="UTF-8">', '<meta charset="UTF-8">'.$tmp_buffer, $buffer);
            }
            if (isset($param['link']))
            {
                $tmp_buffer = '';
                foreach ($param['link'] as $link)
                {
                    $tmp_buffer .='<link';
                    foreach ($link as $k => $v)
                        $tmp_buffer .= ' '.$k.'="'.$v.'"';
                    $tmp_buffer .= '>'.PHP_EOL;
                }
                $buffer = str_replace('</head>', $tmp_buffer.'</head>', $buffer);
            }
            if (isset($param['script']))
            {
                $tmp_buffer = '';
                foreach ($param['script'] as $link)
                {
                    $tmp_buffer .='<script';
                    foreach ($link as $k => $v)
                        $tmp_buffer .= ' '.$k.'="'.$v.'"';
                    $tmp_buffer .= '></script>'.PHP_EOL;
                }
                $buffer = str_replace('</html>', $tmp_buffer.'</html>', $buffer);
            }
            echo $buffer;
            exit(0);
        }

    }
?>
