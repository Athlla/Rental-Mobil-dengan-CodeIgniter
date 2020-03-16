<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('supirmodel');

		//cek apakah sudah login atau belum
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('info', 'Maaf, Anda harus login terlebih dahulu.');
			redirect(base_url("site"));
		}
	}

	public function index()
	{	
		$data['judul'] = "Data Supir";
		$data['supir'] = $this->supirmodel->Getsupir();
		$this->load->view('templates/header', $data);
		$this->load->view('supir/view', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{

		if($this->input->post('submit')) {
			$this->form_validation->set_rules('namasupir', 'Field of Type supir', 'required');
			$this->form_validation->set_rules('tgllahir', 'Field of Merk supir', 'required');
			$this->form_validation->set_rules('alamat', 'Field of Tahun supir', 'required');
			$this->form_validation->set_rules('noktp', 'Field of No. Plat supir', 'required');
			//$this->form_validation->set_rules('foto', 'Field of Foto supir', 'required');
	
			if ($this->form_validation->run() == FALSE){
				$data['supir'] = $this->supirmodel->status();
				$data['content'] = "supir/add";
				$this->load->view('template/template', $data);
				return $this->fungsi->status();
			} else {
				$insert = $this->supirmodel->insert();
				if($insert) {
					$this->session->set_flashdata('info', 'Data berhasil disimpan');
					redirect('supir');
				} else {
					$this->session->set_flashdata('info', 'Data gagal disimpan');
					redirect('supir');
				}
			}
									
		

		} else {
			$data['judul'] = "Tambah Data Supir";
			$this->load->view('templates/header', $data);
			$this->load->view('supir/add', $data);
			$this->load->view('templates/footer');
		}
		
	}

	public function edit()
	{	
		$this->load->library('fungsi');

		if($this->input->post('submit')) {
			//var_dump($this->input->post());
			$id 		= $this->input->post('id');
			$namasupir 	= $this->input->post('namasupir');
			$tgllahir 	= $this->input->post('tgllahir');
			$alamat 	= $this->input->post('alamat');
			$noktp 		= $this->input->post('noktp');
			
			$field = array (
				'tgllahir' 		=> $tgllahir,
				'namasupir' 	=> $namasupir,
				'alamat'  		=> $alamat,
				'noktp' 		=> $noktp
			);
	
			$this->db->where('idsupir', $id);
			$this->db->update('supir', $field);
	
			if($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'Data berhasil diupdate');
				redirect('supir');
			} else {
				$this->session->set_flashdata('info', 'Data gagal diupdate');
				redirect('supir');
			}
			
		} else {
			$id = $this->uri->segment(3);
			$data['judul'] = "Edit Data Supir";
			$data['edit'] = $this->supirmodel->GetData($id);
			$this->load->view('templates/header', $data);
			$this->load->view('supir/edit', $data);
			$this->load->view('templates/footer');
		}

	}

	public function hapus($id)
	{
		$this->supirmodel->delete($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
			redirect('supir');
		} else {
			$this->session->set_flashdata('info', 'Data gagal dihapus');
			redirect('supir');
		}
	}

}
