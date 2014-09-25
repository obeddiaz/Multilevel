<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        $this->load->model('menu_model');
    }
	public function index()
	{
        if($this->session->userdata('perfil') == FALSE)
            {
                $data['menu']=  $this->menu_model->conseguir_menu();
                $data['titulo']= 'Inicio BAGS';
                $data['titulo_pagina']= 'Inicio';
                $this->load->view('header',$data);
                $this->load->view('index');
                $this->load->view('footer');
            }
            else{
                $data['menu']=  $this->menu_model->conseguir_menu();
                $data['titulo']= 'Inico BAGS';
                $data['titulo_pagina']='Inicio';
                $this->load->view('header',$data);
                $this->load->view('index',$data);
                $this->load->view('footer');
            }
	}
        public function Inicio()
	{
            $data['menu']=  $this->menu_model->conseguir_menu();
        if($this->session->userdata('perfil') == FALSE)
            {
                $data['titulo']= 'Inicio BAGS';
                $data['titulo_pagina']='Inicio';
                $this->load->view('header',$data);
                $this->load->view('index');
                $this->load->view('footer');
            }
            else{
                $data['titulo']= 'Inicio BAGS';
                $data['titulo_pagina']='Inicio';
                $this->load->view('header',$data);
                $this->load->view('index');
                $this->load->view('footer');
            }
	}
        function Mision()
	{
            $data['menu']=  $this->menu_model->conseguir_menu();
            $data['titulo']= 'Misión BAGS';
            $data['titulo_pagina']='Misión';
            $this->load->view('header',$data);
            $this->load->view('mision');
            $this->load->view('footer');
	}
        function Vision()
	{
            $data['menu']=  $this->menu_model->conseguir_menu();
            $data['titulo']= 'Visión BAGS';
            $data['titulo_pagina']='Visión';
            $this->load->view('header',$data);
            $this->load->view('vision');
            $this->load->view('footer');
	}
        public function Plan_de_Compensacion()
	{
            $data['menu']=  $this->menu_model->conseguir_menu();
            $data['titulo_pagina']='Plan de Compensación';
            $data['titulo']= 'Plan de Compensación BAGS';
            $this->load->view('header',$data);
            $this->load->view('plan');
            $this->load->view('footer');
	}
        public function Contacto()
	{
            $data['menu']=  $this->menu_model->conseguir_menu();
            $data['titulo_pagina']='Contacto';
            $data['titulo']= 'Contacto BAGS';
            $this->load->view('header',$data);
            $this->load->view('contacto');
            $this->load->view('footer');
        }   
        public function Productos()
	{
            $this->load->model('imagen_producto_model');
            $data['menu']=  $this->menu_model->conseguir_menu();
            $data['titulo_pagina']='Productos';
            $data['titulo']= 'Productos BAGS';  
            $data1['productos']=$this->imagen_producto_model->conseguir();
            $this->load->view('header',$data);
            $this->load->view('productos_view',$data1);
            $this->load->view('footer');
        }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */