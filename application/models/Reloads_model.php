<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reloads_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();        
    }
    
    public function get($id = NULL) {
        if(!is_null($id)){
            $query = $this->db->select("*")->from("reloads")->where("id", $id)->get();
            if($query->num_rows() == 1){
                return $query->row_array();
            }
            return NULL;
        }
        $query = $this->db->select("*")->from("reloads")->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }
            return NULL;
    }
    
    public function save($reloads) {
        $this->db->set($this->_setReload($reloads))->insert("reloads");
        if($this->db->affected_rows() ==1){
            return $this->db->insert_id();
        }
        return NULL;
    }
    
    public function update($id, $reloads) {
        $this->db->set(
                $this->_setReload($reloads)
                )
                ->where("id",$id)
                ->update("books");
        if($this->db->affected_rows() == 1){
            return TRUE;
        }
        return NULL;        
    }
    
    private function _setReload($reloads) {
        return array(
            "Value" => $reloads["Value"],
            "TotalSeconds" => $reloads['TotalSeconds'],
            "Mobile" => $reloads['Mobile'],
            "ReloadDate" => $reloads['ReloadDate'],
            "FK_COSTS_ID" => $reloads['FK_COSTS_ID']
        );
    }
}

