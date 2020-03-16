<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('transaksimodel');

		//cek apakah sudah login atau belum
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('info', 'Maaf, Anda harus login terlebih dahulu.');
			redirect(base_url("site"));
		}
	}

	public function index()
	{	
		$data['judul'] = "Data Transaksi";
		$data['transaksi'] = $this->transaksimodel->Gettransaksi();
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/view', $data);
		$this->load->view('templates/footer', $data);		
	}

	public function add()
	{

		if($this->input->post('submit')) 
			{
				$this->form_validation->set_rules('namapelanggan', 'Field Nama Pelanggan', 'required');
				$this->form_validation->set_rules('noktp', 'Field No. KTP', 'required');
				$this->form_validation->set_rules('nohp', 'Field No. HP', 'required');
				$this->form_validation->set_rules('alamat', 'Field Alamat', 'required');
				$this->form_validation->set_rules('tglsewa', 'Field Tanggal Sewa', 'required');
				$this->form_validation->set_rules('idmobil', 'Field Mobil', 'required');
				$this->form_validation->set_rules('idsupir', 'Field Supir', 'required');

				if ($this->form_validation->run() == FALSE)
		                {
		                	//$data['transaksi'] = $this->transaksimodel->status();
		                    //return $this->fungsi->status();
		                    $data['mobil'] = $this->transaksimodel->getMobil();
							$data['supir'] = $this->transaksimodel->getSupir();
							$data['content'] = "transaksi/add";
							$this->load->view('template/template', $data);
		                }
		            else
		                {			
		                			
					                $insert 	= $this->transaksimodel->insert();
				                    if($insert) 
										{
											//cek id mobil
											$this->updatestmbl($this->input->post('idmobil'), 'jalan');
											$this->session->set_flashdata('info', 'Data berhasil disimpan');
											redirect('transaksi');
										}			                    
		                }

			} else {
				$data['judul'] = "Tambah Data Transaksi";
				$data['mobil'] = $this->transaksimodel->getMobil();
				$data['supir'] = $this->transaksimodel->getSupir();
				$this->load->view('templates/header', $data);
				$this->load->view('transaksi/add', $data);
				$this->load->view('templates/footer', $data);
			}

		
	
	}

	public function edit()
	{	
		$this->load->library('fungsi');
		
		if($this->input->post('submit')) {
			$id 		 				= $this->input->post('id');
			$namapelanggan 	= $this->input->post('namapelanggan');
			$noktp 					= $this->input->post('noktp');
			$nohp 					= $this->input->post('nohp');
			$alamat 				= $this->input->post('alamat');
			$tglsewa 				= $this->input->post('tglsewa');
			$tglkembali			= $this->input->post('tglkembali');
			$idmobil 				= $this->input->post('idmobil');
			$idsupir 				= $this->input->post('idsupir');
			$selisih 				= $this->input->post('selisih');
			$total 					= $this->input->post('total');
			$sttransaksi 		= $this->input->post('sttransaksi');
	
			$field = [
				'namapelanggan' => $namapelanggan,
				'noktp' 				=> $noktp,
				'nohp'  				=> $nohp,
				'alamat' 				=> $alamat,
				'tglsewa'  			=> $tglsewa,
				'tglkembali' 		=> $tglkembali,
				'idmobil'  			=> $idmobil,
				'idsupir'  			=> $idsupir,
				'selisih'  			=> $selisih,
				'total'  				=> $total,
				'sttransaksi'		=> $sttransaksi
			];
			
			$this->db->where('idtransaksi', $id);
			$this->db->update('transaksi', $field);
			
			if($tglkembali != NULL && $tglkembali != '0000-00-00') {
				$this->updatestatus($id);
			}

			if($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'Data berhasil diupdate');
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('info', 'Data gagal diupdate');
				redirect('transaksi');
			}

		} else {
			$id = $this->uri->segment(3);
			$data['judul'] = "Edit Data Transaksi";
			$data['edit'] = $this->transaksimodel->GetData($id);
			$data['mobil'] = $this->transaksimodel->getMobil();
			$data['supir'] = $this->transaksimodel->getSupir();
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/edit', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function hapus($id)
	{
		$this->transaksimodel->delete($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('info', 'Data gagal dihapus');
			redirect('transaksi');
		}
	}

	public function updatestatus($id)
	{
		$this->transaksimodel->updatest($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil diupdate');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('info', 'Data gagal diupdate');
			redirect('transaksi');
		}
	}

	//update status mobil menjadi 
	public function updatestmbl($id, $st) {
		$field = array (
							'stmobil'	=> $st
						);

		$this->db->where('idmobil', $id);
		$this->db->update('mobil', $field);
		return $this->db->affected_rows();
	}

}
