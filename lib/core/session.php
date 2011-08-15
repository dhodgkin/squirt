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

class session
{

    public function __construct()
    {
        require APPPATH.'config/session.php';
        $this->config = $config['session'];
        session_start();
    }
    
    public function set($key, $value)
    {
        $_SESSION[$this->config['sess_id']][$key] = $value;
        return TRUE;
    }
    
    public function get($key)
    {
        return $_SESSION[$this->config['sess_id']][$key];
    }
    
    public function delete($key)
    {
        unset($_SESSION[$this->config['sess_id']][$key]);
        return TRUE;
    }
}

/* End of file session.php */
/* Location: ./lib/core/session.php */
