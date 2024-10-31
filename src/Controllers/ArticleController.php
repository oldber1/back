<?php
namespace App\Controllers;

use App\Models\Article;

class ArticleController {
    public function index() {
        $articles = Article::getAll();
        require_once '../views/articles/index.php';
    }
}
