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

class mongodb
{

    public $connection;

    public function __construct()
    {
        // include APPPATH.'config/mongodb.php';
        // $this->config = $config['mysql'];
    }
    
    public function test()
    {
        return 'MongoDB loaded.';
    }
}

/* End of file mongodb.php */
/* Location: ./lib/databases/mongodb.php */
