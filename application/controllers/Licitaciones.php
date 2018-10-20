<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Licitaciones extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_licitaciones', 'Model_contratos'));

    }

    public function index()
    {
        
        $fecha = date('y-m-d'); 
        $this->valida_licitacion();

        if(!$this->form_validation->run())
        {
            
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_nuevalicitacion', '', TRUE)));
        }
        else
        {
            
           $_SESSION['paneles_registro'] = 'nuevalicitacion';           

           $this->Model_licitaciones->Insertar($this->input->post());
           redirect(base_url('index.php/Registro/registrovalido'));

        }
        
    }

    public function historicolicitaciones()
    {
        $licitaciones = $this->Model_licitaciones->ObtieneLicitaciones();

        $this->load->view("templates/header", array(
            'cuerpo' => $this->load->view('view_historicolicitaciones', array('licitaciones' => $licitaciones), TRUE)
        ));
    }


    public function valida_licitacion()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[20]');
    }

    public function modificarlicitacion($id) 
    {
        $this->valida_licitacion();

        $licitacion = $this->Model_licitaciones->ObtieneLicitacionId($id);

        if ($licitacion == NULL) {
            redirect(site_url());
        }
    
        if(!$this->form_validation->run())
        {

            $licitacion = $this->Model_licitaciones->ObtieneLicitacionId($id);
            
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_editarlicitacion', array('licitacion' => $licitacion), TRUE)));
        }
        else
        {
            
           $_SESSION['paneles_registro'] = 'nuevalicitacion';
           $this->Model_licitaciones->modificar($this->input->post(), $id);

           redirect(base_url('index.php/Registro/registrovalido'));

        }
        

    }

    public function borrarlicitacion($id) 
    {        

        $result = $this->Model_licitaciones->delete($id);

        if ( $result == 1) {

            $licitaciones = $this->Model_licitaciones->ObtieneLicitaciones();

            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_historicolicitaciones', array('licitaciones' => $licitaciones), TRUE)
            ));
        } 
        else {
            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_blank', '', TRUE)
            ));
        }    
    }


    public function registrovalido()
    {

        $this->load->view("templates/header", array(
            'cuerpo'=>$this->load->view('view_exito', '', TRUE)));


    }

}