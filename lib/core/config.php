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

class config
{
    public function __construct() {}
    
    public function item($type = NULL, $key = NULL)
    {
        include APPPATH.'config/'.$type.'.php';
        return $config[$type][$key];
    }
}

/* End of file config.php */
/* Location: ./lib/core/config.php */
