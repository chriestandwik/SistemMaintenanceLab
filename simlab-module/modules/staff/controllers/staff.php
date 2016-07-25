<?php
class staff extends CI_Controller {
 
	public function __construct() {
		parent::__construct();
		
	$this->load->helper('text');
    $this->load->helper('url');
    $this->load->model('staff_model');
    $this->load->library('pagination');
    $this->config->load("pagination");
    date_default_timezone_set('Asia/Jakarta'); 
//Menampilkan tanggal hari ini dalam bahasa Indonesia dan English

         if ($this->session->userdata('nama_petugas')=="") {
			echo "<script>alert('Silahkan Login Terlebih Dahulu !');document.location.href='../userinit';</script>";
		}
	}
    ////////////////////////////////////////////////
     public function printform() {
    // load dompdf
    $this->load->helper('dompdf');
    //load content html
    $html = $this->load->view('page_prints', '', true);
    // create pdf using dompdf
    $filename = 'Message';
    $paper = 'f4';
    $orientation = 'LANDSCAPE';
    pdf_create($html, $filename, $paper, $orientation);
    }

    ////////////////////////////////////////////////

	public function index() {
        
		$data['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data['jabatan'] = "Staff";
		$this->load->view('staff_index', $data);  
	}
    
     public function home() {
        $datasession['nama_petugas'] = $this->session->userdata('nama_petugas');
        $datasession['jabatan'] ="Staff";
		$this->load->view('staff_index',$datasession);
        
	}
    
	public function logout() {
		$this->session->unset_userdata('namapetugas');
		$this->session->unset_userdata('jabatan');
		session_destroy();
		redirect('userinit');
	}
    
    public function pengaturanakun() {

		$datasession['nama_petugas'] = $this->session->userdata('nama_petugas');
        $datasession['jabatan'] ="Staff";
		$this->load->view('pengaturanakun',$datasession);
	}

//================== Controller Kategori ===================================
  public function kategoribarang() {
        $config['base_url'] = base_url().'staff/kategoribarang';
        $config['total_rows'] = $this->staff_model->total_kategori();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->kategori_limit($config['per_page'],$start)->result();
        $data_katb['pagination'] = $this->pagination->create_links();
        $data_katb['start'] = $start;
        $data_katb['rows'] = $rows;
        $data_katb['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_katb['jabatan'] = "Staff";
        $data_katb['kategori'] = $this->staff_model->tampil_data_kategori();
		$this->load->view('kategori/content_kategoribarang',$data_katb);     
	}
    public function ubahkategori($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['kategori'] = $this->staff_model->get_detail_kategori($id)->row();
		$this->load->view('kategori/content_ubahKategori',$data_ub);
	}
    
    public function tambahkategori() {
        $data_tbkat['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_tbkat['jabatan'] = "Staff";
        $data_tbkat['kode'] = $this->staff_model->id_kategori();
		$this->load->view('kategori/content_tambahKategori',$data_tbkat);   
	}
    
    public function proses_updatekategori()
	{
		$id['kd_kategori'] = $this->input->post('kd_kategori');
		$data = array('nm_kategori' => $this->input->post('nm_kategori'));
		$this->staff_model->update_kategori($data,$id);
		echo "<script>alert('Data Kategori Berhasil Diubah !');document.location.href='kategoribarang';</script>";
	}
    
    public function proses_insertkategori() {
        $data = array('kd_kategori' => $this->input->post('kd_kategori') ,
				      'nm_kategori' => $this->input->post('nm_kategori'));
		$this->staff_model->tambah_kategori($data);
        echo "<script>alert('Data Kategori Berhasil Ditambahkan !');document.location.href='kategoribarang';</script>";
	}
    
    public function delete_kategori($id)
	{
        $this->staff_model->delete_kategori($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/kategoribarang','refresh');
	}
    
//===========================================================================
//================== Controller Unit ===================================
    public function unit() {
        $config['base_url'] = base_url().'staff/unit';
        $config['total_rows'] = $this->staff_model->total_unit();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->unit_limit($config['per_page'],$start)->result();
        $data_katb['pagination'] = $this->pagination->create_links();
        $data_katb['start'] = $start;
        $data_katb['rows'] = $rows;
        $data_katb['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_katb['jabatan'] = "Staff";
        $data_katb['unit'] = $this->staff_model->tampil_data_unit();
		$this->load->view('unit/content_unit',$data_katb);
        
	}
    
    public function tambahunit() {
        $data_tbkat['nama_petugas'] = $this->session->userdata('nama_petugas');  
        $data_tbkat['jabatan'] = "Staff";
        $data_tbkat['kode'] = $this->staff_model->id_unit();
		$this->load->view('unit/content_tambahunit',$data_tbkat);
        
	}
    
    public function ubahunit($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['unit'] = $this->staff_model->get_detail_unit($id)->row();
		$this->load->view('unit/content_ubahunit',$data_ub);
        
	}
    
    public function proses_insertunit() {
        $data = array('kd_unit' => $this->input->post('kd_unit') ,
                      'nm_unit' => $this->input->post('nm_unit') ,
				      'telepon' => $this->input->post('telepon'));
		$this->staff_model->tambah_unit($data);
        echo "<script>alert('Data Unit Berhasil Ditambahkan !');document.location.href='unit';</script>";
	}
    
    public function proses_updateunit()
	{
		$id['kd_unit'] = $this->input->post('kd_unit');
		$data = array('nm_unit' => $this->input->post('nm_unit'),
                      'telepon' => $this->input->post('telepon'));
		$this->staff_model->update_unit($data,$id);
		echo "<script>alert('Data Unit Berhasil Diubah !');document.location.href='unit';</script>";
	}
    
    public function delete_unit($id)
	{
        $this->staff_model->delete_unit($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/unit','refresh');
	}
    
//=============================================================================
//=========================== Controller Barang ===============================
    public function barang() {
        $config['base_url'] = base_url().'staff/barang';
        $config['total_rows'] = $this->staff_model->total_barang();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->barang_limit($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['barang'] = $this->staff_model->tampil_data_barang();
		$this->load->view('barang/content_databarang',$data_b);
	}
    
    public function tambahbarang() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] = "Staff";
        $data_b['kategori'] = $this->staff_model->tampil_data_kategori();
        $data_b['kode'] = $this->staff_model->id_barang();
		$this->load->view('barang/content_tambahbarang',$data_b);
        
	}
    
    public function updatebarang($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['barang'] = $this->staff_model->get_detail_barang($id)->row();
        $data_ub['kategori'] = $this->staff_model->tampil_data_kategori();
		$this->load->view('barang/content_ubahbarang',$data_ub);
	}
    
    public function proses_insertbarang() {
        $jenisbrg = $this->input->post('jns_barang') ;
        if($jenisbrg=='non maintenance') { $klasifikasi = " "; } else { $klasifikasi = $this->input->post('klasifikasi'); }
        $data = array('kd_barang' => $this->input->post('kd_barang') ,
                      'nm_barang' => $this->input->post('nm_barang') ,
                      'kd_kategori' => $this->input->post('kategori') ,
                      'jenis_barang' => $this->input->post('jns_barang') ,
                      'klasifikasi' => $klasifikasi ,
                      'satuan' => $this->input->post('satuan'));
		$this->staff_model->tambah_barang($data);
        echo "<script>alert('Data Barang Berhasil Ditambahkan !');document.location.href='barang';</script>";
	}
    
    public function proses_updatebarang()
	{
        $jenisbrg = $this->input->post('jns_barang') ;
        if($jenisbrg=='non maintenance') { $klasifikasi = " "; } else { $klasifikasi = $this->input->post('klasifikasi'); }
		$id['kd_barang'] = $this->input->post('kd_barang');
		$data = array('nm_barang' => $this->input->post('nm_barang') ,
                      'kd_kategori' => $this->input->post('kategori') ,
                      'jenis_barang' => $this->input->post('jns_barang') ,
                      'klasifikasi' => $klasifikasi ,
                      'satuan' => $this->input->post('satuan'));
		$this->staff_model->update_barang($data,$id);
		echo "<script>alert('Data Barang Berhasil Diubah !');document.location.href='barang';</script>";
	}
    
    public function delete_barang($id)
	{
        $this->staff_model->delete_barang($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/barang','refresh');
	}
    
//=====================================================================================
//========================= Controller Inventaris Barang===============================
    public function inventarisbarang() {
        $config['base_url'] = base_url().'staff/inventarisbarang';
        $config['total_rows'] = $this->staff_model->total_penerimaan();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->penerimaan_limit($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] = "Staff";
        $data_b['data'] = $this->staff_model->tampil_penerimaan();
        $this->load->view('inventaris_barang/content_inventarisbarang',$data_b);      
    }

    public function totalinventarisbarang() {
        $config['base_url'] = base_url().'staff/totalinventarisbarang';
        $config['total_rows'] = $this->staff_model->total_data_total_inventaris();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->limit_data_total_inventaris($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] = "Staff";
        $data_b['data'] = $this->staff_model->tampil_penerimaan();
        $this->load->view('inventaris_barang/content_totalinventaris',$data_b);      
    }

    public function detailinventarisbarang($id) {
        $config['base_url'] = base_url().'staff/detailinventarisbarang/'.$id;
        $config['total_rows'] = $this->staff_model->total_inventaris($id);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(4, 0);
        $rows = $this->staff_model->inventaris_limit($config['per_page'],$start,$id)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['penerimaan'] = $this->staff_model->tampil_penerimaan();
        $data_b['barang'] = $this->staff_model->tampil_data_barang();
        $data_b['id'] = $id;
        $this->load->view('inventaris_barang/content_detailinventarisbarang',$data_b);      
    }
    
     public function autocompletetambahinventaris(){
        $keyword = $this->uri->segment(3);

        $data = $this->db->from('tb_penerimaan')->like('kd_penerimaan',$keyword)->get();

        foreach($data->result() as $row)
        {
            $new_array = $this->db->query
            ("SELECT * FROM tb_inventaris_barang where kd_penerimaan = '$row->kd_penerimaan' ORDER BY kd_inventaris DESC limit 1");
            $dt = $new_array->row_array();
            $jmldt = $new_array->num_rows();
            $stkawl = $dt['stok_awal'];
            $stkakr = $dt['stok_akhir'];
            $kdbrg = $dt['kd_barang'];
            if(empty($jmldt)){
                $nstokawal = 0;
                $nstokakhr = 0;
            }
            else if($stkawl==0 & $stkakr==0){
                $nstokawal = 1;
                $nstokakhr = 1;
            }
            else{
                $nstokawal = $stkakr;
                $nstokakhr = $stkawl+1;
            }
             $qnmbrg = $this->db->query
            ("SELECT nm_barang FROM tb_barang where kd_barang = '$row->kd_barang' limit 1");
            $dnmbrg = $qnmbrg->row_array();
            $nmbrg = $dnmbrg['nm_barang'];
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' =>$row->kd_penerimaan.' - '.$nmbrg,
                'kd_barang' =>$row->kd_barang,
                'stok_awal' =>$nstokawal,
                'stok_akhir' =>$nstokakhr,
                'kd_penerimaan' =>$row->kd_penerimaan
            );
        }
        echo json_encode($arr);
    }
  
    public function tambahinventarisbarang($id) {
        $kdpnrm = $this->uri->segment(3);
        $new_array = $this->db->query
        ("SELECT * FROM tb_inventaris_barang where kd_penerimaan = '$kdpnrm' ORDER BY kd_inventaris DESC limit 1");
        $dt = $new_array->row_array();
        $jmldt = $new_array->num_rows();
        $stkawl = $dt['stok_awal'];
        $stkakr = $dt['stok_akhir'];
        $kdbrg = $dt['kd_barang'];
        if(empty($jmldt)){
            $nstokawal = 0;
            $nstokakhr = 0;
            $stokawl = 0;
            $stokakhr = 1;
        }
        //else if($stkawl==0 & $stkakr==0){
            //$nstokawal = 0;
            //$nstokakhr = 1;
        //}
        else{
            $nstokawal = $stkawl;
            $nstokakhr = $stkakr;
            $stokawl = $stkakr;
            $stokakhr = $stkakr+1;
        }
        $qnmb = $this->db->query
        ("SELECT kd_barang FROM tb_penerimaan where kd_penerimaan = '$kdpnrm' ORDER BY kd_penerimaan DESC limit 1");
        $dbb = $qnmb->row_array();
        $kodebrg = $dbb['kd_barang'];
        //$data_b['nmbarang'] = $nmbarang;
        $data_b['kd_brg'] = $kodebrg;
        $data_b['stok_awal'] = $nstokawal;
        $data_b['stok_akhir'] = $nstokakhr;
        $data_b['stokakh'] = $stokakhr;
        $data_b['stokawl'] = $stokawl;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['kdpnrmaan'] =  $this->uri->segment(3);
        $data_b['barang'] = $this->staff_model->tampil_data_barang(); 
        $data_b['kode'] = $this->staff_model->id_inventarisbarang();
        $this->load->view('inventaris_barang/content_tambahinventaris',$data_b);      
    }
    
    public function prosesinsertinvent() {
        $tgl = $this->input->post('tgl_invent');
        $kdpnr = $this->input->post('kd_invent');
        $gettahun = substr($tgl, 6,4) ;
        $new_array = $this->db->query("SELECT YEAR(tgl_inventaris) as tahun FROM tb_inventaris_barang ORDER BY kd_inventaris DESC limit 1");
        $dt = $new_array->row_array();
        $jmldt = $new_array->num_rows();
        $tgldb = $dt['tahun'];
        if($gettahun==$tgldb){
            $idinvnt =  $kdpnr;
        }
        else if($jmldt==0){
            $idinvnt = "INV-0001-".$gettahun;
        }
        else {
            $idinvnt = "INV-0001-".$gettahun;
        }

        $tgl2=$this->input->post('tgl_invent');
        $exp=explode("/",$tgl2);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_invent=implode("-",$arr);
        $data = array('kd_inventaris' => $idinvnt ,
                      'tgl_inventaris' => $tgl_invent ,
                      'kd_petugas' => $this->session->userdata('kode_petugas') ,
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'stok_awal' => $this->input->post('stok_awal') ,
                      'stok_akhir' => $this->input->post('stok_akhir') ,
                      'kd_penerimaan' => $this->input->post('kd_penerimaan'));
        $this->staff_model->tambahinventaris($data);
        echo "<script>alert('Data Inventaris Barang Berhasil Ditambahkan !');document.location.href='inventarisbarang';</script>";
    }
    
    public function proses_updateinventaris()
    {
        $id['kd_inventaris'] = $this->input->post('kd_invent');
        $tgl=$this->input->post('tgl_invent');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_invent=implode("-",$arr);
        $data = array('tgl_inventaris' => $tgl_invent ,
                      'kd_petugas' => $this->session->userdata('kode_petugas') ,
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'stok_awal' => $this->input->post('stok_awal') ,
                      'stok_akhir' => $this->input->post('stok_akhir') ,
                      'kd_penerimaan' => $this->input->post('kd_penerimaan'));
        $this->staff_model->update_inventaris($data,$id);
        echo "<script>alert('Data Inventaris Barang Berhasil Diubah !');document.location.href='inventarisbarang';</script>";
    }
    
     public function updateinventaris($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['barang'] = $this->staff_model->get_detail_inventaris($id)->row();
        //$data_ub['kategori'] = $this->staff_model->tampil_data_kategori();
        $this->load->view('inventaris_barang/content_ubahinventaris',$data_ub);
        
    }
    
    public function delete_inventaris($id)
    {
        $this->staff_model->delete_inventaris($id);
        echo"<script>alert('Data Berhasil Dihapus');history.go(-1);</script>";
    }
//=============================================================================
//================== Controller Penerimaan ===================================
    public function penerimaanbarang() {
        $config['base_url'] = base_url().'staff/penerimaanbarang';
        $config['total_rows'] = $this->staff_model->total_penerimaan();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->penerimaan_limit($config['per_page'],$start)->result();
        $dtsp['pagination'] = $this->pagination->create_links();
        $dtsp['start'] = $start;
        $dtsp['rows'] = $rows;
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $dtsp['data'] = $this->staff_model->tampil_penerimaan();
        $this->load->view('penerimaan_barang/content_penerimaan',$dtsp);

    }
    
    public function autocompletebarang(){
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_barang')->like('nm_barang',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_barang,
				'kd_barang'	=>$row->kd_barang

			);
		}
		echo json_encode($arr);
	}
    
     public function autocompleteunit(){
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_unit')->like('nm_unit',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_unit,
				'kd_unit'	=>$row->kd_unit

			);
		}
		echo json_encode($arr);
	}
    
    public function tambahpenerimaan() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] = "Staff";
        $data_b['kode'] = $this->staff_model->id_penerimaan();
        //$data_b['barang'] = $this->staff_model->tampil_data_barang();
		$this->load->view('penerimaan_barang/content_tambahpenerimaan',$data_b); 
	}
    
     public function ubahpenerimaan($id) {
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $dtsp['data'] = $this->staff_model->get_detail_penerimaan($id)->row();
        $dtsp['barang'] = $this->staff_model->tampil_data_barang();
        $dtsp['unit'] = $this->staff_model->tampil_data_unit();
        $this->load->view('penerimaan_barang/content_ubahpenerimaan',$dtsp);

    }
    
    public function proses_insertpenerimaan() {
        $tgl = $this->input->post('tgl_terima');
        $kdpnr = $this->input->post('kd_penerimaan');
        $gettahun = substr($tgl, 6,4) ;
       $t_array = $this->db->query("SELECT year(tgl_penerimaan) as tahun  FROM tb_penerimaan ORDER BY kd_penerimaan DESC limit 1");
        $dt = $t_array->row_array();
        $jmldt = $t_array->num_rows();
        $thndb = $dt['tahun'];
        if($gettahun==$thndb){
            $idpenerimaan =  $kdpnr;
        }
        else if($jmldt==0){
            $idpenerimaan = "PNR-0001-".$gettahun;
        }
        else {
            $idpenerimaan = "PNR-0001-".$gettahun;
        }

        $tgl=$this->input->post('tgl_terima');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_terima=implode("-",$arr);
        $data = array('kd_penerimaan' => $idpenerimaan ,
                      'tgl_penerimaan' => $tgl_terima ,
                      'kd_petugas' =>$this->session->userdata('kode_petugas') ,
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'kd_unit' => $this->input->post('kd_unit') ,
                      'jml_brg_diterima' => $this->input->post('jml_diterima'),
                      'satuan' => $this->input->post('satuan') ,
                      'kondisi' => $this->input->post('kondisi') ,
                      'diberikan_oleh' => $this->input->post('sender'),
                      'penerima' => $this->input->post('penerima') ,
                      'keterangan' => $this->input->post('keterangan'));
        $this->staff_model->tambah_penerimaan($data);
        echo "<script>alert('Data Penerimaan Berhasil Ditambahkan !');document.location.href='penerimaanbarang';</script>";
	}
    
    public function proses_updatepenerimaan()
	{
		$id['kd_penerimaan'] = $this->input->post('kd_penerimaan');
        $tgl=$this->input->post('tgl_terima');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_terima=implode("-",$arr);
		$data = array('tgl_penerimaan' => $tgl_terima ,
                      'kd_petugas' =>$this->session->userdata('kode_petugas'),
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'kd_unit' => $this->input->post('kd_unit') ,
                      'jml_brg_diterima' => $this->input->post('jml_diterima'),
                      'satuan' => $this->input->post('satuan') ,
                      'kondisi' => $this->input->post('kondisi') ,
                      'diberikan_oleh' => $this->input->post('sender'),
                      'penerima' => $this->input->post('penerima') ,
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->update_penerimaan($data,$id);
		echo "<script>alert('Data Penerimaan Berhasil Diubah !');document.location.href='penerimaanbarang';</script>";
	}
    
    public function delete_penerimaan($id)
	{
        $this->staff_model->delete_penerimaan($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/penerimaanbarang','refresh');
	}
//=============================================================================
//================== Controller Penyerahan ===================================
    public function penyerahanbarang() {
        $config['base_url'] = base_url().'staff/penyerahanbarang';
        $config['total_rows'] = $this->staff_model->total_penyerahan();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->penyerahan_limit($config['per_page'],$start)->result();
        $dtsp['pagination'] = $this->pagination->create_links();
        $dtsp['start'] = $start;
        $dtsp['rows'] = $rows;
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $dtsp['barang'] = $this->staff_model->tampil_data_barang();
        $dtsp['data'] = $this->staff_model->tampil_penyerahan();
        $this->load->view('penyerahan_barang/content_penyerahan',$dtsp);
    }

     public function detailpenyerahanbarang($id) {
        $config['base_url'] = base_url().'staff/detailpenyerahanbarang/'.$id;
        $config['total_rows'] = $this->staff_model->total_detailpenyerahan($id);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(4, 0);
        $rows = $this->staff_model->detailpenyerahanlimit($config['per_page'],$start,$id)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['penerimaan'] = $this->staff_model->tampil_penerimaan();
        $data_b['data'] = $this->staff_model->tampil_penyerahan();
        $data_b['id'] = $id;
        $this->load->view('penyerahan_barang/content_detailpenyerahan',$data_b);      
    }

    public function autocomppenyerahan(){
        $keyword = $this->uri->segment(3);

        //$data = $this->db->from('tb_barang')->like('nm_barang',$keyword)->get();
        $data = $this->db->select('kd_inventaris')->from('tb_inventaris_barang')->order_by('kd_inventaris','ASC')->get();

        foreach($data->result() as $row)
        {
            $new_array = $this->db->query
            ("SELECT * FROM tb_inventaris_barang ORDER BY kd_inventaris DESC limit 1");
            $dt = $new_array->row_array();
            $jmldt = $new_array->num_rows();
            $stkawl = $dt['stok_awal'];
            $stkakr = $dt['stok_akhir'];
            $kdbrg = $dt['kd_barang'];
            $qnmbrg = $this->db->query
            ("SELECT nm_barang FROM tb_barang where kd_barang = '$kdbrg' limit 1");
            $dnmbrg = $qnmbrg->row_array();
            $nmbrg = $dnmbrg['nm_barang'];
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' =>$row->kd_inventaris.' - '.$nmbrg,
                'kd_barang' =>$kdbrg,
                'kd_invent' =>$row->kd_inventaris,
                'stok_akhir' =>$stkakr,
                //'kd_penerimaan' =>$row->kd_penerimaan
            );
        }
        echo json_encode($arr);
    }
    
    public function tambahpenyerahan() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] = "Staff";
        $data_b['kode'] = $this->staff_model->id_penyerahan();
        //$data_b['barang'] = $this->staff_model->tampil_data_barang();
		$this->load->view('penyerahan_barang/content_tambahpenyerahan',$data_b); 
	}
    
    public function ubahpenyerahan($id) {
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $dtsp['data'] = $this->staff_model->get_detail_penyerahan($id)->row();
        $dtsp['barang'] = $this->staff_model->tampil_data_barang();
        $dtsp['unit'] = $this->staff_model->tampil_data_unit();
        $this->load->view('penyerahan_barang/content_ubahpenyerahan',$dtsp);

    }
    
    public function proses_insertpenyerahan() {
        $stokakhirsetelahditerima = ($this->input->post('stok_akhir')) - ($this->input->post('jml_diterima'));
         $tgl=$this->input->post('tgl_serah');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_serah=implode("-",$arr);
        $data = array('kd_penyerahan' => $this->input->post('kd_penerimaan') ,
                      'tgl_penyerahan' => $tgl_serah ,
                      'kd_inventaris' =>$this->input->post('kd_invent') ,
                      'kd_petugas' =>$this->session->userdata('kode_petugas') ,
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'kd_unit' => $this->input->post('kd_unit') ,
                      'jml_brg_diserahkan' => $this->input->post('jml_diterima'),
                      'satuan' => $this->input->post('satuan') ,
                      'kondisi' => $this->input->post('kondisi') ,
                      'diberikan_oleh' => $this->input->post('sender'),
                      'penerima' => $this->input->post('penerima') ,
                      'stok_akhir_gudang' => $this->input->post('stok_akhir'),
                      'stok_akhir_setelah_diterima' =>  $stokakhirsetelahditerima ,
                      'keterangan' => $this->input->post('keterangan'));
        $this->staff_model->tambah_penyerahan($data);
        echo "<script>alert('Data Penyerahan Berhasil Ditambahkan !');document.location.href='penyerahanbarang';</script>";
	}
    
    public function proses_updatepenyerahan()
	{
		$id['kd_penyerahan'] = $this->input->post('kd_penerimaan');
        $stokakhirsetelahditerima = ($this->input->post('stok_akhir')) - ($this->input->post('jml_diterima'));
         $tgl=$this->input->post('tgl_serah');
        $exp=explode("/",$tgl);
        $arr=array($exp[2],$exp[1],$exp[0]);
        $tgl_serah=implode("-",$arr);
		$data = array('tgl_penyerahan' => $tgl_serah ,
                      'kd_inventaris' =>$this->input->post('kd_invent') ,
                      'kd_petugas' =>$this->session->userdata('kode_petugas') ,
                      'kd_barang' => $this->input->post('kd_barang') ,
                      'kd_unit' => $this->input->post('kd_unit') ,
                      'jml_brg_diserahkan' => $this->input->post('jml_diterima'),
                      'satuan' => $this->input->post('satuan') ,
                      'kondisi' => $this->input->post('kondisi') ,
                      'diberikan_oleh' => $this->input->post('sender'),
                      'penerima' => $this->input->post('penerima') ,
                      'stok_akhir_gudang' => $this->input->post('stok_akhir'),
                      'stok_akhir_setelah_diterima' =>  $stokakhirsetelahditerima ,
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->update_penyerahan($data,$id);
		echo "<script>alert('Data Penerimaan Berhasil Diubah !');document.location.href='penyerahanbarang';</script>";
	}
    
     public function delete_penyerahan($id)
	{
        $this->staff_model->deletepenyerahan($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/penyerahanbarang','refresh');
	}
    
//=============================================================================
//========================= Controller Laboratorium=======================
    public function laboratorium() {
        $config['base_url'] = base_url().'staff/laboratorium';
        $config['total_rows'] = $this->staff_model->total_lab();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->lab_limit($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['lab'] = $this->staff_model->tampil_lab();
		$this->load->view('laboratorium/content_laboratorium',$data_b);      
    }
    
    public function tambahlaboratorium() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['kode'] = $this->staff_model->id_laboratorium();
		$this->load->view('laboratorium/content_tambahlab',$data_b);      
    }
    
    public function updatelaboratorium($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['lab'] = $this->staff_model->get_detail_lab($id)->row();
		$this->load->view('laboratorium/content_ubahlab',$data_ub);
	}
    
    public function proses_insertlaboratorium() {
        $data = array('kd_lab' => $this->input->post('kd_lab') ,
                      'nm_lab' => $this->input->post('nm_lab') ,
                      'kuota' => $this->input->post('kuota'));
		$this->staff_model->tambahlab($data);
        echo "<script>alert('Data Laboratorium Berhasil Ditambahkan !');document.location.href='laboratorium';</script>";
	}
    
    public function proses_updatelab()
	{
		$id['kd_lab'] = $this->input->post('kd_lab');
		$data = array('nm_lab' => $this->input->post('nm_lab') ,
                      'kuota' => $this->input->post('kuota'));
		$this->staff_model->update_lab($data,$id);
		echo "<script>alert('Data Laboratorium Berhasil Diubah !');document.location.href='laboratorium';</script>";
	}
    
    public function delete_lab($id)
	{
        $this->staff_model->delete_lab($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/laboratorium','refresh');
	}
//=============================================================================
//========================= Controller Transaksi Penempatan =======================
    public function transaksipenempatan() {
        $config['base_url'] = base_url().'staff/transaksipenempatan';
        $config['total_rows'] = $this->staff_model->total_penempatan();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->penempatan_limit($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['penempatan'] = $this->staff_model->tampil_penempatan();
        $data_b['lab'] = $this->staff_model->tampil_lab();
        $data_b['barang'] = $this->staff_model->tampil_data_barang();
		$this->load->view('transaksi_penempatan/content_transaksipenempatan',$data_b);      
    }
    
    public function autocompletepenempatan(){
		$keyword = $this->uri->segment(3);

        $data = $this->db->select('i.kd_inventaris, b.nm_barang')
              ->from('tb_inventaris_barang i')
              ->join('tb_barang b', 'i.kd_barang = b.kd_barang', 'inner')
              ->like('nm_barang',$keyword)->get();
        
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nm_barang,
				'kd_inventaris'	=>$row->kd_inventaris
			);
		}
		echo json_encode($arr);
	}
    
    public function tambahtransaksipenempatan() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['kode'] = $this->staff_model->id_penempatan();
        $data_b['lab'] = $this->staff_model->tampil_lab();
		$this->load->view('transaksi_penempatan/content_tambahpenempatan',$data_b);      
    }
    
    public function proses_insertpenempatan() {
        $data = array('kd_penempatan' => $this->input->post('kd_penempatn') ,
                      'tgl_penempatan' => $this->input->post('tgl_pnmpt') ,
                      'kd_lab' => $this->input->post('lokasi') ,
                      'kd_inventaris' => $this->input->post('kd_invent') ,
                      'kd_petugas' => $this->session->userdata('kode_petugas'),
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->tambah_penempatan($data);
    echo "<script>alert('Data Transaksi Penempatan Berhasil Ditambahkan !');document.location.href='transaksipenempatan';</script>";
	}
    
    public function proses_updatepenempatan(){
		$id['kd_penempatan'] = $this->input->post('kd_penempatn');
		$data = array('tgl_penempatan' => $this->input->post('tgl_pnmpt') ,
                      'kd_lab' => $this->input->post('lokasi') ,
                      'kd_inventaris' => $this->input->post('kd_invent') ,
                      'kd_petugas' => $this->session->userdata('kode_petugas'),
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->update_penempatan($data,$id);
		echo "<script>alert('Data Transaksi Penempatan Berhasil Diubah !');document.location.href='transaksipenempatan';</script>";
	}
    
    public function updatepenempatan($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['data'] = $this->staff_model->get_detail_penempatan($id)->row();
        $data_ub['ibarang'] = $this->staff_model->tampil_data_inventaris();
        $data_ub['barang'] = $this->staff_model->tampil_data_barang();
        $data_ub['lab'] = $this->staff_model->tampil_lab();
		$this->load->view('transaksi_penempatan/content_ubahtranpenempatan',$data_ub);
	}
    
    public function deletepenempatan($id)
	{
        $this->staff_model->delete_penempatan($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/transaksipenempatan','refresh');
	}
//=============================================================================
//========================= Controller Transaksi Mutasi =======================
    public function transaksimutasi() {
        $config['base_url'] = base_url().'staff/transaksimutasi';
        $config['total_rows'] = $this->staff_model->total_mutasi();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->mutasi_limit($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['mutasi'] = $this->staff_model->tampil_mutasi();
        $data_b['lab'] = $this->staff_model->tampil_lab();
        $data_b['barang'] = $this->staff_model->tampil_data_barang();
		$this->load->view('transaksi_mutasi/content_transaksimutasi',$data_b);      
    }
    
     public function tambahtransmutasi() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['kode'] = $this->staff_model->id_mutasi();
        $data_b['lab'] = $this->staff_model->tampil_lab();
		$this->load->view('transaksi_mutasi/content_tambahmutasi',$data_b);      
    }
    
    public function updatemutasi($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['data'] = $this->staff_model->get_detail_mutasi($id)->row();
        $data_ub['ibarang'] = $this->staff_model->tampil_data_inventaris();
        $data_ub['barang'] = $this->staff_model->tampil_data_barang();
        $data_ub['lab'] = $this->staff_model->tampil_lab();
		$this->load->view('transaksi_mutasi/content_ubahtranmutasi',$data_ub);
	}
    
  public function proses_insertmutasi() {
        $data = array('no_mutasi' => $this->input->post('kd_penempatn') ,
                      'tgl_mutasi' => $this->input->post('tgl_pnmpt') ,
                      'kd_lab' => $this->input->post('lokasi') ,
                      'kd_inventaris' => $this->input->post('kd_invent') ,
                      'kd_petugas' => $this->session->userdata('kode_petugas'),
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->tambah_mutasi($data);
    echo "<script>alert('Data Transaksi Mutasi Berhasil Ditambahkan !');document.location.href='transaksimutasi';</script>";
	}
    
    public function prose_updatemutasi()
	{
		$id['no_mutasi'] = $this->input->post('kd_penempatn');
		$data = array('tgl_mutasi' => $this->input->post('tgl_pnmpt') ,
                      'kd_lab' => $this->input->post('lokasi') ,
                      'kd_inventaris' => $this->input->post('kd_invent') ,
                      'kd_petugas' => $this->session->userdata('kode_petugas'),
                      'keterangan' => $this->input->post('keterangan'));
		$this->staff_model->update_mutasi($data,$id);
		echo "<script>alert('Data Transaksi Mutasi Berhasil Diubah !');document.location.href='transaksimutasi';</script>";
	}
    
  public function deletemutasi($id)
	{
        $this->staff_model->delete_mutasi($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
		redirect('staff/transaksimutasi','refresh');
	}
//=============================================================================
//========================== Manajemen User ===================================
  public function manajemenuser() {
    $config['base_url'] = base_url().'staff/manajemenuser';
    $config['total_rows'] = $this->staff_model->total_user();
    $config['per_page'] = 10;
    $config['uri_segment'] = 3;
    $this->pagination->initialize($config); 
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = round($choice);
    $start = $this->uri->segment(3, 0);
    $rows = $this->staff_model->user_limit($config['per_page'],$start)->result();
    $data_b['pagination'] = $this->pagination->create_links();
    $data_b['start'] = $start;
    $data_b['rows'] = $rows;
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff";
    $data_b['user'] = $this->staff_model->tampil_data_user();
    $this->load->view('manajemen_user/content_manajemenuser',$data_b);
  }

  public function tambahuser() {
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff";   
    $data_b['kode'] = $this->staff_model->id_user();
    $this->load->view('manajemen_user/content_tambahuser',$data_b);      
  }

  public function updateuser($id) {
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff";
    $data_b['user'] = $this->staff_model->tampil_data_user();   
    $data_b['data'] = $this->staff_model->get_detail_user($id)->row();
    $this->load->view('manajemen_user/content_updateuser',$data_b);      
  }

  public function proses_insertuser() {
    $data = array('kd_petugas' => $this->input->post('kd_petugas') ,
                  'nm_petugas' => $this->input->post('username') ,
                  'jabatan' => $this->input->post('jabatan') ,
                  'password' => md5($this->input->post('password')));
    $this->staff_model->tambah_user($data);
    echo "<script>alert('User Baru Berhasil Ditambahkan !');document.location.href='manajemenuser';</script>";
  }

  public function proses_updateuser()
  {
    $id['kd_petugas'] = $this->input->post('kd_petugas');
    $data = array('nm_petugas' => $this->input->post('username') ,
                  'jabatan' => $this->input->post('jabatan') ,
                  'password' => md5($this->input->post('password')));
    $this->staff_model->update_user($data,$id);
    echo "<script>alert('Data User Berhasil Diubah !');document.location.href='manajemenuser';</script>";
  }

  public function deleteuser($id)
  {
        $this->staff_model->delete_user($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
    redirect('staff/manajemenuser','refresh');
  }
//=============================================================================
//========================== Mastering Taahun ===================================
  public function tampiltahun() {
    $config['base_url'] = base_url().'staff/tampiltahun';
    $config['total_rows'] = $this->staff_model->total_tahun();
    $config['per_page'] = 10;
    $config['uri_segment'] = 3;
    $this->pagination->initialize($config); 
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = round($choice);
    $start = $this->uri->segment(3, 0);
    $rows = $this->staff_model->tahun_limit($config['per_page'],$start)->result();
    $data_b['pagination'] = $this->pagination->create_links();
    $data_b['start'] = $start;
    $data_b['rows'] = $rows;
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff";
    // $data_b['user'] = $this->staff_model->tampil_data_user();
    $this->load->view('tahun/content_tahun',$data_b);
  }

  public function tambahtahun() {
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff";   
    $data_b['kode'] = $this->staff_model->id_tahun();
    $this->load->view('tahun/content_tambahtahun',$data_b);      
  }

  public function updatetahun($id) {
    $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
    $data_b['jabatan'] ="Staff"; 
    $data_b['data'] = $this->staff_model->get_detail_tahun($id)->row();
    $this->load->view('tahun/content_ubahtahun',$data_b);      
  }

  public function proses_insertahun() {
    if($this->input->post('status')==1){
        $new_array = $this->db->query("SELECT status FROM tb_tahun where status='1'");
        $jmldt = $new_array->num_rows();
        if($jmldt!=0){
        echo "<script>alert('Tahun Ajaran lain masih aktif !');document.location.href='tambahtahun';</script>";
        }
    else{
         $data = array('id_tahun' => $this->input->post('id_tahun') ,
                  'tahun_ajaran' => $this->input->post('thn_ajaran') ,
                  'semester' => $this->input->post('semester') ,
                  'status' => $this->input->post('status'));
        $this->staff_model->tambahtahun($data);
        echo "<script>alert('Tahun Ajaran Berhasil Ditambahkan !');document.location.href='tampiltahun';</script>";

        }
    }
    else {
         $data = array('id_tahun' => $this->input->post('id_tahun') ,
                  'tahun_ajaran' => $this->input->post('thn_ajaran') ,
                  'semester' => $this->input->post('semester') ,
                  'status' => $this->input->post('status'));
        $this->staff_model->tambahtahun($data);
        echo "<script>alert('Tahun Ajaran Berhasil Ditambahkan !');document.location.href='tampiltahun';</script>";
    }
  }

  public function proses_updatetahun(){
     $idt = $this->input->post('idtahun');
     $t_array = $this->db->query("SELECT status FROM tb_tahun where id_tahun = '$idt'");
     $dt = $t_array->row_array();
     $stat = $dt['status'];
     if(($this->input->post('status')==1) && ($stat!=1)){
        $new_array = $this->db->query("SELECT status FROM tb_tahun where status='1'");
        $jmldt = $new_array->num_rows();
        if($jmldt!=0){
        echo "<script>alert('Tahun Ajaran lain masih aktif !');document.location.href='tampiltahun';</script>";
        }
    else{
        $id['id_tahun'] = $this->input->post('idtahun');
        $data = array('tahun_ajaran' => $this->input->post('tahun_ajaran') ,
                      'semester' => $this->input->post('semester') ,
                      'status' => $this->input->post('status'));
        $this->staff_model->update_tahun($data,$id);
        echo "<script>alert('Data Tahun Berhasil Diubah !');document.location.href='tampiltahun';</script>";
        }
    }
    else {
        $id['id_tahun'] = $this->input->post('idtahun');
        $data = array('tahun_ajaran' => $this->input->post('tahun_ajaran') ,
                      'semester' => $this->input->post('semester') ,
                      'status' => $this->input->post('status'));
        $this->staff_model->update_tahun($data,$id);
        echo "<script>alert('Data Tahun Berhasil Diubah !');document.location.href='tampiltahun';</script>";
    }
  }

  public function deletetahun($id)
  {
        $this->staff_model->delete_tahun($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
    redirect('staff/tampiltahun','refresh');
  }
//=============================================================================
//========================= Controller Jadwal=======================
    public function jadwal() {
        $config['base_url'] = base_url().'staff/jadwal';
        $config['total_rows'] = $this->staff_model->total_jadwal();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $start = $this->uri->segment(3, 0);
        $rows = $this->staff_model->limit_jadwal($config['per_page'],$start)->result();
        $data_b['pagination'] = $this->pagination->create_links();
        $data_b['start'] = $start;
        $data_b['rows'] = $rows;
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";
        $data_b['lab'] = $this->staff_model->tampil_jadwal();
        $data_b['tahun'] = $this->staff_model->tampil_data_tahun();
        $this->load->view('jadwalmaintenance/content_jadwal',$data_b);      
    }
    
    public function tambahjadwal() {
        $data_b['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_b['jabatan'] ="Staff";   
        $data_b['kode'] = $this->staff_model->id_jadwal();
         $data_b['tahun'] = $this->staff_model->tampil_data_tahun();
        $this->load->view('jadwalmaintenance/content_tambahjadwal',$data_b);      
    }
    
    public function updatejadwal($id) {
        $data_ub['nama_petugas'] = $this->session->userdata('nama_petugas');
        $data_ub['jabatan'] = "Staff";
        $data_ub['jadwal'] = $this->staff_model->get_detail_jadwal($id)->row();
        $data_ub['tahun'] = $this->staff_model->tampil_data_tahun();
        $this->load->view('jadwalmaintenance/content_ubahjadwal',$data_ub);
    }
    
    public function proses_insertjadwal() {
        $batas = $this->input->post('batas');
        if((substr($batas,0,2)) < 10 ){
             $batasawal = substr($batas,0,8);
             $batasakhir = substr($batas,11,10);
        }
        else {  $batasawal = substr($batas,0,9); $batasakhir = substr($batas,12,11); }
        $ex1=explode("/",$batasawal);
        $arr1=array($ex1[2],$ex1[1],$ex1[0]);
        $tgl_awal=implode("-",$arr1);

        
        $ex2=explode("/",$batasakhir);
        $arr2=array($ex2[2],$ex2[1],$ex2[0]);
        $tgl_akhir=implode("-",$arr2);
        // echo $batasawal;
        $data = array('kd_jadwal' => $this->input->post('id_jadwal') ,
                      'maintenance_ke' => $this->input->post('maintenanceke') ,
                      'batas_tgl_awal' => $tgl_awal ,
                      'batas_tgl_akhir' => $tgl_akhir ,
                      'tahun' => $this->input->post('tahun'));
        $this->staff_model->tambahjadwal($data);
        echo "<script>alert('Data Jadwal Berhasil Ditambahkan !');document.location.href='jadwal';</script>";
    }
    
    public function proses_updatejadwal(){
        if(($this->input->post('batas'))==($this->input->post('tgl_dflt'))){
            $batas = $this->input->post('batas');
            $batasawal = substr($batas,0,10);
            $batasakhir = substr($batas,13,11);
            $ex1=explode("/",$batasawal);
            $arr1=array($ex1[2],$ex1[1],$ex1[0]);
            $tgl_awal=implode("-",$arr1);
            $ex2=explode("/",$batasakhir);
            $arr2=array($ex2[2],$ex2[1],$ex2[0]);
            $tgl_akhir=implode("-",$arr2);
        }
        else {
            $batas = $this->input->post('batas');
            if((substr($batas,0,2)) < 10 ){
                 $batasawal = substr($batas,0,8);
                 $batasakhir = substr($batas,11,10);
            }
            else { $batasawal = substr($batas,0,9); $batasakhir = substr($batas,12,11); }
            $ex1=explode("/",$batasawal);
            $arr1=array($ex1[2],$ex1[1],$ex1[0]);
            $tgl_awal=implode("-",$arr1);
            $ex2=explode("/",$batasakhir);
            $arr2=array($ex2[2],$ex2[1],$ex2[0]);
            $tgl_akhir=implode("-",$arr2);
        }

        $id['kd_jadwal'] = $this->input->post('id_jadwal');
        $data = array('maintenance_ke' => $this->input->post('maintenanceke') ,
                      'batas_tgl_awal' => $tgl_awal ,
                      'batas_tgl_akhir' => $tgl_akhir ,
                      'tahun' => $this->input->post('tahun'));
        $this->staff_model->update_jadwal($data,$id);
        echo "<script>alert('Data Jadwal Berhasil Diubah !');document.location.href='jadwal';</script>";
    }
    
    public function delete_jadwal($id)
    {
        $this->staff_model->delete_jadwal($id);
        echo"<script>alert('Data Berhasil Dihapus');</script>";
        redirect('staff/jadwal','refresh');
    }
//=============================================================================
//=============================================================================
  public function laporanpenerimaanpertahun() {
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $tahun = $this->uri->segment(3);
        if(empty($tahun)){
            $dtsp['data'] = $this->staff_model->view_laporanpenerimaanall();
        }else{
            $dtsp['data'] = $this->staff_model->view_laporanpenerimaanpertahun($tahun);
        }
        $this->load->view('laporan/report_penerimaanpertahun',$dtsp);
    }

    public function laporanpenerimaanperbulan() {
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        $tahun = $this->uri->segment(3);
        $bulan = $this->uri->segment(4);
        if(empty($tahun && $bulan)){
            $dtsp['data'] = "";
        }else{
            $dtsp['data'] = $this->staff_model->view_laporanpenerimaanperbulan($tahun,$bulan);
        }
        $this->load->view('laporan/report_penerimaanperbulan',$dtsp);
    }

public function redirectpnerimaanbulan() {
    $thn = $this->input->post('cbTahun');
    $bln =  $this->input->post('cboxbulan') ;
    redirect("staff/laporanpenerimaanperbulan/".$thn."/".$bln."");
}

public function laporanpenyerahanpertahun() {
        $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
        $dtsp['jabatan'] = "Staff";
        // $tahun = $this->uri->segment(3);
        // if(empty($tahun)){
        //     $dtsp['data'] = $this->staff_model->view_laporanpenerimaanall();
        // }else{
        //     $dtsp['data'] = $this->staff_model->view_laporanpenerimaanpertahun($tahun);
        // }
        $this->load->view('laporan/report_penyerahanpertahun',$dtsp);
    }


 public function cetakpenerimaanpertahun() {
    $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
    $dtsp['jabatan'] = "Staff";
    $tahun = $this->uri->segment(3);
        if(empty($tahun)){
            $dtsp['data'] = $this->staff_model->print_alllaporanpenerimaanpertahun();
        }else{
            $dtsp['data'] = $this->staff_model->print_laporanpenerimaanpertahun($tahun);
        }
    $this->load->helper('dompdf');
    $html = $this->load->view('laporan/print_penerimaanpertahun', $dtsp, true);
    if(empty($tahun)){ $filename = 'Semua Laporan Penerimaan'; }
    else {  $filename = 'Laporan Penerimaan Tahun '.$tahun; }
    $paper = 'legal';
    $orientation = 'landscape';
    pdf_create($html, $filename, $paper, $orientation);
    }

 public function cetakpenerimaanperbulan() {
    $dtsp['nama_petugas'] = $this->session->userdata('nama_petugas');
    $dtsp['jabatan'] = "Staff";
    $tahun = $this->uri->segment(3);
    $bulan = $this->uri->segment(4);
        if(empty($tahun && $bulan)){
            $dtsp['data'] = "";
        }else{
            $dtsp['data'] = $this->staff_model->print_laporanpenerimaanperbulan($tahun,$bulan);
        }
    $this->load->helper('dompdf');
    $html = $this->load->view('laporan/print_penerimaanperbulan', $dtsp, true);
    if(empty($tahun)){ $filename = 'Semua Laporan Penerimaan'; }
    else {  $filename = 'Laporan Penerimaan Bulan'.$bulan.'  Tahun '.$tahun; }
    $paper = 'legal';
    $orientation = 'landscape';
    pdf_create($html, $filename, $paper, $orientation);
    }

//================================================
}
?>