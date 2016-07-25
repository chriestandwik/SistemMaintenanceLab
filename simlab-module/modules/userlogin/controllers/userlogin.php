<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userlogin extends CI_Controller {

	public function index() {
		$this->load->view('userlogin_view');
	}

	public function loginasisten() {
		$data = array('nm_petugas' => $this->input->post('nama_petugas', TRUE),
				      'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('userlogin_model'); // load model_user
		$hasil = $this->userlogin_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['kode_petugas'] = $sess->kd_petugas;
				$sess_data['nama_petugas'] = $sess->nm_petugas;
				$sess_data['jabatan'] = $sess->jabatan;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('jabatan')=="asisten") {
				redirect('asisten/home');
			}
			else { redirect('error/forbidden');}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
    
    public function loginstaff() {
		$data = array('nm_petugas' => $this->input->post('nama_petugas', TRUE),
				      'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('userlogin_model'); // load model_user
		$hasil = $this->userlogin_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['kode_petugas'] = $sess->kd_petugas;
				$sess_data['nama_petugas'] = $sess->nm_petugas;
				$sess_data['jabatan'] = $sess->jabatan;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('jabatan')=="staff") {
                echo"<script>alert('Login Berhasil');</script>";
				redirect('staff/home');
			}
			else { redirect('error/forbidden');}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
    
    public function loginkalab() {
		$data = array('nm_petugas' => $this->input->post('nama_petugas', TRUE),
				      'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('userlogin_model'); // load model_user
		$hasil = $this->userlogin_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['kode_petugas'] = $sess->kd_petugas;
				$sess_data['nama_petugas'] = $sess->nm_petugas;
				$sess_data['jabatan'] = $sess->jabatan;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('jabatan')=="kepalalab") {
				redirect('kepalalab/home');
			}
			else { redirect('error/forbidden');}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>