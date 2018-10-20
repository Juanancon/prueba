<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Insertar($datos){
        $datos['password'] = sha1($datos['password']);
        $this->db->insert('usuario', $datos);
    }

    public function LoginOK($usuario, $password)
    {
        return $this->DatosUsuario($usuario, $password);
    }

    public function DatosUsuario($usuario, $password)
    {
        $query = $this->db->get_where('usuario', array('usuario' => $usuario, 'password' => sha1($password)));
        return $query->row_array();
    }

    public function EstaDentro()
    {
        return ($this->session->dentro);
    }

}