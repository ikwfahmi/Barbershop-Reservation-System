<?php

spl_autoload_register(function ($class_name) {
    $folders = ['src', 'config'];
    foreach ($folders as $folder) {
        $file = $folder . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});