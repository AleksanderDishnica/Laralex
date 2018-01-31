<?php
    spl_autoload_register(function ($class) {

        // project-specific namespace prefix
        $prefix = '';

        // base directory for the namespace prefix
        $base_dir_controller = __DIR__ . '/app/Controller/';
        $base_dir_model = __DIR__ . '/app/Model/';
        $base_dir_view = __DIR__ . '/app/View/';

        $base_dir_components = __DIR__ . '/app/Controller/Components/';

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
        $controller = $base_dir_controller . str_replace('\\', '/', $relative_class) . '.php';

        $model = $base_dir_model . str_replace('\\', '/', $relative_class) . '.php';

        $view = $base_dir_view . str_replace('\\', '/', $relative_class) . '.php';

        $components = $base_dir_components . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($controller)) {
            require $controller;
        }
        else if(file_exists($model)){
            require $model;
        }
        else if(file_exists($view)){
            require $view;
        }
        else if(file_exists($components)){
            require $components;
        }
    });