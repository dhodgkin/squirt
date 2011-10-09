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
        die('Class does not exist.');
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

function squirt_error_handler($severity, $message, $filepath, $line)
{
    $levels = array(E_ERROR	=> 'Error',
                    E_WARNING => 'Warning',
                    E_PARSE	=> 'Parsing Error',
                    E_NOTICE => 'Notice',
                    E_CORE_ERROR => 'Core Error',
                    E_CORE_WARNING => 'Core Warning',
                    E_COMPILE_ERROR => 'Compile Error',
                    E_COMPILE_WARNING => 'Compile Warning',
                    E_USER_ERROR => 'User Error',
                    E_USER_WARNING => 'User Warning',
                    E_USER_NOTICE => 'User Notice',
                    E_STRICT => 'Runtime Notice');
    if ($severity == E_STRICT)
    {
        return;
    }

    if (($severity & error_reporting()) == $severity)
    {
        show_php_error($levels[$severity], $message, $filepath, $line);
    }
}

function show_php_error($severity, $message, $filepath, $line)
{
        echo $severity.' on line #'.$line.' -> '.$message.'<br >';
        exit;
}

function show_error($message)
{
        echo $message.'<br >';
        exit;
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


/* End of file global_functions.php */
/* Location: ./lib/core/global_functions.php */
