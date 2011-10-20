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

class squirt
{
    public function __construct()
    {
        $this->db = new mysql();
        $this->input = new input();
        $this->config = new config();
        $this->session = new session();
        $this->user_agent = new user_agent();
        $this->load = new loader($this);
        include APPPATH.'config/autoload.php';
        foreach ($autoload as $type => $load)
        {
            if ($type === 'libraries')
            {
                foreach ($load as $name)
                {
                    if ($name !== '')
                    {
                        $this->load->library($name);
                    }
                }
            }
            else if ($type === 'models')
            {
                foreach ($load as $name)
                {
                    if ($name !== '')
                    {
                        $this->load->model($name);
                    }
                }
            }
            else if ($type === 'helpers')
            {
                foreach ($load as $name)
                {
                    if ($name !== '')
                    {
                        $this->load->helper($name);
                    }
                }
            }
        }
    }
}

/* End of file squirt.php */
/* Location: ./lib/core/squirt.php */
