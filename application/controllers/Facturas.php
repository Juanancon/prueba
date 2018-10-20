<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'upload'));
        $this->load->model(array('Model_facturas', 'Model_contratos', 'Model_licitaciones'));
        $this->load->helper('download');
    }

    public function index()
    {
        
        $fecha = date('y-m-d'); 
        $this->valida_factura();
  

        if(($this->input->post('precio') > 1500) && (!$this->input->post('contrato_id'))){
            $this->form_validation->set_rules('licitacion', 'licitacion', 'required', array('required' => 'Para valores de más de €15.000 ha de seleccionar/crear un contrato'));
        }

        if(!$this->form_validation->run())
        {
                        
            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_nuevafactura', '', TRUE)));
        }
        else
        {

            $path = FCPATH.DIRECTORY_SEPARATOR.'uploads';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
    
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 200000;
            
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if ( ! $this->upload->do_upload('adjunto'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $imagename = $data['upload_data']['file_name'];
                    $_POST['adjunto'] = $imagename;           

            }    

           $_SESSION['paneles_registro'] = 'nuevafactura';   

           $this->Model_facturas->Insertar($this->input->post());
           redirect(base_url('index.php/Registro/registrovalido'));

        }
    }

    public function modificarfactura($id) 
    {
        $this->valida_factura();

        $datapost = $this->input->post();

 

        $factura = $this->Model_facturas->ObtieneFacturaId($id);

        if ($factura == NULL) {
            redirect(site_url());
        }
        
        if(($this->input->post('precio') > 1500) && (!$this->input->post('contrato_id'))){
            $this->form_validation->set_rules('licitacion', 'licitacion', 'required', array('required' => 'Para valores de más de €15.000 ha de seleccionar/crear un contrato'));
        }

    
    
        if(!$this->form_validation->run())
        {

            $factura = $this->Model_facturas->ObtieneFacturaId($id);

            $this->load->view("templates/header", array(
                'cuerpo'=>$this->load->view('view_editarfactura', array('factura' => $factura), TRUE)));
        }
        else
        {   
            if(isset($datapost['adjunto'])){
                unset($datapost['adjunto']);
            }        



            $path = FCPATH.DIRECTORY_SEPARATOR.'uploads';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
    
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 20000;
            
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if ( !$this->upload->do_upload('adjunto'))
            {
                $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $imagename = $data['upload_data']['file_name'];
                    $datapost['adjunto'] = $imagename;

                    
    
            }

           $_SESSION['paneles_registro'] = 'nuevocontrato';
           $this->Model_facturas->modificar($datapost, $id);

           redirect(base_url('index.php/Registro/registrovalido'));

        }
        

    }

    public function borrarfactura($id) 
    {        

        $result = $this->Model_facturas->delete($id);

        if ( $result == 1) {

            $facturas = $this->Model_facturas->ObtieneFacturas();

            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_historicofacturas', array('facturas' => $facturas), TRUE)
            ));
        } 
        else {
            $this->load->view("templates/header", array(
                'cuerpo' => $this->load->view('view_blank', '', TRUE)
            ));
        }    
    }

    public function historicofacturas()
    {
        $facturas = $this->Model_facturas->ObtieneFacturas();

        $this->load->view("templates/header", array(
            'cuerpo' => $this->load->view('view_historicofacturas', array('facturas' => $facturas), TRUE)
        ));
    }

    public function facturavalida()
    {

        $this->load->view("templates/header", array(
            'cuerpo'=>$this->load->view('view_exito', '', TRUE)));


    }

    public function valida_factura()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[20]');
        $this->form_validation->set_rules('precio', 'precio', 'required|integer');

    }


    public function licitacionesjson()
    {
        $licitaciones = $this->Model_licitaciones->ObtieneLicitaciones();
        header('Content-Type: application/json');
        echo json_encode( $licitaciones );
    }

    public function contratosjson($licitacion_id)
    {
        $contratos = $this->Model_contratos->ObtieneContratoLicitacionId($licitacion_id);
        header('Content-Type: application/json');
        echo json_encode( $contratos );
    }

    public function contratojson($licitacion_id)
    {
        $contratos = $this->Model_contratos->ObtieneContratoId($licitacion_id);
        header('Content-Type: application/json');
        echo json_encode( $contratos );
    }     
       

}