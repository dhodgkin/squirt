<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Squirt
 *
 * A PHP MVC Framework built for personal and commercial use.
 *
 * @package     Squirt
 * @author      Damien Hodgkin
 * @copyright   Copyright (c) 2011, Damien Hodgkin
 * @link        http://www.joshmanders.com
 * @link        http://www.pronemedia.com
 * @since       Version 1.0
 */

/*-- Code backup --
   $severity_class = lcfirst($severity);    
   $file = basename($filepath);
       
   echo '<div class="'.$severity_class.'"><pre><code>';
   echo '<strong>'.$severity.'</strong>: '.$message;
   echo "<br>    around line #".$line." in ".$file;
   echo '</code></pre></div>';
-- End code backup --*/

// ------------------------------------------------------------------------

class ErrorHandler extends Exception {
  protected $severity;
  
  public function __construct($message, $code, $severity, $filename, $lineno) {
    $this->message = $message;
    $this->code = $code;
    $this->severity = $severity;
    $this->file = $filename;
    $this->line = $lineno;
  }
  
  public function getSeverity() {
    return $this->severity;
  }
  
  public function squirt_error_handler($severity, $message, $filepath, $line) {
    $levels = array(E_ERROR	=> 'Error',
                    E_WARNING => 'Warning',
                    E_PARSE	=> 'Parsing Error',
                    E_NOTICE => 'Notice',
                    E_CORE_ERROR => 'Core Error',
                    E_CORE_WARNING => 'Core Warning',
                    E_COMPILE_ERROR => 'Compile Error',
                    E_COMPILE_WARNING => 'Compile Warning',
                    E_USER_ERROR => 'User Error',
                    E_USER_WARNING => 'User Warning',
                    E_USER_NOTICE => 'User Notice',
                    E_STRICT => 'Runtime Notice');
                      
    if ($severity == E_STRICT) {
      return;
    }

    if (($severity & error_reporting()) == $severity) {
      $this->show_php_error($levels[$severity], $message, $filepath, $line);
    }
  }

  public function show_php_error($severity, $message, $filepath, $line) {
    echo '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">';
    echo '<h4>A PHP Error was encountered</h4>';
    echo '<p>Severity: '.$severity.'</p>';
    echo '<p>Message:  '.$message.'</p>';
    echo '<p>Filename: '.$filepath.'</p>';
    echo '<p>Line Number: '.$line.'</p>';
    echo '</div>';
    exit;
  }
}
?>
