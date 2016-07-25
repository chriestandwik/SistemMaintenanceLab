<?php
class kepalalab extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('text');
	}
	public function index() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
		$this->load->view('kepalalab_dashboard', $data);
        
        if ($this->session->userdata('nama_petugas')=="") {
			redirect('userlogin');
		}
	}

	public function logout() {
		$this->session->unset_userdata('namapetugas');
		$this->session->unset_userdata('jabatan');
		session_destroy();
		redirect('userlogin');
	}
}
?>
