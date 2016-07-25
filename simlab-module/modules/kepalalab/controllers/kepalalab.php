<?php
class kepalalab extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('text');
    	$this->load->helper('url');
		//$this->load->model('staff_model');

		if ($this->session->userdata('nama_petugas')=="") {
			echo "<script>alert('Silahkan Login Terlebih Dahulu !');document.location.href='../userinit';</script>";
		}
	}
	public function index() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "kepalalab";
		$this->load->view('base_dashboard', $data);
	}

	public function home() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "kepalalab";
		$this->load->view('base_dashboard', $data);
	}

	public function logout() {
		$this->session->unset_userdata('namapetugas');
		$this->session->unset_userdata('jabatan');
		session_destroy();
		redirect('userinit');
	}
}
?>
