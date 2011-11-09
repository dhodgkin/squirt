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

class sqlite
{

    public $connection;

    public function __construct()
    {
         include APPPATH.'config/sqlite.php';
         $this->config = $config['sqlite'];
    }
    
    public function open()
    {
        $db = $this->config['path'] ."/". $this->config['database'];
        
        if(!$this->connection = new SQLite3($db)) {
            die("Cannot find" . $this->config['database']);
        }
        else
        {
            return $db;
        }
    }
    
    public function test()
    {
        echo "<h4>Loading: " . $this->config['database'] . "</h4><br>";
        
        if ($this->connection) 
        {
            echo $this->open() . " loaded.";
        } 
        else 
        {
            echo "Can't find " . $this->config['database'];
        }
        
        return;
    }
    
}

/* End of file sqlite.php */
/* Location: ./lib/databases/sqlite.php */
