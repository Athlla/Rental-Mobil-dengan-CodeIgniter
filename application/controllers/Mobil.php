<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('mobilmodel');

		// cek apakah sudah login atau belum
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('info', 'Maaf, Anda harus login terlebih dahulu.');
			redirect(base_url("site"));
		}
	}

	public function index()
	{	
		$data['judul'] = "Data Mobil";
		$data['mobil'] = $this->mobilmodel->GetMobil();
		$this->load->view('templates/header', $data);
		$this->load->view('mobil/view', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{

		if($this->input->post('submit')) 
			{
				$this->form_validation->set_rules('type', 'Field of Type Mobil', 'required');
				$this->form_validation->set_rules('idmerk', 'Field of Merk Mobil', 'required');
				$this->form_validation->set_rules('tahun', 'Field of Tahun Mobil', 'required');
				$this->form_validation->set_rules('plat', 'Field of No. Plat Mobil', 'required');
				$this->form_validation->set_rules('kursi', 'Field of Jumlah Kursi Mobil', 'required');
				$this->form_validation->set_rules('tarif', 'Field of Tarif Mobil', 'required');
				$this->form_validation->set_rules('lembur', 'Field of Overtime', 'required');
				$this->form_validation->set_rules('rangka', 'Field of No. Rangka Mobil', 'required');

				if ($this->form_validation->run() == FALSE){
					$data['mobil'] = $this->mobilmodel->status();
					return $this->fungsi->status();
					$data['content'] = "mobil/add";
					$this->load->view('template/template', $data);
				} else {
					$insert = $this->mobilmodel->insert();
					if($insert) {
						$this->session->set_flashdata('info', 'Data berhasil disimpan');
						redirect('mobil');
					} else {
						$this->session->set_flashdata('info', 'Data gagal disimpan');
						redirect('mobil');
				}
					
				}

			} else {
				$data['judul'] = "Edit Data Mobil";
				$data['list'] = $this->mobilmodel->getMerk();
				$this->load->view('templates/header', $data);
				$this->load->view('mobil/add');
				$this->load->view('templates/footer');
			}
	}

	public function edit()
	{	
		$this->load->library('fungsi');

		if($this->input->post('submit')) {
			//var_dump($this->input->post());
			$id 		= $this->input->post('id');
			$type 		= $this->input->post('type');
			$idmerk 	= $this->input->post('idmerk');
			$tahun 		= $this->input->post('tahun');
			$plat 		= $this->input->post('plat');
			$kursi 		= $this->input->post('kursi');
			$tarif 		= $this->input->post('tarif');
			$lembur 	= $this->input->post('lembur');
			$rangka 	= $this->input->post('rangka');
			
			$field = array (
				'type' 			=> $type,
				'idmerk'  		=> $idmerk,
				'tahunproduksi' => $tahun,
				'platnomer'  	=> $plat,
				'kursi'  		=> $kursi,
				'tarif'  		=> $tarif,
				'lembur'  		=> $lembur,
				'norangka'  	=> $rangka
			);
	
			$this->db->where('idmobil', $id);
			$this->db->update('mobil', $field);
			
			if($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'Data berhasil diupdate');
				redirect('mobil');
			} else {
				$this->session->set_flashdata('info', 'Data gagal diupdate');
				redirect('mobil');
			}

		} else {
			$id = $this->uri->segment(3);
			$data['judul'] = "Edit Data Mobil";
			$data['edit'] = $this->mobilmodel->GetData($id);
			$data['list'] = $this->mobilmodel->getMerk();
			$this->load->view('templates/header', $data);
			$this->load->view('mobil/edit', $data);
			$this->load->view('templates/footer');
		}

	}

	public function hapus($id)
	{
		$this->mobilmodel->delete($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
			redirect('mobil');
		} else {
			$this->session->set_flashdata('info', 'Data gagal dihapus');
			redirect('mobil');
		}
	}

}
