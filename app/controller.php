<?php

class Controller {
    
    public $model;
    public $view;

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->view = new View;
        $this->model = new Model;
    }

    /**
     * Выводит index
     */
    public function index() {
        $data = $this->model->getPosts();
        $this->view->render([
            'posts' => $data,
            'pagination' => $this->view->pagination($this->model->totalRecords)
        ]);
    }

    /**
     * Добавление поста
     */
    public function add() {
        $data = $this->model->addPost();
        $this->view->render($data, 'form');
    }

    /**
     * Изменение сортировки
     */
    public function sort() {
        $sortBy = $_SESSION['sortBy'] ?? 'time';
    }
}