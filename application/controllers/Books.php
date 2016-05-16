<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Books extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('books_model');
    }

    public function index_get() {
        $books = $this->books_model->get();
        if (!is_null($books)) {
            $this->response(array("response" => $books), 200);
        } else {
            $this->response(array("error" => "No hay Libros"), 404);
        }
    }

    public function find_get($id) {
        if (!$id) {
            $this->response(NULL, 400);
        }
        $books = $this->books_model->get($id);
        if (!is_null($books)) {
            $this->response(array("response" => $books), 200);
        } else {
            $this->response(array("error" => "No se encuentra el libro"), 404);
        }
    }

    public function index_post() {
        if (!$this->post("book")) {
            $this->response(NULL, 400);
        }
        $bookId = $this->books_model->save($this->post("book"));
        if (!is_null($bookId)) {
            $this->response(array("response" => $bookId), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error"), 400);
        }
    }

    public function index_put($id) {
        if (!$this->put("book") || !$id) {
            $this->response(NULL, 400);
        }
        $update = $this->books_model->update($id, $this->put("book"));
        if (!is_null($update)) {
            $this->response(array("response" => "Libro actualizado"), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error"), 400);
        }
    }

    public function index_delete($id) {
        if (!$id) {
            $this->response(NULL, 400);
        }
        $delete = $this->books_model->delete($id);
        if (!is_null($delete)){
            $this->response(array("response" => "Libro eliminado"), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error"), 400);
        }
    }

}
