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

class router
{
	private $routes = array();
	private $shortcuts = array(':any' => '.+',
	                           ':num' => '[0-9]+',
	                           'nonum' => '[^0-9]+',
	                           ':alpha' => '[A-Za-z]+',
	                           ':alnum' => 'A-Za-z0-9]+',
	                           ':hex' => '[A-Fa-f0-9]+');

	public function register($src, $dest = NULL)
	{
		if (is_array($src))
		{
			foreach ($src as $key => $val)
			{
				$this->routes[$key] = $val;
			}
		}
		elseif ($dest)
		{
			$this->routes[$src] = $dest;
		}
	}

	public function route($uri)
	{
	    $uri = implode('/', $uri);
		if (isset($this->routes[$uri]))
		{
			return $this->routes[$uri];
		}
		foreach ($this->routes as $key => $value)
		{
			foreach ($this->shortcuts as $find => $replace)
			{
			    $key = str_replace($find, $replace, $key);
			}
			if (preg_match('#^'.$key.'$#', $uri))
			{
				if (strpos($val, '$') !== FALSE && strpos($key, '(') !== FALSE)
				{
					$val = preg_replace('#^'.$key.'$#', $value, $uri);
				}
				return explode('/', $value);
			}
		}
		return explode('/', $uri);
	}
}

/* End of file router.php */
/* Location: ./lib/core/router.php */
