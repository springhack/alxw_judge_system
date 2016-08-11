<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-08-04 22:03:17
        Filename: Index.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

    //Import class ValidationCode
    import('Util.ValidationCode');

    Router::uses('/ValidationCode$/', function ($param, $url) {

        
        //Instance of class ValidationCode
        $c = new ValidationCode(128, 32, 4);
        //Show ValidationCode
        $c->showImage();
        

    });

?>
