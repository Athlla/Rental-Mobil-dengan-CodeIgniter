<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
	}

	public function getMobil(){
		$this->db->from("mobil");
		$this->db->order_by("type", "ASC");
		$query = $this->db->get(); 
		return $query->result();
	}
	
	public function getSupir(){
		$this->db->from("supir");
		$this->db->order_by("namasupir", "ASC");
		$query = $this->db->get(); 
		return $query->result();
	}

}
