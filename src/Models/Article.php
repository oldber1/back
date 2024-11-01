<?php
namespace App\Models;

use App\Database;
use PDO;

class Article {
    public $id;
    public $title;
    public $content;

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save() {
        $db = Database::getInstance()->getConnection();
        if ($this->id) {
            // Update
            $stmt = $db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
            $stmt->execute([$this->title, $this->content, $this->id]);
        } else {
            // Insert
            $stmt = $db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
            $stmt->execute([$this->title, $this->content]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public static function find($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Article');
        return $stmt->fetch();
    }
}
