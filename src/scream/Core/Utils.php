<?php

namespace Scream\Core;

class Utils
{
     function pre($args){
        echo '<pre>';
        print_r($args);
        exit;
    }
}