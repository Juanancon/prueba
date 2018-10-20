<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contratos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_contratos', 'Model_licitaciones'));
    }

    public function index()
    {
        $fecha = date('y-m-d'); 
        $this->valida_contrato();
        $licitaciones = $this->Model_licitaciones->ObtieneLicitaciones();

        if(!$this->form_validation->run())
        {
            
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_nuevocontrato', array('licitaciones' => $licitaciones), TRUE)));
        }
        else
        {
            
           $_SESSION['paneles_registro'] = 'nuevocontrato';           

           $this->Model_contratos->Insertar($this->input->post());
           redirect(base_url('index.php/Registro/registrovalido'));

        }
    }

    public function modificarcontrato($id) 
    {
        $this->valida_contrato();

        $contrato = $this->Model_contratos->ObtieneContratoId($id);
        $licitaciones = $this->Model_licitaciones->ObtieneLicitaciones();

        if ($contrato == NULL) {
            redirect(site_url());
        }
    
        if(!$this->form_validation->run())
        {

            $contrato = $this->Model_contratos->ObtieneContratoId($id);
            
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_editarcontrato', array('contrato' => $contrato, 
                'licitaciones' => $licitaciones), TRUE)));
        }
        else
        {
            
           $_SESSION['paneles_registro'] = 'nuevocontrato';
           $this->Model_contratos->modificar($this->input->post(), $id);

           redirect(base_url('index.php/Registro/registrovalido'));

        }
        

    }

    public function borrarcontrato($id) 
    {        

        $result = $this->Model_contratos->delete($id);

        if ( $result == 1) {

            $contratos = $this->Model_contratos->ObtieneContratos();

            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_historicocontratos', array('contratos' => $contratos), TRUE)
            ));
        } 
        else {
            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_blank', '', TRUE)
            ));
        }    
    }

    public function historicocontratos()
    {
        $contratos = $this->Model_contratos->ObtieneContratos();

        $this->load->view("templates/header", array(
            'cuerpo' => $this->load->view('view_historicocontratos', array('contratos' => $contratos), TRUE)
        ));
    }

    public function valida_contrato()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[20]');
    }

}