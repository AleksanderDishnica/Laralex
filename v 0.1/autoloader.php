<?php
/**
 * An example of a project-specific implementation.
 *
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 *
 *      new \Foo\Bar\Baz\Qux;
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {

	// project-specific namespace prefix
	$prefix = '';

	// base directory for the namespace prefix
	$base_dir = __DIR__ . '/app';

	// does the class use the namespace prefix?
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {
		// no, move to the next registered autoloader
		return;
	}

	// get the relative class name
	$relative_class = substr($class, $len);

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = str_replace('\\', '/', $relative_class) . '.php';

	// Check which folder the file is.
	$model = $base_dir . '/Model/' . $file;
	$view = $base_dir . '/View/' . $file;
	$controller = $base_dir . '/Controller/' . $file;

	// if the file exists, require it
	if(file_exists($model))
	{
		require $model;
	}
	else if(file_exists($view))
	{
		require $view;
	}
	else if(file_exists($controller))
	{
		require $controller;
	}
});

Header::View();