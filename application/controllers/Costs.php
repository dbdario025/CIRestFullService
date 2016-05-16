<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Costs extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('costs_model');
    }

    public function index_get() {
        $costs = $this->costs_model->get();
        if (!is_null($costs)) {
            $this->response(array("response" => $costs), 200);
        } else {
            $this->response(array("error" => "No existen costos"), 404);
        }
    }

    public function find_get($id) {
        if (!$id) {
            $this->response(NULL, 400);
        }
        $costs = $this->costs_model->get($id);
        if (!is_null($costs)) {
            $this->response(array("response" => $costs), 200);
        } else {
            $this->response(array("error" => "No se encuentra el costo"), 404);
        }
    }

    public function index_post() {
        if (!$this->post("cost")) {
            $this->response(NULL, 400);
        }
        $costId = $this->costs_model->save($this->post("cost"));
        if (!is_null($costId)) {
            $this->response(array("response" => $costId), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error en Costos"), 400);
        }
    }
}
