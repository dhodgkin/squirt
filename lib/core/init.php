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

include BASEPATH.'core/router.php';

include APPPATH.'config/global.php';

set_error_handler('squirt_error_handler');

if (!is_php('5.3'))
{
    @set_magic_quotes_runtime(0);
}

if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
{
    @set_time_limit(300);
}

$squirt = new Squirt();
$squirt->start();

/* End of file init.php */
/* Location: ./lib/init.php */
