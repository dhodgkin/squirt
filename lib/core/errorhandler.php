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
    $this->message  = $message;
    $this->code     = $code;
    $this->severity = $severity;
    $this->file     = $filename;
    $this->line     = $lineno;
  }
  
  public function getSeverity() {
    return $this->severity;
  }
  
  public function showException() {
    return '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">'
      .'<h4>A PHP Error was encountered</h4>'
      .'Severity: '.$this->getSeverity().'<br>'
      .'Message: '.$this->getMessage().'<br>'
      .'Filename: '.$this->getFile().'<br>'
      .'Line Number: '.$this->getLine().'<br>'
      .'<pre>Stack Trace: <br>'.$this->getTraceAsString().'</pre></div>';
    exit;
  }
}
// END ErrorHandler Class

/* End of file errorhandler.php */
/* Location: ./lib/core/errorhandler.php */
