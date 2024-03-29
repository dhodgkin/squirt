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

class welcome extends controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo $this->user_agent->browser();
        // $this->load->view('welcome');

        try
        {
            if($this->load->database('sqlite'))
            {
                echo $this->db->test();
                echo $this->db->version();
            } 
        }
        catch(error_handler $e)
        {
            $e->__toString();
        }
    }
}

/* End of file welcome.php */
/* Location: ./app/controllers/welcome.php */
