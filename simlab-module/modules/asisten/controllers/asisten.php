<?php
class asisten extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('text');
    	$this->load->helper('url');
		$this->load->model('asisten_model');

		if ($this->session->userdata('nama_petugas')=="") {
			echo "<script>alert('Silahkan Login Terlebih Dahulu !');document.location.href='../userinit';</script>";
		}
	}
	public function index() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "Asisten";
		$this->load->view('base_dashboard', $data);
	}

	public function home() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "Asisten";
		$this->load->view('base_dashboard', $data);
	}

	public function logout() {
		$this->session->unset_userdata('namapetugas');
		$this->session->unset_userdata('jabatan');
		session_destroy();
		redirect('userinit');
	}

//=====================================================================================
	public function maintenancehardware() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "Asisten";
    	$data['databarang'] = $this->asisten_model->view_databarangmainten();
    	// $data['datainvent'] = $this->asisten_model->view_datainvent();
    	$data['dtknd'] = $this->asisten_model->data_kondisi();
    	$data['kd_inv'] = $this->asisten_model->view_dkdmaint();
    	$data['datamainten'] = $this->asisten_model->view_datamainten();
		$this->load->view('maintenance_hard/content_maintenhard', $data);
	}

	public function tambah_maintenancehardware() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "Asisten";
    	$nmptgs = $this->session->userdata('nama_petugas');
    	$new_array = $this->db->query
        ("SELECT kd_petugas FROM tb_petugas where nm_petugas = '$nmptgs'");
        $dt = $new_array->row_array();
        $data['kd_petugas'] = $dt['kd_petugas'];
    	$data['kode'] = $this->asisten_model->id_maintenancehardware();
		$this->load->view('maintenance_hard/content_tambahmaintenhard', $data);
	}

	 public function autocompletehardware(){
		$keyword = $this->uri->segment(3);
		$data = $this->db->select('a.kd_inventaris,a.kd_barang,b.nm_barang,b.spesifikasi,b.kd_kategori,b.jenis_barang,b.klasifikasi')
        ->from('tb_inventaris_barang a')
        ->join('tb_barang b', 'a.kd_barang = b.kd_barang','inner')
        ->where('b.jenis_barang','maintenance')
        ->where('b.klasifikasi','hardware')
        ->order_by('a.kd_inventaris','ASC')->get();
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->kd_inventaris.' - '.$row->nm_barang,
				'kd_inventaris'	=>$row->kd_inventaris,
				'spesifikasi'=>$row->spesifikasi
			);
		}
		echo json_encode($arr);
	}

	 public function proses_insertmainthard() {
	 	$tgl=$this->input->post('tgl_maintenance');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_mainthard=implode("-",$arr);
        $kondisi =  $this->input->post('kondisi');
        if($kondisi=="Normal"){ $keterangan=$this->input->post('ket_normal');} else { $keterangan=$this->input->post('keterangan');}
        $data = array('kd_maintenance' => $this->input->post('id_maintenance') ,
        			  'kd_petugas' => $this->input->post('kd_petugas') ,
                      'tgl_maintenance' => $tgl_mainthard ,
                      'kd_inventaris' => $this->input->post('kd_inventaris') ,
                      'kondisi' => $this->input->post('kondisi') ,
                      'keterangan' => $keterangan );
		$this->asisten_model->tambah_maintenhard($data);
        echo "<script>alert('Maintenance Berhasil Disimpan !');document.location.href='maintenancehardware';</script>";
	}
//==================================================================================
	public function maintenancesoftware() {
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    	$data['jabatan'] = "Asisten";
		$this->load->view('maintenance_soft/content_maintensoft', $data);
	}
}
?>
