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

class controller extends squirt
{
    public function __construct()
    {
        parent::__construct();
        $this->db->open();
    }
    
    public function not_found()
    {
        include APPPATH.'errors/not_found.php';
    }
    
    public function __deconstruct()
    {
        $this->db->close();
    }
}

/* End of file controller.php */
/* Location: ./lib/core/controller.php */
