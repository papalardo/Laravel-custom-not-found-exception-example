<?php

namespace App\Custom\CustomModelNotFoundResponse\Settings;

use Illuminate\Support\Facades\View;

class CustomModelNotFoundSettings
{
    private static $_instance = null;

    public static $message;
    
    public static $view = 'errors::404';

    public static $viewData = [];

    public static function getInstance ()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }
    
    public static function setMessage($message) 
    {
        self::$message = $message;
        return self::getInstance();
    }
    
    public static function setView($view, array $viewData = []) 
    {
        self::$view = is_string($view) ? View::make($view, $viewData) : $view;
        return self::getInstance();
    }

    public static function getView()
    {
        $view = self::$view;
        return is_string($view) ? View::make($view) : $view;
    }

    public static function getMessage()
    {
        return self::$message;
    }
}
