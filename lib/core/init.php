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

define('SQUIRT_VERSION', '1.1.0');

include BASEPATH.'core/global_functions.php';

include APPPATH.'config/global.php';

include APPPATH.'config/routes.php';

set_error_handler('squirt_error_handler');

if (!is_php('5.3'))
{
    @set_magic_quotes_runtime(0);
}

if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
{
    @set_time_limit(300);
}

$path = get_path();

foreach ($config['routes'] as $key => $value)
{
    if (preg_match('#^'.$key.'$#', implode('/', $path)))
    {
        if (strpos($value, '$') !== FALSE AND strpos($key, '(') !== FALSE)
        {
            $path = preg_replace('#^'.$key.'$#', $value, implode('/', $path));
            $path = explode('/', $path);
        }
    }
}

if (!empty($path[1]))
{
    $controller = $path[1];
    if (file_exists(APPPATH.'controllers/'.$controller.'.php'))
    {
        include APPPATH.'controllers/'.$controller.'.php';
        $controller = new $controller();
    }
    else
    {
        $controller = new Controller();
    }
    $method = (empty($path[2]) ? 'index' : $path[2]);
    $method = (method_exists($controller, $method) ? $method : 'not_found');
    $path = array_filter($path);
    call_user_func_array(array($controller, $method), array_slice($path, 2));
}
else
{
    $controller = $config['global']['base_controller'];
    $controller = new $controller();
    $controller->index();
}

/* End of file init.php */
/* Location: ./lib/init.php */
