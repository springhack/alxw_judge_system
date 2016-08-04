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
            self::Render(self::O('404'));
        }
        
        public static function O($model)
        {
            return file_get_contents(APP_ROOT.'/View/'.$model.'/index.html');
        }

        public static function Render($html)
        {
            echo $html;
        }

    }
?>
