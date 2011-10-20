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

class user_agent 
{
    public function __construct()
    {
        $this->user_agent = (!isset($_SERVER['HTTP_USER_AGENT'])) ? FALSE : $_SERVER['HTTP_USER_AGENT'];
    }
    
    public function show()
    {
        return $this->user_agent;
    }
    
    public function browser()
    {
        if (strpos($this->user_agent, 'chrome') === TRUE)
        {
            return 'Chrome';
        }
    }
}

/* End of file user_agent.php */
/* Location: ./lib/core/user_agent.php */
