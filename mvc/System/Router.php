<?php
namespace myMvc\System;

use Exception;

class Router {

	private static $routes;
	private static $urls;
	private static $parents;

	private static $Controller;
	private static $method;
	private static $usedSections = array();

	/**
	 * Load routes
	 * @param  [type] $sMethod   [description]
	 * @param  [type] $sRoute    [description]
	 * @param  [type] $fnClosure [description]
	 * @param  [type] $view [description]
	 * @return [type]            [description]
	 */
	public static function route ($httpMethod, $url, $execute, $name = null) {

		$route = array (
			'method' 	=> $httpMethod,
			'url'		=> $url,
			'execute'	=> $execute
		);

		self::$routes[] = $route;
		

		if (isset($name)) {
			self::$urls[$name] = $url;
		}

		//unset(self::$parents[$url]);

	}

	/**
	 * Add content to general sections
	 * @param  [type] $url     [description]
	 * @param  [type] $execute [description]
	 * @return [type]          [description]
	 */
	public static function layout ($url, $execute) {
		//if (!isset(self::$parents[$url])) {
			self::$parents[$url] = $execute;
		//}
	}

	/**
	 * Get the url for a named route
	 * @param  [type] $routeName [description]
	 * @param  [type] $params    [description]
	 * @return [type]            [description]
	 */
	public static function url ($route, $params = null) {
		
		
		if (!isset(self::$urls[$route])) {
			return null;
		}

		# Get url from stored routes
		$url = self::$urls[$route];

		# Replace the params
		if (isset($params)) {
			foreach ($params as $key => $value) {
				$parsed['/:' . $key] = '/' . $value;
			}
		} else {
			$parsed = array();
		}

		# Return the url
		return WEB_ROOT . str_replace(array_keys($parsed), $parsed, $url);
	}

	/**
	 * Redirect to a named route
	 * @param  [type] $route  [description]
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public static function redirect ($route, $params = null) {
		header('location: ' . self::url($route, $params));
		exit;
	}

	/**
	 * Execute current route's closure
	 * @return [type] [description]
	 */
	public static function execute () {

		# Get URI and Request Method
		$pathInfo	= isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;

		$reqUrl 	= rtrim($pathInfo, '/');
		$reqMethod	= strtolower($_SERVER['REQUEST_METHOD']);

		/*
		 * Try to load a route file from the App/Routes folder
		 * If you want to load a file save it with tha name as the
		 * first part of the route (/users/something = users.php)
		 */
		# Set path to routes
		$includepath = get_include_path() . '/App/Routes/';

		# Get the route name from the first part of the URL
		# Also filter the route name for security
		$parts 	= array_filter(explode('/', $reqUrl));
		$routeName = preg_replace('/[^a-z]/i', '', array_shift($parts));

		# Set a filename
		$file 	= $includepath . $routeName . '.php';

		# Does the file exist?
		if (file_exists($file)) {
			require_once($file);
		}

		/*
		 * Parse the loaded routes.
		 * Routes can be loaded from files in App/Routes/<first_part_of_route>.php
		 * or by defining them in Public/index.php
		 */
		# Are there any routes loaded?
		if (empty(self::$routes)) {
			throw new Exception('No routes defined.');
		}

		# Find the correct route and execute the closure function
		foreach (self::$routes as $route) {
			
			# Convert urls like '/user/:uid/posts/:pid' to regular expression      
			$pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote(rtrim($route['url'], '/'))) . "$@D";
			$matches = array();
			preg_match($pattern, $reqUrl, $matches);

			# Find the route
			if($reqMethod == $route['method'] && preg_match($pattern, $reqUrl, $matches)) {
			
				
				# Trim first empty match
				array_shift($matches);

				# Allways use an array, string input possible
				$routeExec = $route['execute'];

				switch (true) {

					# If the command is a single string
					# Router::route('get','/users/:id', 'UserController::index', 'showUser');
					# Str Controller::method
					case is_string($routeExec) :

						self::execString($routeExec, $matches);

						break;

					# If the command is an indexed array 
					# Router::route('get','/users/:id', ['UserController::show', 'user/show.php', 'user'], 'showUser');
					# array ( Str Controller [, Str View [, Str Data]] )
					case is_array ($routeExec) && !array_key_exists('sections', $routeExec):
						
						self::execArray($routeExec, $matches);

						break;

					# If sections are set in the execute command
					# Router::route('get','/user/:id', [
					# 	'title' => 'Gebruiker',
					# 	'sections' => [
					# 		'maincontent' => ['UserController::show', 'user/show.php']
					# 	]
					# ], 'showUser');
					case is_array($routeExec) && array_key_exists('sections', $routeExec) :

						self::execSections($routeExec['sections'], $matches);

						break;

					

					# If the command is a callback function
					# Router::route('get','/users/:id' function ($id) {
					# 	$Controller = new UserController();
					# 	$user = $Controller->Model->select($id);
					# 	$Controller->section('maincontent')->view('user/show.php')->title('Show user')->display(compact('user'));
					# }, 'getUser');
					case is_callable($routeExec) :

						self::execCallable($routeExec, $matches);

						break;

					default:

						throw new Exception('Invalid route command.');
				}

				break;
			}
		}

		# Find a parent route
		if (is_array(self::$parents)) {
			foreach (self::$parents as $route => $execute) {

				if (strpos($reqUrl, $route) === 0) {

					foreach ($execute['sections'] as $section => $view) {
						if (!in_array($section, self::$usedSections)) {									
							self::parseSection($section, $view);							
						}	
					}
				} 
			}
		}
	}

	/**
	 * Execute a single string
	 * @param  [type] $command [description]
	 * @param  [type] $matches [description]
	 * @return [type]          [description]
	 */
	private static function execString ($command, $matches = array()) {
		self::execArray (array($command), $matches);
	}
	
	/**
	 * Execute an indexed array
	 * @param  [type] $command [description]
	 * @param  array  $matches [description]
	 * @return [type]          [description]
	 */
	private static function execArray ($command, $matches = array()) {
		# No sections just [Controller::method, view, dataKey]
		self::execCommand ($command, $matches);
	}
	
	/**
	 * Parse and execute an array with sections
	 * @param  [type] $sections [description]
	 * @param  array  $matches  [description]
	 * @return [type]           [description]
	 */
	private static function execSections ($sections, $matches = array()) {
		foreach ($sections as $section => $command) {
			self::parseSection($section, $command, $matches);
		}
	}

	/**
	 * Parse and excute a single section
	 * @param  [type] $section [description]
	 * @param  [type] $command [description]
	 * @param  array  $matches [description]
	 * @return [type]          [description]
	 */
	private static function parseSection ($section, $command, $matches = array()) {
		self::$usedSections[] = $section;
		$controller = isset($command['controller']) ? $command['controller'] : $command;
		$title = isset($command['title']) ? $command['title'] : null;
		self::execCommand ($controller, $matches, $section, $title);
	}	

	/**
	 * Execute a closure
	 * @param  [type] $function [description]
	 * @param  array  $matches  [description]
	 * @return [type]           [description]
	 */
	private static function execCallable ($function, $matches = array()) {
		return call_user_func_array($function, $matches);
	}

	/**
	 * Final command execution
	 * @param  [type] $command   [description]
	 * @param  [type] $arguments [description]
	 * @param  [type] $title     [description]
	 * @return [type]            [description]
	 */
	private static function execCommand (array $command, $arguments, $section = null, $title = null) {

		$controller = $command[0];
		$view		= isset($command[1]) ? $command[1] : null;
		$dataKey	= isset($command[2]) ? $command[2] : null;

		$Controller = self::newController($controller);
		$method 	= self::getMethodName($controller);
		
		if (!method_exists($Controller, $method)) {
			 throw new Exception("Router: Method '$controller()' does not exist");
		}

		if (isset($section)) {
			$Controller->section($section);
		}

		if (isset($title)) {
			$Controller->title($title);
		}

		if (isset($view)) {
			$Controller->view($view);	
		}
		
		if (isset($dataKey)) {
			$Controller->keyname($dataKey);
		}

		call_user_func_array(array($Controller, $method), $arguments);
	}

	/**
	 * Extract and initialize the controller
	 * @param  [type] $controller [description]
	 * @return [type]             [description]
	 */
	private static function newController ($controller) {
		$parts 	= explode('::',	$controller);
		$controllerName = 'myMvc\\App\\Controllers\\' . $parts[0];
		return new $controllerName();
	}

	/**
	 * Extract the method name
	 * @param  [type] $controller [description]
	 * @return [type]             [description]
	 */
	private static function getMethodName ($controller) {
		$parts 	= explode('::',	$controller);
		$methodName = $parts[1];
		return $methodName;
	}		
}