<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksimodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
	}

	function Gettransaksi() {
		$this->db->select('namapelanggan, nohp, tglsewa, tglkembali, type, transaksi.idsupir, namasupir, sttransaksi, idtransaksi,selisih,total');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.idmobil = transaksi.idmobil');
        $this->db->join('supir', 'supir.idsupir = transaksi.idsupir', 'left');
        $this->db->order_by('idtransaksi', 'DESC');
        $query = $this->db->get(); 
		return $query->result();
    }

    function GetData($id) {
    	$id = $this->uri->segment(3);
    	return $this->db->get_where('transaksi', array('idtransaksi'=> $id))->row();
    }
	
	public function getMobil(){
		$this->db->from("mobil");
		$this->db->order_by("type", "ASC");
		$query = $this->db->get(); 
		return $query->result();
	}

	function GetSupirView($s) {
		$this->db->select('namasupir');
		$this->db->from('supir');
		$this->db->join('transaksi', 'transaksi.idsupir = supir.idsupir');
		$this->db->where('transaksi.idsupir', $s);
		$query = $this->db->get()->row();
	}
	
	public function getSupir(){
		$this->db->from("supir");
		$this->db->order_by("namasupir", "ASC");
		$query = $this->db->get(); 
		return $query->result();
	}
	
	public function insert() {
		
		$namapelanggan 	= $this->input->post('namapelanggan');
		$noktp 			= $this->input->post('noktp');
		$nohp 			= $this->input->post('nohp');
		$alamat 		= $this->input->post('alamat');
		$tglsewa 		= $this->input->post('tglsewa');
		$idmobil 		= $this->input->post('idmobil');
		$idsupir 		= $this->input->post('idsupir');
	
		$input = array (
			'namapelanggan' => $namapelanggan,
			'noktp' 		=> $noktp,
			'nohp'  		=> $nohp,
			'alamat' 		=> $alamat,
			'tglsewa'  		=> $tglsewa,
			'idmobil'  		=> $idmobil,
			'idsupir'  		=> $idsupir
		);
	
		return $this->db->insert('transaksi', $input);
	}

	public function delete($param) {
		return $this->db->delete('transaksi', array('idtransaksi' => $param));
	}

	public function updatest($id) {

		$this->db->select('transaksi.`tglsewa`, transaksi.`tglkembali`, mobil.`tarif` as tarifmobil, supir.`tarif` as tarifsupir');
		$this->db->from('transaksi');
		$this->db->join('mobil', 'mobil.idmobil = transaksi.idmobil', 'left');
		$this->db->join('supir', 'supir.idsupir = transaksi.idsupir', 'left');
		$this->db->where('idtransaksi', $id);
		$query = $this->db->get()->row();

		$harimulai = $query->tglsewa;
		$harikembali = $query->tglkembali;

		$selisih = $this->fungsi->cekhari($harimulai, $harikembali);

		$hitungs = $selisih * $query->tarifmobil;
		if($query->tarifsupir > 0) {
			$hitungsop = $query->tarifsupir * $selisih;
		} else {
			$hitungsop = 0;
		}

		$totalsewa = $hitungs + $hitungsop;

		$field = array (
			'tglkembali' 	=> $harikembali,
			'selisih'		=> $selisih,
			'sttransaksi'	=> 'selesai',
			'total'			=> $totalsewa
		);

		$this->db->where('idtransaksi', $id);
		$this->db->update('transaksi', $field);
		return $this->db->affected_rows();
	}
}
