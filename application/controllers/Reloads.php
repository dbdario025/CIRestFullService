<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Reloads extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reloads_model');
    }

    public function index_get() {
        $reloads = $this->reloads_model->get();
        if (!is_null($reloads)) {
            $this->response(array("response" => $reloads), 200);
        } else {
            $this->response(array("error" => "No existen Recargas"), 404);
        }
    }

    public function find_get($id) {
        if (!$id) {
            $this->response(NULL, 400);
        }
        $reloads = $this->reloads_model->get($id);
        if (!is_null($reloads)) {
            $this->response(array("response" => $reloads), 200);
        } else {
            $this->response(array("error" => "No se encuentra la recarga indicada"), 404);
        }
    }

    public function index_post() {
        if (!$this->post("reload")) {
            $this->response(NULL, 400);
        }
        $reloadId = $this->reloads_model->save($this->post("reload"));
        if (!is_null($reloadId)) {
            $this->response(array("response" => $reloadId), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error en Recargas"), 400);
        }
    }
}
