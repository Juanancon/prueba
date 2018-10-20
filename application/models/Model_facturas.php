<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_facturas extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ObtieneFacturas(){
        $query = $this->db->get('factura');
        return $query->result_array();
    }

    public function ObtieneFacturaId($id)
    {
        $query = $this->db->get_where('factura', "id = $id");
        return $query->row_array();
    }


    public function Insertar($datos){

        $datos['fecha'] = date('Y-m-d');

        $this->db->insert('factura', $datos);
    }

    public function delete($id) {

        $this->db->where("id", $id);
        $this->db->delete("factura");
        return $this->db->affected_rows();

    }

    public function modificar($datos, $id) {

        $this->db->where('id', $id);
        $this->db->update('factura', $datos);

    }


}