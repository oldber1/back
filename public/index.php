<?php
require '../vendor/autoload.php';

use App\Controllers\ArticleController;

$uri = trim($_SERVER['REQUEST_URI'], '/');
$controller = new ArticleController();

switch ($uri) {
    case 'articles':
        $controller->index();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
