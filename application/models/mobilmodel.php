<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobilmodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
	}
	
	public function GetMobil(){
		$this->db->select('*');
		$this->db->from('merk');
		$this->db->join('mobil', 'mobil.idmerk = merk.idmerk');
		$query = $this->db->get();
		return $query->result();
	}

    function GetData($id) {
    	$id = $this->uri->segment(3);
    	return $this->db->get_where('mobil', array('idmobil'=> $id))->row();
    }

    public function getMerk(){	
		$this->db->from("merk");
		$this->db->order_by("namamerk", "ASC");
		$query = $this->db->get(); 
		return $query->result();
	}	
	
	public function insert()
	{
		$type 		= $this->input->post('type');
		$idmerk 	= $this->input->post('idmerk');
		$tahun 		= $this->input->post('tahun');
		$plat 		= $this->input->post('plat');
		$kursi 		= $this->input->post('kursi');
		$tarif 		= $this->input->post('tarif');
		$lembur 	= $this->input->post('lembur');
		$rangka 	= $this->input->post('rangka');		

		$input = array (
		    'type' 			=> $type,
		    'idmerk'  		=> $idmerk,
		    'tahunproduksi' => $tahun,
		    'platnomer'  	=> $plat,
		    'kursi'  		=> $kursi,
		    'tarif'  		=> $tarif,
		    'lembur'  		=> $lembur,
		    'norangka'  	=> $rangka
		);

		return $this->db->insert('mobil', $input);
	}

	public function delete($param) {
		return $this->db->delete('mobil', array('idmobil' => $param));
	}
}
