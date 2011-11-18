<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Squirt
 *
 * A PHP MVC Framework built for personal and commercial use.
 *
 * @package     Squirt
 * @author      Josh Manders, Prone Media, Damien Hodgkin
 * @copyright   Copyright (c) 2010 - 2011, Josh Manders, Prone Media, Damien Hodgkin
 * @link        http://www.joshmanders.com
 * @link        http://www.pronemedia.com
 * @link        http://www.dhodgkin.us
 * @since       Version 1.0
 */

// ------------------------------------------------------------------------

class exception_handler extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
     
    public function __toString()
    {
        if(!$this->previous)
        {
            $prev = "N/A";
        }
        else
        {
            $prev = $this->getPrevious();
        }

        $exception = '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">'
        .'<h4>A PHP Error was encountered</h4>'
        .'<strong>Message:</strong> '.$this->getMessage().'<br>'
        .'<strong>Previous:</strong> '.$prev.'<br>'
        .'<strong>Exception Code:</strong> '.$this->getCode().'<br>'
        .'<strong>Filename:</strong> '.$this->getFile().'<br>'
        .'<strong>Line Number:</strong> '.$this->getLine().'<br>'
        .'<strong>Stack Trace:</strong> <br><pre><code>'.$this->getTraceAsString().'</code></pre></div>';
        die($exception);
    }
}

class error_handler extends ErrorException
{
    protected $severity;
    public function __construct($message, $code, $severity, $filename, $lineno)
    {
        $this->severity = $severity;
        parent::__construct($message, $code, $severity, $filename, $lineno);
    }

    public function __toString()
    {
        $exception = '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">'
        .'<h4>A PHP Error was encountered</h4>'
        .'<strong>Message:</strong> '.$this->getMessage().'<br>'
        .'<strong>Exception Code:</strong> '.$this->getCode().'<br>'
        .'<strong>Severity:</strong> '.$this->getSeverityLvl().'<br>'
        .'<strong>Filename:</strong> '.$this->getFile().'<br>'
        .'<strong>Line Number:</strong> '.$this->getLine().'<br>'
        .'<strong>Previous:</strong> '.$this->getPrevoius().'<br>'
        .'<strong>Stack Trace:</strong> <br><pre><code>'.$this->getTraceAsString().'</code></pre></div>';
        die($exception);
    }

    public function getSeverityLvl()
    {
        $lvl_of_severity = array(
            E_ERROR => 'Error',
            E_WARNING => 'Warning',
            E_PARSE => 'Parsing Error',
            E_NOTICE => 'Notice',
            E_CORE_ERROR => 'Core Error',
            E_CORE_WARNING => 'Core Warning',
            E_COMPILE_ERROR => 'Compile Error',
            E_COMPILE_WARNING => 'Compile Warning',
            E_USER_ERROR => 'User Error',
            E_USER_WARNING => 'User Warning',
            E_USER_NOTICE => 'User Notice',
            E_STRICT => 'Runtime Notice'
        );

        //$severity = $this->getSeverity();
        return $lvl_of_severity[$this->severity];
    }
}
/* End of file error_handler.php */
/* Location: ./lib/core/error_handler.php */
