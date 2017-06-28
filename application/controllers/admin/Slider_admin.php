<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_admin extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('app/Slider_model');

		if(!isset($_SESSION['user']) || !$_SESSION['status'])
		{
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}
	}

	public function index(){
		$pagina = "slider";
		$slides = $this->Slider_model->get_listado();

		$data = array(
			'pagina' => $pagina,
			'slides' => $slides
		);

		$this->load->view('admin/templates/head_admin',$data);
 		$this->load->view('admin/admin_slider',$data);
		$this->load->view('admin/templates/footer_admin');
	}


    public function do_upload($imagen){
            $config['upload_path']          = FCPATH.'/uploads/archivos/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload($imagen)){
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    exit;
            }
            else{
                    $data = array('upload_data' => $this->upload->data());
            }
    }

	public function guardar(){

		/*
		$this->do_upload("archivo1");
		$this->do_upload("archivo2");
		*/


		$slide_titulo = $this->input->post('slide_titulo');
		$slide_subtitulo = $this->input->post('slide_subtitulo');
		$slide_imagen_escritorio = $this->input->post('slide_imagen_escritorio');
		$slide_imagen_mobile = $this->input->post('slide_imagen_mobile');
		$video_link = $this->input->post('video_link');

		$idioma = $this->input->post('idioma');
		if(!$idioma){
			$idioma = "";
		}
		

		$data = array(
			'id_idioma' => $idioma, 
			'titulo' => $slide_titulo,
			'subtitulo' => $slide_subtitulo,
			'imagen' => str_replace(base_url(), "", $slide_imagen_escritorio),
			'imagen_mobile' => str_replace(base_url(), "", $slide_imagen_mobile),
			'video' => $video_link
		);



		$id = $this->input->post('id');

		if($id){
			$slide = $this->Slider_model->editar_slide($data, $id);
		}
		else{
			$slide = $this->Slider_model->crear_slide($data);
		}



		
		redirect(base_url('admin/slider'));
		
	}



	public function editar($id_proyecto){
		
		$pagina = "slide_editar";
		$slide = $this->Slider_model->get_info($id_proyecto);

		$data = array(
			'pagina' => $pagina,
			'slides' => $slide,
			
		);

		$this->load->view('admin/templates/head_admin',$data);
 		$this->load->view('admin/editar_slide',$data);
		$this->load->view('admin/templates/footer_admin');
		
	}





	public function crear(){
		
		$pagina = "slider_crear";

		$data = array(
			'pagina' => $pagina
		);
		

		$this->load->view('admin/templates/head_admin',$data);
 		$this->load->view('admin/editar_slide',$data);
		$this->load->view('admin/templates/footer_admin');
		
	}



	public function borrar($id){
	}




	public function reordena(){
		$orden = $this->input->post('orden');
		$this->Slider_model->reordena(json_decode($orden));
	}


	public function activar(){
		$id_slide = $this->input->post('id_slide');
		$slide = $this->Slider_model->activa_slide($id_slide);
	}


	public function desactivar(){
		$id_slide = $this->input->post('id_slide');
		$slide = $this->Slider_model->desactiva_slide($id_slide);
	}

}