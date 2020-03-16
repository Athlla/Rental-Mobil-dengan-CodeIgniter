<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merkmodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
	}

	function GetMerk() {
        return $this->db->get('merk')->result();
    }

    function GetData($id) {
    	//return $this->db->where('idmerk', $id)->get('merk')->result_array();
    	return $this->db->get_where('merk', array('idmerk'=> $id))->row();
    }

	public function insert()
	{
		
		$merk = $this->input->post('merk');

		$input = array (
		    'namamerk' => $merk
		);

		return $this->db->insert('merk', $input);
	}

	public function delete($param) {
		return $this->db->delete('merk', array('idmerk' => $param));
	}

}
