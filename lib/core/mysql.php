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

class mysql
{

    public $connection;

    public function __construct()
    {
        include APPPATH.'config/mysql.php';
        $this->config = $config['mysql'];
    }
    
    public function open()
    {
        if ($this->config['use'] === TRUE)
        {
            if (!$this->connection = mysql_connect($this->config['host'], $this->config['user'], $this->config['pass']))
            {
                die('Unable to connect to MySQL using username and password.');
            }
            
            if (!mysql_select_db($this->config['database'], $this->connection))
            {
                die('Unable to select database.');
            }
        }
    }
    
    public function version()
    {
        $this->query('SELECT version() AS version');
        return $this->row();
    }
    
    public function insert($table, $data)
	{
        $fields = '(';
        $values = '';
        $query = 'INSERT INTO '.$table.' ';
        foreach($data as $key => $value)
        {
            $fields .= $key.',';
            if( is_int($value))
            {
                $values .= $value.",";
            }
            else
            {
                $values .= "'".addslashes($value)."',";
            }
        }
        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);
        $fields .= ')';
        $query .= $fields . ' VALUES('.$values.')';
        $query = $this->clean_data($query);
        $this->query($query);
    }

    public function rows($as = 'object')
    {
        if ($as === 'object')
        {
            return mysql_fetch_object($this->query);
        }
        else
        {
            return mysql_fetch_assoc($this->query);
        }
    }

    public function row()
    {
        return mysql_result($this->query, 0);
    }
    
    public function num_rows()
    {
        return mysql_num_rows($this->query);
    }

    public function query($sql)
    {
        $this->query = mysql_query($sql);
    }

    public function update($table, $data, $where)
    {
        $query = 'UPDATE '.$table.' SET ';
        foreach($data as $key => $value)
        {
            if (is_int($value))
            {
                $query .= $key.' = '.$value.', ';
            }
            else
            {
                $query .= $key .' = ' . "'".addslashes($value)."', ";
            }
        }
        $query = substr($query, 0, -2);
        foreach ($where as $key => $value)
        {
            if (is_int($value))
            {
                $query .= ' WHERE '.$key.' = '.$value;
            }
            else
            {
                $query .= ' WHERE '.$key.' = '."'".addslashes($value)."'";
            }
        }
        $query .= ' LIMIT 1';
        $query = $this->clean_data($query);
        $this->query($query);
    }
    
    private function clean_data($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return mysql_real_escape_string($data);
    }

    public function close()
    {
        if ($this->config['use'] === TRUE)
        {
            mysql_close($this->connection);
        }
    }
}

/* End of file mysql.php */
/* Location: ./lib/core/mysql.php */
