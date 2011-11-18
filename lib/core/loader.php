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

class loader 
{
    public function __construct($instance)
    {
        $this->instance = $instance;
    }
    
    public function view($view = NULL, $data = NULL)
    {
        if (file_exists(APPPATH.'views/'.$view.'.php'))
        {
            if (is_array($data))
            {
                extract($data, EXTR_SKIP);
            }
            include APPPATH.'views/'.$view.'.php';
        }
    }

    public function library($library)
    {
        if (file_exists(APPPATH.'libraries/'.$library.'.php'))
        {
            include APPPATH.'libraries/'.$library.'.php';
            $this->instance->$library = new $library();
            return $this;
        }
        elseif (file_exists(BASEPATH.'libraries/'.$library.'.php'))
        {
            include BASEPATH.'libraries/'.$library.'.php';
            $this->instance->$library = new $library();
            return $this;
        }
        else
        {
            echo 'Error loading library.';
        }
    }

    public function model($model)
    {
        if (file_exists(APPPATH.'models/'.$model.'.php'))
        {
            include APPPATH.'models/'.$model.'.php';
            $this->instance->$model = new $model();
            return $this;
        }
        else
        {
            echo 'Error loading model.';
        }
    }
    
    public function helper($helper)
    {
        if (file_exists(APPPATH.'helpers/'.$helper.'.php'))
        {
            include APPPATH.'helpers/'.$helper.'.php';
        }
        else
        {
            echo 'Error loading helper.';
        }
    }
    
    public function database($database)
    {
        if (file_exists(BASEPATH.'databases/'.$database.'.php'))
        {
            include BASEPATH.'databases/'.$database.'.php';
            $this->instance->$database = new $database();
            return $this;
        }
        else
        {
            echo 'Error loading database.';
        }
    }
}

/* End of file loader.php */
/* Location: ./lib/core/loader.php */
