<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-4-21
 * Time: 下午10:31
 *
 * Global functions for console
 */

function ln($msg){
    echo $msg . PHP_EOL;
}

function ln_color($color, $msg)
{
    echo "\033[" . $color . 'm' . $msg . "\033[0m" . PHP_EOL;
}

function ln_red($msg)
{
    ln_color('0;31', $msg);
}

function ln_green($msg)
{
    ln_color('0;32', $msg);
}

function ln_yellow($msg){
    ln_color('1;33', $msg);
}


//ln_red("aa");
//ln_green("aa");
