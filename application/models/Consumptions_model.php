<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consumptions_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();        
    }
    
    public function get($id = NULL) {
        if(!is_null($id)){
            $query = $this->db->select("*")->from("consumptions")->where("id", $id)->get();
            if($query->num_rows() == 1){
                return $query->row_array();
            }
            return NULL;
        }
        $query = $this->db->select("*")->from("consumptions")->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }
            return NULL;
    }
    
    public function save($consumption) {
        $this->db->set($this->_setConsumption($consumption))->insert("consumptions");
        if($this->db->affected_rows() ==1){
            return $this->db->insert_id();
        }
        return NULL;
    }
    
    public function update($id, $consumption) {
        $this->db->set(
                $this->_setConsumption($consumption)
                )
                ->where("id",$id)
                ->update("consumptions");
        if($this->db->affected_rows() == 1){
            return TRUE;
        }
        return NULL;        
    }
   
    private function _setConsumption($consumption) {
        return array(
            "Seconds" => $consumption["Seconds"],
            "ConsumptionDate" => $consumption['ConsumptionDate']
        );
    }
}

