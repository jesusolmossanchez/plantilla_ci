<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function get_listado() {
	    $this->db->select('*');
		$this->db->from('slider');
		$this->db->order_by("slider.orden", "asc");
		
		$query = $this->db->get();
	    $slides = $query->result();
	    return $slides;
    }

	public function get_info($id) {

	    $this->db->select('slider_idiomas.*');
		$this->db->from('slider_idiomas');
		$this->db->join('slider', 'slider_idiomas.id_slider = slider.id');
		$this->db->where('slider.id', $id);
		

		$query = $this->db->get();
	    $slide = $query->result();
	    return $slide;

    }

	public function get_id_parent($id) {

	    $this->db->select('slider_idiomas.id_slider');
	    $this->db->from('slider_idiomas');
		$this->db->where('id', $id);
		

		$query = $this->db->get();
	    $res = $query->row();
	    return $res->id_slider;

    }



	public function editar_slide($data, $id) {
		if($data["id_idioma"] === "1"){
			$id_slider = $this->get_id_parent($id);
			$data_general = [];
			$nombre = str_replace("<br>", "_", $data["titulo"]);
		    $nombre = str_replace(" ", "_", $nombre);
		    $nombre = htmlentities($nombre);
			$data_general["nombre"] = $nombre;

			$this->db->update('slider', $data_general, array('id' => $id_slider));
		}

		$this->db->update('slider_idiomas', $data, array('id' => $id));
    }


    public function crear_slide($data) {

		$this->db->select('MAX(orden) as max');
		$this->db->from('slider');

		$query = $this->db->get();
	    $max_orden = $query->result()[0]->max;
	    if(!$max_orden){
	    	$max_orden = 0;
	    }

	    $max_orden++;

	    $nombre = str_replace("<br>", "_", $data["titulo"]);
	    $nombre = str_replace(" ", "_", $nombre);
	    $nombre = htmlentities($nombre);

	    $data_slider = array(
	    	'nombre' => $nombre,
	    	'orden' => $max_orden,
	    	'activo' => 0
	    );

		$this->db->insert('slider', $data_slider);
		$insert_id = $this->db->insert_id();

		$data["id_slider"] = $insert_id;
		$data["id_idioma"] = 1;
		$data_en = $data;
		$data_en["id_idioma"] = 2;


		$this->db->insert('slider_idiomas', $data);
		$this->db->insert('slider_idiomas', $data_en);


    }


	public function activa_slide($id) {
		$data = array(
            'activo' => 1,
        );
		$this->db->update('slider', $data, array('id' => $id));
    }

	public function desactiva_slide($id) {
		$data = array(
            'activo' => 0,
        );
		$a = $this->db->update('slider', $data, array('id' => $id));
    }



	public function reordena($orden) {
		foreach ($orden as $orden_ele) {
			$data = array(
	            'orden' => $orden_ele->orden,
	        );
			$sql = $this->db->update('slider', $data, array('id' => $orden_ele->id));
		}
    }

}