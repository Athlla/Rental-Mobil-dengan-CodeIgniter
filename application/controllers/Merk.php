<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('merkmodel');

		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('info', 'Maaf, Anda harus login terlebih dahulu.');
			redirect(base_url("site"));
		}
	}

	public function index()
	{	
		$data['judul'] = "Data Merk Mobil";
		$data['merk'] = $this->merkmodel->GetMerk();
		$data['content'] = "merk/view";
		$this->load->view('templates/header', $data);
		$this->load->view('merk/view', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if($this->input->post('submit')) 
			{
				$this->form_validation->set_rules('merk', 'Field of Merk Mobil', 'required');
				if ($this->form_validation->run() == FALSE){
					redirect(base_url("merk/add"));
				}
				else {
					$insert = $this->merkmodel->insert();
					if($insert) {
						$this->session->set_flashdata('info', 'Data berhasil disimpan');
						redirect('merk');
					} 
		        }

			} else {
				$data['judul'] = "Tambah data Merk Mobil";
				$this->load->view('templates/header', $data);
				$this->load->view('merk/add', $data);
				$this->load->view('templates/footer');
			}

		
	}

	public function edit($id)
	{	
		if($this->input->post('submit')) 
			{
				$id = $this->input->post('id');
				$merk = $this->input->post('merk');

				$field = array (
				    'namamerk' => $merk
				);

				$this->db->where('idmerk', $id);
				$this->db->update('merk', $field);

				if($this->db->affected_rows()) {
					$this->session->set_flashdata('info', 'Data berhasil diupdate');
					redirect('merk');
				} else {
					$this->session->set_flashdata('info', 'Data gagal diupdate');
					redirect('merk');
				}

			} else {
				$data['judul'] = "Edit data Merk Mobil";
				$data['edit'] = $this->merkmodel->GetData($id);
				$this->load->view('templates/header', $data);
				$this->load->view('merk/edit', $data);
				$this->load->view('templates/footer');
			}
	}

	public function hapus($id)
	{
		$this->merkmodel->delete($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
			redirect('merk');
		} else {
			$this->session->set_flashdata('info', 'Data gagal dihapus');
			redirect('merk');
		}
	}

}
