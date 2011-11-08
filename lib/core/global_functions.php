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

function __autoload($class)
{
    $class = strtolower($class);
    $core = BASEPATH.'/core/';
    $libraries = BASEPATH.'/libraries/';
    $controllers = APPPATH.'/controllers/';
    if (file_exists($core.$class.'.php'))
    {
        include $core.$class.'.php';
    }
    elseif (file_exists($libraries.$class.'.php'))
    {
        include $libraries.$class.'.php';
    }
    elseif (file_exists($controllers.$class.'.php'))
    {
        include $controllers.$class.'.php';
    }
    else
    {
        show_error('Class (<strong>'.$class.'</strong>) does not exist.');
    }
}

function is_php($version = '5.0.0')
{
    static $is_php;
    $version = (string)$version;

    if (!isset($is_php[$version]))
    {
        $is_php[$version] = (version_compare(PHP_VERSION, $version) < 0) ? FALSE : TRUE;
    }
    return $is_php[$version];
}

// added 11/7/11 by Damien Hodgkin.
function squirt_exception_handler($severity, $message, $filename, $lineno) {
  if ($severity == E_STRICT) {
    return;
  }
  if (($severity & error_reporting()) == $severity) {
    throw new ErrorHandler($message, 0, $severity, $filename, $lineno);
  }
}

  function squirt_error_handler($severity, $message, $filepath, $line) {
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

  function show_php_error($severity, $message, $filepath, $line) {
#    $severity_class = lcfirst($severity);    
#    $file = basename($filepath);
#       
#    echo '<div class="'.$severity_class.'"><pre><code>';
#    echo '<strong>'.$severity.'</strong>: '.$message;
#    echo "<br>    around line #".$line." in ".$file;
#    echo '</code></pre></div>';
    echo '<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">';
    echo '<h4>A PHP Error was encountered</h4>';
    echo '<p>Severity: '.$severity.'</p>';
    echo '<p>Message:  '.$message.'</p>';
    echo '<p>Filename: '.$filepath.'</p>';
    echo '<p>Line Number: '.$line.'</p>';
    echo '</div>';
    exit;
  }


function show_error($message)
{
        echo $message.'<br >';
        exit;
}

function get_path()
{
    $uri = $_SERVER['REQUEST_URI'];
    $path = explode('/', $uri);
    array_shift($path);
    foreach($path as $key => $val)
    {
        if(strstr($val, '?'))
        {
            $xpval = explode('?', $val);
            $val = $xpval[0];
        }
        $new_path[$key + 1] = $val;
    }
    return $new_path;
}


/* End of file global_functions.php */
/* Location: ./lib/core/global_functions.php */
