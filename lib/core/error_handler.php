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

class error_handler extends exception
{

    protected $severity;

    public function __construct($message, $code, $severity, $filename, $lineno)
    {
        $this->message = $message;
        $this->code = $code;
        $this->severity = $severity;
        $this->file = $filename;
        $this->line = $lineno;

        $this->levels = array(
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
    }
     
    public function showException()
    {
        $exception = '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">'
        .'<h4>A PHP Error was encountered</h4>'
        .'<strong>Severity:</strong> '.$this->getSeverity().'<br>'
        .'<strong>Exception Code:</strong> '.$this->getCode().'<br>'
        .'<strong>Message:</strong> '.$this->getMessage().'<br>'
        .'<strong>Filename:</strong> '.$this->getFile().'<br>'
        .'<strong>Line Number:</strong> '.$this->getLine().'<br>'
        .'<strong>Stack Trace:</strong> <br><pre><code>'.$this->getTraceAsString().'</code></pre></div>';
        return $exception; exit;
    }

    public function getSeverity()
    {
        return $this->levels[$this->severity];
    }
}

/* End of file error_handler.php */
/* Location: ./lib/core/error_handler.php */
