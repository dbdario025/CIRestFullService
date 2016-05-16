<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Costs_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();        
    }
    
    public function get($id = NULL) {
        if(!is_null($id)){
            $query = $this->db->select("*")->from("costs")->where("id", $id)->get();
            if($query->num_rows() == 1){
                return $query->row_array();
            }
            return NULL;
        }
        $query = $this->db->select("*")->from("costs")->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }
            return NULL;
    }
    
    public function save($cost) {
        $this->db->set($this->_setCost($cost))->insert("costs");
        if($this->db->affected_rows() ==1){
            return $this->db->insert_id();
        }
        return NULL;
    }
    
    public function update($id, $cost) {
        $this->db->set(
                $this->_setBook($cost)
                )
                ->where("id",$id)
                ->update("books");
        if($this->db->affected_rows() == 1){
            return TRUE;
        }
        return NULL;        
    }
    
    public function delete($id) {
        $this->db->where("id",$id)->delete("costs");
        if($this->db->affected_rows() == 1){
            return TRUE;
        }
    }
    
    private function _setCost($cost) {
        return array(
            "Cost" => $cost["Cost"],
            "DateCost" => $cost['DateCost']                        
        );
    }
}

