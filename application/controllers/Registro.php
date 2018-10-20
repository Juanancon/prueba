<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_usuarios'));
    }

    public function index()
    {
        $this->valida_usuarios();

        if(!$this->form_validation->run())
        {

            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_registro', '', TRUE)));

        }
        else
        {

            $_SESSION['paneles_registro'] = 'registrado';
            $this->Model_usuarios->Insertar($this->input->post());
            redirect(base_url('index.php/Registro/registrovalido'));

        }

    }

    public function registrovalido()
    {


        $this->load->view("templates/header", array(
            'cuerpo'=>$this->load->view('view_exito', '', TRUE)));


    }


    /*
  Reglas para la validación y modificación del registro de personas
 */
    public function valida_usuarios()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('usuario', 'usuario', 'required|max_length[20]');
        $this->form_validation->set_rules('password', 'password', 'required|max_length[20]');

    }

}