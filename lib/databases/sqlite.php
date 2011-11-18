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
            $db = $this->config['path'] . $this->config['database'];
                
            if(!isset($this->connection))
            {
                echo "Trying...";
                // let's 'try' to create the db and 'catch' any exceptions
                try
                {
                    echo "anh...";
                    echo "<br>db: ".$db;

                    if($conn = new SQLite3($db, SQLITE3_OPEN_CREATE))
                    {
                        echo "<br>Test: Conn.";
                        print_r($conn);
                    }
                    else
                    {
                        echo "<br>Grr...";
                        throw new exception_handler('FUCK!');
                        print_r($conn);
                    }
                }
                catch (exception_handler $e)
                {
                    echo $e->__toString();
                }
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
            echo "<br>Opened " . $this->config['database'];
        } 
        else 
        {
            echo "<br>Can't find " . $this->config['database'] . " at " . $this->db;
        }
        
        return;
    }
    
}

/* End of file sqlite.php */
/* Location: ./lib/databases/sqlite.php */
