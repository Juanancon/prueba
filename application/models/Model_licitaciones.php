<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_licitaciones extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ObtieneLicitaciones(){
        $query = $this->db->get('licitacion');
        return $query->result_array();
    }
    

    // Esta función la voy a usar cuando inserte los pedidos en la base de datos
    public function ObtieneLicitacionId($id)
    {
        $query = $this->db->get_where('licitacion', "id = $id");
        return $query->row_array();
    }

    public function Insertar($datos){

        $datos['fecha'] = date('Y-m-d');

        $this->db->insert('licitacion', $datos);
    }

    public function modificar($datos, $id) {

        $this->db->where('id', $id);
        $this->db->update('licitacion', $datos);

    }

    public function delete($id) {


        $query = "select licitacion_id from contrato where licitacion_id = '{$id}' LIMIT 1";
        $procat=$this->db->query($query);
        $result = $procat->row_array();
        if($result == null) {
            $this->db->where("id", $id);
            $this->db->delete("licitacion");
            return $this->db->affected_rows();
        }
        else{
            return;
        }

    }







}