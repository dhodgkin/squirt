<?php
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

error_reporting(E_ALL);

$sys_path = '../lib';

$app_path = '../app';

$db_path  = '../app/db';

if (realpath($sys_path) !== FALSE)
{
    $sys_path = realpath($sys_path).'/';
}

$sys_path = rtrim($sys_path, '/').'/';

if (realpath($app_path) !== FALSE)
{
    $app_path = realpath($app_path).'/';
}

$app_path = rtrim($app_path, '/');

if (realpath($db_path) !== FALSE)
{
    $db_path = realpath($db_path).'/';
}

$db_path = rtrim($db_path, '/');

if (!is_dir($sys_path))
{
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

define('BASEPATH', str_replace("\\", "/", $sys_path));

define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

if (is_dir($app_path))
{
    define('APPPATH', $app_path.'/');
}
else
{
    if (!is_dir(BASEPATH.$app_path.'/'))
    {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
    }
    
    define('APPPATH', BASEPATH.$app_path.'/');
}

if (is_dir($db_path))
{
    define('DBPATH', $db_path.'/');
}
else
{
    if (!is_dir(BASEPATH.$db_path.'/'))
    {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
    }
    
    define('DBPATH', BASEPATH.$db_path.'/');
}

require_once BASEPATH.'core/init.php';

/* End of file squirt.php */
/* Location: ./squirt.php */
