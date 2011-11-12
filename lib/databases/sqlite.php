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

class sqlite extends SQLite3
{
    protected $connection;
    protected $db;
    
    public function __construct()
    {
        include APPPATH.'config/sqlite.php';
        $this->config = $config['sqlite'];
    }
    
    public function open()
    {
        if($this->config['use'] === TRUE)
        {
            $this->db = $this->config['path'] ."/". $this->config['database'];
            
            //if(!$this->connection = new SQLite3($db)) 
            if($this->db_exists($this->db) == $this->db)
            {
                echo "Creating " . $this->config['database'] . " at " . $this->db;
                
                if($this->connection = new SQLite3($this->db))
                {
                    echo "Created " . $this->config['database'];
                    return $this->connection;
                }
                else
                {
                    echo "Unable to create " . $this->config['database'];
                }
                
            }
            else
            {
                echo "No such path."
            }
        }
    }
    
    public static function version()
    {
        $ver = SQLite3::version();
        return "<p>SQLite version ".$ver['versionString']."</p>";
    }
    
    public function db_exists($db) 
    {
        return $db;
    }
    
    public function test()
    {
        echo "<h4>Loading: " . $this->config['database'] . "</h4><br>";
        
        if ($this->open()) 
        {
            echo "Opened " . $this->config['database'];
        } 
        else 
        {
            echo "Can't find " . $this->config['database'] . " at " . $this->db;
        }
        
        return;
    }
    
}

/* End of file sqlite.php */
/* Location: ./lib/databases/sqlite.php */
