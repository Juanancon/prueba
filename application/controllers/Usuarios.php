<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_usuarios'));
    }


    public function index()
    {
        $config['base_url'] = site_url('Usuarios/index');

        $this->load->view("templates/header", array(
            'cuerpo'=>$this->load->view('view_blank', '', TRUE)));
    }


    public function login()
    {
        $this->valida_login();

        if($this->Model_usuarios->EstaDentro())
        {
            redirect(base_url());
        }

        if(!$this->form_validation->run())
        {
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_login', '', TRUE)));
        }

        else

        {
            $loginOK = $this->Model_usuarios->LoginOK($this->input->post('usuario'), $this->input->post('password'));

            if ($loginOK)
            {
                $datos = $this->Model_usuarios->DatosUsuario($this->input->post('usuario'), $this->input->post('password'));

                /*
                * Establecemos los parámetros de la sesión
                */
                $datos_sesion = array(
                    'usuario' => $datos['usuario'],
                    'id' => $datos['id'],
                    'password' => $datos['password']);

                /*
                * Inicializamos los datos de la sesión para usarlos donde sean necesarios
                */
                $this->session->set_userdata($datos_sesion);

                redirect(base_url());
            }
            else
            {

                $this->load->view("templates/header", array('cuerpo'=>$this->load->view('view_login',
                    array('',
                        'error' => 'El usuario o el login es incorrecto'), TRUE)));
            }
        }

    }

    public function CerrarSesion()
    {
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('id');
        redirect(base_url());
    }

    public function valida_login()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

}