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
                $this->load_em($load);
            }
            else if ($type === 'models')
            {
                $this->load_em($load);
            }
            else if ($type === 'helpers')
            {
                $this->load_em($load);
            }
        }
    }
    
    private function load_em($load) {
        foreach ($load as $name)
        {
            if ($name !== '')
            {
                $this->load->helper($name);
            }
        }
    }
        
    public function start()
    {
        $path = get_path();
        $router = new router();
        $router->register($this->config->item('routes'));
        $path = $router->route($path);
        if (!empty($path[1]))
        {
            $controller = $path[1];
            if (file_exists(APPPATH.'controllers/'.$controller.'.php'))
            {
                include APPPATH.'controllers/'.$controller.'.php';
                $controller = new $controller($this);
            }
            else
            {
                $controller = new Controller($this);
            }
            $method = (empty($path[2]) ? 'index' : $path[2]);
            $method = (method_exists($controller, $method) ? $method : 'not_found');
            $path = array_filter($path);
            call_user_func_array(array($controller, $method), array_slice($path, 2));
        }
        else
        {
            $controller = $this->config->item('global', 'base_controller');
            $controller = new $controller();
            $controller->index();
        }
    }
}

/* End of file squirt.php */
/* Location: ./lib/core/squirt.php */
