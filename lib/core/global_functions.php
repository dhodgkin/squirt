<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Squirt
 *
 * A PHP MVC Framework built for personal and commercial use.
 *
 * @package     Squirt
 * @author      Josh Manders, Prone Media
 * @copyright   Copyright (c) 2010 - 2011, Josh Manders, Prone Media
 * @link        http://www.joshmanders.com
 * @link        http://www.pronemedia.com
 * @since       Version 1.0
 */

// ------------------------------------------------------------------------

function __autoload($class)
{
    $class = strtolower($class);
    $core = BASEPATH.'/core/';
    $libraries = BASEPATH.'/libraries/';
    $controllers = APPPATH.'/controllers/';
    if (file_exists($core.$class.'.php'))
    {
        include $core.$class.'.php';
    }
    elseif (file_exists($libraries.$class.'.php'))
    {
        include $libraries.$class.'.php';
    }
    elseif (file_exists($controllers.$class.'.php'))
    {
        include $controllers.$class.'.php';
    }
    else
    {
        show_error('Class (<strong>'.$class.'</strong>) does not exist.');
    }
}

function is_php($version = '5.0.0')
{
    static $is_php;
    $version = (string)$version;

    if (!isset($is_php[$version]))
    {
        $is_php[$version] = (version_compare(PHP_VERSION, $version) < 0) ? FALSE : TRUE;
    }
    return $is_php[$version];
}

function get_path()
{
    $uri = $_SERVER['REQUEST_URI'];
    $path = explode('/', $uri);
    array_shift($path);
    foreach($path as $key => $val)
    {
        if(strstr($val, '?'))
        {
            $xpval = explode('?', $val);
            $val = $xpval[0];
        }
        $new_path[$key + 1] = $val;
    }
    return $new_path;
}

function squirt_error_handler($errno, $errstr, $errfile, $errline)
{
    try {
        if (($errno & error_reporting()) == $errno)
        {
            throw new error_handler($errstr, 0, $errno, $errfile, $errline);
        }  
    }
    catch(Exception $e)
    {
        echo $e->showException($e);
    }
}

/* End of file global_functions.php */
/* Location: ./lib/core/global_functions.php */
