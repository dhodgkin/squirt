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

class input
{
    private $get, $post;

    public function __construct()
    {
        $this->user_agent = new user_agent();
        if (!empty($_GET))
        {
            foreach ($_GET as $key => $value)
            {
                $this->get[$key] = $this->sanitize($value);
            }
            unset($_GET);
        }
        if (!empty($_POST))
        {
            foreach ($_POST as $key => $value)
            {
                $this->post[$key] = $this->sanitize($value);
            }
            unset($_POST);
        }
    }
    
    public function get($key = NULL)
    {
        if ($key === NULL)
        {
            return $this->get;
        }
        return $this->get[$key];
    }
    
    public function post($key = NULL)
    {
        if ($key === NULL)
        {
            return $this->post;
        }
        return $this->post[$key];
    }
    
    public function is_ajax()
    {
        return ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');
    }
    
    private function sanitize($value)
    {
        return $value;
    }
}

/* End of file input.php */
/* Location: ./lib/core/input.php */
