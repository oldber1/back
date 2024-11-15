<?php

namespace Core;

class View
{
    public static function render(string $view, array $params = [])
    {
        extract($params);
        ob_start();
        include __DIR__ . "/../views/{$view}.php";
        return ob_get_clean();
    }
}
