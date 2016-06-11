<?php
/**
 * Created by PhpStorm.
 * User: Kemoy Campbell
 * Date: 6/11/16
 * Time: 11:07 AM
 * @version 1.5
 */

if (!function_exists('path'))
{
    function path($filename)
    {
        return dirname(dirname(__FILE__)).$filename;
    }
}

$configFile = path('/BlockBruteForce/config.php');
$libraryFile = path('/BlockBruteForce/block.php');
$libraryClass = path('/BlockBruteForce/BlockBruteForce.php');

include_once($configFile);
include_once($libraryFile);
include_once($libraryClass);