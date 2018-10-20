<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contratos extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ObtieneContratos(){
        $query = $this->db->get('contrato');
        return $query->result_array();
    }

    public function ObtieneContratoId($id)
    {
        $query = $this->db->get_where('contrato', "id = $id");
        return $query->row_array();
    }

    public function ObtieneContratoLicitacionId($licitacion_id)
    {
        $query = $this->db->get_where('contrato', "licitacion_id = $licitacion_id");
        return $query->result_array();
    }


    public function Insertar($datos){

        $datos['fecha'] = date('Y-m-d');

        $this->db->insert('contrato', $datos);
    }

    public function delete($id) {
        $query = "select id from contrato where id = '{$id}' LIMIT 1";
        $procat=$this->db->query($query);
        $result = $procat->row_array();
        if($result == null) {            
            $this->db->where("id", $id);
            $this->db->delete("contrato");
            return $this->db->affected_rows();
        }
        else{
            return;
        }
    }

    public function modificar($datos, $id) {       

        $this->db->where('id', $id);
        $this->db->update('contrato', $datos);

    }




}