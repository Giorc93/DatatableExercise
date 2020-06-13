<?php

header('Content-Type: application/json');

require_once('libs/database.php');

class Data
{

    public function __construct()
    {
        $this->db = new Database();
        $this->data = [];
    }

    public function getArticles()
    {
        try {
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare('SELECT * FROM articles;');
            $stmt->execute();
            $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->data;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    public function addArticles()
    {
        try {
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare('INSERT INTO articles VALUES (null, :descpt, :price);');
            $stmt->execute(['descpt' => $_POST['description'], 'price' => $_POST['price']]);

            return true;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    public function delArticle()
    {
        try {
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare('DELETE FROM articles WHERE code = :code;');
            $stmt->execute(['code' => $_GET['code']]);

            return true;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    public function getArticle()
    {
        try {
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare('SELECT * FROM articles WHERE code = :code;');
            $stmt->execute(['code' => $_GET['code']]);
            $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->data;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    public function modArticle()
    {
        try {
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare('UPDATE articles SET description = :descpt, price = :price WHERE code = :code;');
            $stmt->execute(['descpt' => $_POST['description'], 'price' => $_POST['price'], 'code' => $_GET['code']]);

            return true;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }
}

$data = new Data();

switch ($_GET['action']) {
    case 'list':
        $articles = $data->getArticles();
        echo json_encode($articles);
        break;
    case 'add':
        $articles = $data->addArticles();
        echo json_encode($articles);
        break;
    case 'del':
        $articles = $data->delArticle();
        echo json_encode($articles);
        break;
    case 'get':
        $articles = $data->getArticle();
        echo json_encode($articles);
        break;
    case 'mod':
        $articles = $data->modArticle();
        echo json_encode($articles);
        break;
}
