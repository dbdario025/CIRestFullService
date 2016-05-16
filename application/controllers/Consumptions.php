<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Consumptions extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('consumptions_model');
    }

    public function index_get() {
        $consumptions = $this->consumptions_model->get();
        if (!is_null($consumptions)) {
            $this->response(array("response" => $consumptions), 200);
        } else {
            $this->response(array("error" => "No existen Consumos"), 404);
        }
    }

    public function find_get($id) {
        if (!$id) {
            $this->response(NULL, 400);
        }
        $consumptions = $this->consumptions_model->get($id);
        if (!is_null($consumptions)) {
            $this->response(array("response" => $consumptions), 200);
        } else {
            $this->response(array("error" => "No se encuentra el Consumo"), 404);
        }
    }

    public function index_post() {
        if (!$this->post("consumption")) {
            $this->response(NULL, 400);
        }
        $consumptionId = $this->consumptions_model->save($this->post("consumption"));
        if (!is_null($consumptionId)) {
            $this->response(array("response" => $consumptionId), 200);
        } else {
            $this->response(array("error" => "Ha ocurrido un error en Consumos"), 400);
        }
    }


}
