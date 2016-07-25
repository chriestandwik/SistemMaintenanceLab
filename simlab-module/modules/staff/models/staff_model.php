<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_model extends CI_Model{

    //========== Model db kategori =======================================================
    function tampil_data_kategori()
    {
        $query=$this->db->query("SELECT * FROM tb_kategori ORDER BY kd_kategori ASC");
        return $query->result();
    }
    
    public function get_detail_kategori($id){
		return $this->db->get_where('tb_kategori', array('kd_kategori' => $id));
	}

    public function total_kategori() {
        $this->db->from('tb_kategori');
        return $this->db->count_all_results();
    }
 
    public function kategori_limit($limit, $start = 0) {
        $this->db->order_by('kd_kategori', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_kategori');
    }

    function id_kategori(){
        $this->db->select('RIGHT(tb_kategori.kd_kategori,3) as kode', FALSE);
        $this->db->order_by('kd_kategori','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_kategori');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "KTB".$kodemax;
        return $kodejadi;
    }
    
    public function update_kategori($data,$id){
		$this->db->update("tb_kategori",$data,$id);
	}
    
    public function delete_kategori($id){
		$this->db->where('kd_kategori', $id);
		$this->db->delete('tb_kategori'); 
	}

	public function tambah_kategori($data){
		$this->db->insert('tb_kategori', $data); 
	}
    
    //========================================================================================
    //========== Model db Unit =======================================================
    
    function tampil_data_unit()
    {
        $query=$this->db->query("SELECT * FROM tb_unit ORDER BY kd_unit ASC");
        return $query->result();
    }
    
    public function get_detail_unit($id){
		return $this->db->get_where('tb_unit', array('kd_unit' => $id));
	}

     public function total_unit() {
        $this->db->from('tb_unit');
        return $this->db->count_all_results();
    }
 
    public function unit_limit($limit, $start = 0) {
        $this->db->order_by('kd_unit', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_unit');
    }
    
    function id_unit(){
        $this->db->select('RIGHT(tb_unit.kd_unit,3) as kode', FALSE);
        $this->db->order_by('kd_unit','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_unit');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "UN".$kodemax;
        return $kodejadi;
    }
    
    public function tambah_unit($data){
		$this->db->insert('tb_unit', $data); 
	}
    
    public function update_unit($data,$id){
		$this->db->update("tb_unit",$data,$id);
	}
    
    public function delete_unit($id){
		$this->db->where('kd_unit', $id);
		$this->db->delete('tb_unit'); 
	}

    
    //========================================================================================
    //========== Model db barang =======================================================
    
    function tampil_data_barang()
    {
        $query=$this->db->query("SELECT s.kd_barang, k.nm_kategori, s.nm_barang, s.satuan FROM tb_barang s inner join tb_kategori k on s.kd_kategori = k.kd_kategori");
        return $query->result();
    }

    public function total_barang() {
        $this->db->select('s.kd_barang, k.nm_kategori, s.nm_barang, s.satuan');
        $this->db->from('tb_barang s');
        $this->db->join('tb_kategori k', 's.kd_kategori = k.kd_kategori','inner');
        return $this->db->count_all_results();
    }
 
    public function barang_limit($limit, $start = 0) {
        $this->db->select('s.kd_barang, k.nm_kategori, s.nm_barang, s.satuan');
        $this->db->from('tb_barang s');
        $this->db->join('tb_kategori k', 's.kd_kategori = k.kd_kategori','inner');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    public function get_detail_barang($id){
		return $this->db->get_where('tb_barang', array('kd_barang' => $id));
	}
    
    function id_barang(){
        $this->db->select('RIGHT(tb_barang.kd_barang,3) as kode', FALSE);
        $this->db->order_by('kd_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_barang');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "BRG".$kodemax;
        return $kodejadi;
    }
    
    public function tambah_barang($data){
		$this->db->insert('tb_barang', $data); 
	}
    
    public function update_barang($data,$id){
		$this->db->update("tb_barang",$data,$id);
	}
    
    public function delete_barang($id){
		$this->db->where('kd_barang', $id);
		$this->db->delete('tb_barang'); 
	}

    
    //========================================================================================
    //======================== Model Penerimaan Barang =======================================
    function tampil_penerimaan()
    {
         $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,
         p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit");
        return $query->result();
    }

     public function total_penerimaan() {
        $this->db->select('p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,
         p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit');
        $this->db->from('tb_penerimaan p');
        $this->db->join('tb_barang b', 'p.kd_barang = b.kd_barang','inner');
        $this->db->join('tb_unit u', 'p.kd_unit=u.kd_unit','inner');
        return $this->db->count_all_results();
    }
 
    public function penerimaan_limit($limit, $start = 0) {
        $this->db->select('p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,
        p.diberikan_oleh,p.penerima,p.keterangan,b.kd_barang,b.nm_barang,u.nm_unit');
        $this->db->from('tb_penerimaan p');
        $this->db->join('tb_barang b', 'p.kd_barang = b.kd_barang','inner');
        $this->db->join('tb_unit u', 'p.kd_unit=u.kd_unit','inner');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    public function get_detail_penerimaan($id){
		return $this->db->get_where('tb_penerimaan', array('kd_penerimaan' => $id));
	}
    
    function id_penerimaan(){
        $this->db->select('substr(tb_penerimaan.kd_penerimaan,5,4) as kode', FALSE);
        $this->db->order_by('kd_penerimaan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_penerimaan');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $t_array = $this->db->query("SELECT year(tgl_penerimaan) as tahun  FROM tb_penerimaan ORDER BY kd_penerimaan DESC limit 1");
        $dt = $t_array->row_array();
        $tgldb = $dt['tahun'];
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "PNR-".$kodemax."-".$tgldb;
        return $kodejadi;
    }
    
    public function tambah_penerimaan($data){
		$this->db->insert('tb_penerimaan', $data); 
	}
    
    public function update_penerimaan($data,$id){
		$this->db->update("tb_penerimaan",$data,$id);
	}
    
    public function delete_penerimaan($id){
		$this->db->where('kd_penerimaan', $id);
		$this->db->delete('tb_penerimaan'); 
	}
//=========================================================================================
//======================== Model Penyerahan Barang =======================================
    function tampil_penyerahan()
    {
         $query=$this->db->query("SELECT p.kd_penyerahan,p.tgl_penyerahan,p.kd_petugas,p.jml_brg_diserahkan,p.satuan,p.kondisi,
         p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penyerahan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit");
        return $query->result();
    }

    public function total_penyerahan() {
        $this->db->distinct()->select('kd_barang');
        $this->db->from('tb_inventaris_barang');
        return $this->db->count_all_results();
    }
 
    public function penyerahan_limit($limit, $start = 0) {
        $this->db->distinct()->select('kd_barang');
        $this->db->from('tb_inventaris_barang');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

     public function total_detailpenyerahan($id) {
        $this->db->select('*');
        $this->db->from('tb_penyerahan');
        $this->db->where('kd_barang',$id);
        return $this->db->count_all_results();
    }

     public function detailpenyerahanlimit($limit, $start = 0,$id) {
        $this->db->select('*');
        $this->db->from('tb_penyerahan');
        $this->db->where('kd_barang',$id);
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
     public function get_detail_penyerahan($id){
		return $this->db->get_where('tb_penyerahan', array('kd_penyerahan' => $id));
	}
    
    function id_penyerahan(){
        $this->db->select('RIGHT(tb_penyerahan.kd_penyerahan,3) as kode', FALSE);
        $this->db->order_by('kd_penyerahan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_penyerahan');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "BK".$kodemax;
        return $kodejadi;
    }
    
    public function tambah_penyerahan($data){
		$this->db->insert('tb_penyerahan', $data); 
	}
    
    public function update_penyerahan($data,$id){
		$this->db->update("tb_penyerahan",$data,$id);
	}
    
    public function deletepenyerahan($id){
		$this->db->where('kd_penyerahan', $id);
		$this->db->delete('tb_penyerahan'); 
	}
//=========================================================================================
//============== Model Inventaris Barang ==================================================
    
    function tampil_data_inventaris()
    {
        $query=$this->db->query("SELECT * FROM tb_inventaris_barang ORDER BY kd_inventaris ASC");
        return $query->result();
    }

    public function detailinventaris($id){
        return $this->db->get_where('tb_inventaris_barang', array('kd_penerimaan' => $id));
    }

    public function total_data_total_inventaris(){
        $this->db->distinct()->select('kd_barang');
        $this->db->from('tb_penerimaan');
       return $this->db->count_all_results();
    }

    public function limit_data_total_inventaris($limit, $start = 0){
        $this->db->select('p.kd_penerimaan,p.kd_petugas,p.jml_brg_diterima,SUM(p.jml_brg_diterima) as totalakhir,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,b.kd_barang,u.nm_unit');
        $this->db->from('tb_penerimaan p');
        $this->db->join('tb_barang b', 'p.kd_barang = b.kd_barang','inner');
        $this->db->join('tb_unit u', 'p.kd_unit=u.kd_unit','inner');
        $this->db->group_by('p.kd_barang');
        $this->db->limit($limit, $start);
       return $this->db->get();
    }

    //public function total_inventaris() {
       // $this->db->from('tb_inventaris_barang');
        //return $this->db->count_all_results();
    // }

    public function total_inventaris($id) {
        $this->db->select('*');
        $this->db->from('tb_inventaris_barang');
        $this->db->where('kd_penerimaan',$id);
        return $this->db->count_all_results();
    }
 
    //public function inventaris_limit($limit, $start = 0) {
       // $this->db->order_by('kd_inventaris', 'ASC');
        //$this->db->limit($limit, $start);
        //return $this->db->get('tb_inventaris_barang');
    //}

    public function inventaris_limit($limit, $start = 0,$id) {
        $this->db->select('*');
        $this->db->from('tb_inventaris_barang');
        $this->db->where('kd_penerimaan',$id);
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    public function get_detail_inventaris($id){
		return $this->db->get_where('tb_inventaris_barang', array('kd_inventaris' => $id));
	}
    
    function id_inventarisbarang(){
        $this->db->select('RIGHT(tb_inventaris_barang.kd_inventaris,6) as kode', FALSE);
        $this->db->order_by('kd_inventaris','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_inventaris_barang');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $new_array = $this->db->query("SELECT YEAR(tgl_inventaris) As tahun FROM tb_inventaris_barang ORDER BY kd_inventaris DESC limit 1");
        $dt = $new_array->row_array();
        $tgldb = $dt['tahun'];;
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "INV-".$kodemax."-".$tgldb;
        return $kodejadi;
    }
        
    public function tambahinventaris($data){
		$this->db->insert('tb_inventaris_barang', $data); 
	}
    
    public function update_inventaris($data,$id){
		$this->db->update("tb_inventaris_barang",$data,$id);
	}
    
    public function delete_inventaris($id){
		$this->db->where('kd_inventaris', $id);
		$this->db->delete('tb_inventaris_barang'); 
	}
//==============================================================================================
//============== Model Penempatan ==============================================================
    function tampil_penempatan()
    {
        $query=$this->db->query("SELECT a.kd_penempatan,a.tgl_penempatan,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan
FROM tb_penempatan a inner join tb_lab b on a.kd_lab = b.kd_lab inner join tb_inventaris_barang c on a.kd_inventaris=c.kd_inventaris ORDER BY kd_penempatan ASC");
        return $query->result();
    }

    public function total_penempatan() {
        $this->db->select('a.kd_penempatan,a.tgl_penempatan,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan,c.kd_inventaris');
        $this->db->from('tb_penempatan a');
        $this->db->join('tb_lab b', 'a.kd_lab = b.kd_lab','inner');
        $this->db->join('tb_inventaris_barang c', 'a.kd_inventaris=c.kd_inventaris','inner');
        return $this->db->count_all_results();
    }
 
    public function penempatan_limit($limit, $start = 0) {
        $this->db->select('a.kd_penempatan,a.tgl_penempatan,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan,c.kd_inventaris');
        $this->db->from('tb_penempatan a');
        $this->db->join('tb_lab b', 'a.kd_lab = b.kd_lab','inner');
        $this->db->join('tb_inventaris_barang c', 'a.kd_inventaris=c.kd_inventaris','inner');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    public function get_detail_penempatan($id){
		return $this->db->get_where('tb_penempatan', array('kd_penempatan' => $id));
	}
    
    function id_penempatan(){
        $this->db->select('RIGHT(tb_penempatan.kd_penempatan,3) as kode', FALSE);
        $this->db->order_by('kd_penempatan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_penempatan');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "TPN".$kodemax;
        return $kodejadi;
    }
    
    public function tambah_penempatan($data){
		$this->db->insert('tb_penempatan', $data); 
	}
    
    public function update_penempatan($data,$id){
		$this->db->update("tb_penempatan",$data,$id);
	}
    
    public function delete_penempatan($id){
		$this->db->where('kd_penempatan', $id);
		$this->db->delete('tb_penempatan'); 
	}
    
//==============================================================================================
//============== Model Mutasi ==============================================================
    function tampil_mutasi()
    {
        $query=$this->db->query("SELECT a.no_mutasi,a.tgl_mutasi,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan
FROM tb_mutasi a inner join tb_lab b on a.kd_lab = b.kd_lab inner join tb_inventaris_barang c on a.kd_inventaris=c.kd_inventaris ORDER BY no_mutasi ASC");
        return $query->result();
    }

    public function total_mutasi() {
        $this->db->select('a.no_mutasi,a.tgl_mutasi,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan,c.kd_inventaris');
        $this->db->from('tb_mutasi a');
        $this->db->join('tb_lab b', 'a.kd_lab = b.kd_lab','inner');
        $this->db->join('tb_inventaris_barang c', 'a.kd_inventaris=c.kd_inventaris','inner');
        return $this->db->count_all_results();
    }
 
    public function mutasi_limit($limit, $start = 0) {
        $this->db->select('a.no_mutasi,a.tgl_mutasi,b.nm_lab,c.kd_barang,a.kd_petugas,a.keterangan,c.kd_inventaris');
        $this->db->from('tb_mutasi a');
        $this->db->join('tb_lab b', 'a.kd_lab = b.kd_lab','inner');
        $this->db->join('tb_inventaris_barang c', 'a.kd_inventaris=c.kd_inventaris','inner');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    public function get_detail_mutasi($id){
		return $this->db->get_where('tb_mutasi', array('no_mutasi' => $id));
	}
    
    function id_mutasi(){
        $this->db->select('RIGHT(tb_mutasi.no_mutasi,3) as kode', FALSE);
        $this->db->order_by('no_mutasi','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_mutasi');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "TMT".$kodemax;
        return $kodejadi;
    }
    
    public function tambah_mutasi($data){
		$this->db->insert('tb_mutasi', $data); 
	}
    
    public function update_mutasi($data,$id){
		$this->db->update("tb_mutasi",$data,$id);
	}
    
    public function delete_mutasi($id){
		$this->db->where('no_mutasi', $id);
		$this->db->delete('tb_mutasi'); 
	}
    
//==============================================================================================
//============== Model Labortorium =============================================================
    function tampil_lab()
    {
        $query=$this->db->query("SELECT * FROM tb_lab ORDER BY kd_lab ASC");
        return $query->result();
    }

    public function total_lab() {
        $this->db->from('tb_lab');
        return $this->db->count_all_results();
    }
 
    public function lab_limit($limit, $start = 0) {
        $this->db->order_by('kd_lab', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_lab');
    }
    
    public function get_detail_lab($id){
		return $this->db->get_where('tb_lab', array('kd_lab' => $id));
	}
    
    public function tambahlab($data){
		$this->db->insert('tb_lab', $data); 
	}
    
   function id_laboratorium(){
        $this->db->select('RIGHT(tb_lab.kd_lab,3) as kode', FALSE);
        $this->db->order_by('kd_lab','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_lab');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "LAB".$kodemax;
        return $kodejadi;
    }
    
    public function update_lab($data,$id){
		$this->db->update("tb_lab",$data,$id);
	}
    
    public function delete_lab($id){
		$this->db->where('kd_lab', $id);
		$this->db->delete('tb_lab'); 
	}
//==============================================================================================
//========================== Model Manajemen User  =============================================
    function tampil_data_user()
    {
        $query=$this->db->query("SELECT * FROM tb_petugas ORDER BY kd_petugas ASC");
        return $query->result();
    }

    public function total_user() {
        $this->db->from('tb_petugas');
        return $this->db->count_all_results();
    }
 
    public function user_limit($limit, $start = 0) {
        $this->db->order_by('kd_petugas', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_petugas');
    }

    public function get_detail_user($id){
        return $this->db->get_where('tb_petugas', array('kd_petugas' => $id));
    }

    function id_user(){
        $this->db->select('RIGHT(tb_petugas.kd_petugas,3) as kode', FALSE);
        $this->db->order_by('kd_petugas','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_petugas');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "P".$kodemax;
        return $kodejadi;
    }

    public function tambah_user($data){
        $this->db->insert('tb_petugas', $data); 
    }

    public function update_user($data,$id){
        $this->db->update("tb_petugas",$data,$id);
    }
    
    public function delete_user($id){
        $this->db->where('kd_petugas', $id);
        $this->db->delete('tb_petugas'); 
    }
    
//==============================================================================================
//============== Model Tahun =============================================================
    function tampil_data_tahun()
    {
        $query=$this->db->query("SELECT * FROM tb_tahun ORDER BY id_tahun ASC");
        return $query->result();
    }

    public function total_tahun() {
        $this->db->from('tb_tahun');
        return $this->db->count_all_results();
    }
 
    public function tahun_limit($limit, $start = 0) {
        $this->db->order_by('id_tahun', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_tahun');
    }
    
    public function get_detail_tahun($id){
        return $this->db->get_where('tb_tahun', array('id_tahun' => $id));
    }
    
    public function tambahtahun($data){
        $this->db->insert('tb_tahun', $data); 
    }
    
   function id_tahun(){
        $this->db->select('RIGHT(tb_tahun.id_tahun,3) as kode', FALSE);
        $this->db->order_by('id_tahun','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_tahun');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "thn".$kodemax;
        return $kodejadi;
    }
    
    public function update_tahun($data,$id){
        $this->db->update("tb_tahun",$data,$id);
    }
    
    public function delete_tahun($id){
        $this->db->where('id_tahun', $id);
        $this->db->delete('tb_tahun'); 
    }
//==============================================================================================
//============== Model Jadwal =============================================================
    function tampil_jadwal()
    {
        $query=$this->db->query("SELECT * FROM tb_jadwal ORDER BY kd_jadwal ASC");
        return $query->result();
    }

    public function total_jadwal() {
        $this->db->from('tb_jadwal');
        return $this->db->count_all_results();
    }
 
    public function limit_jadwal($limit, $start = 0) {
        $this->db->order_by('kd_jadwal', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get('tb_jadwal');
    }
    
    public function get_detail_jadwal($id){
        return $this->db->get_where('tb_jadwal', array('kd_jadwal' => $id));
    }
    
    public function tambahjadwal($data){
        $this->db->insert('tb_jadwal', $data); 
    }
    
   function id_jadwal(){
        $this->db->select('RIGHT(tb_jadwal.kd_jadwal,3) as kode', FALSE);
        $this->db->order_by('kd_jadwal','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_jadwal');
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            //jika kode belum ada
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "jd".$kodemax;
        return $kodejadi;
  }
    
    public function update_jadwal($data,$id){
        $this->db->update("tb_jadwal",$data,$id);
    }
    
    public function delete_jadwal($id){
        $this->db->where('kd_jadwal', $id);
        $this->db->delete('tb_jadwal'); 
    }
//==============================================================================================
//================== Laporan Penerimaan ========================================================
   function view_laporanpenerimaanpertahun($tahun)
    {
        $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit where (select year(p.tgl_penerimaan)) = '$tahun'");
        return $query->result();
    }


    function print_laporanpenerimaanpertahun($tahun)
    {
        $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit where (select year(p.tgl_penerimaan))='$tahun'");
        return $query->result();
    }

    function print_alllaporanpenerimaanpertahun()
    {
        $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit");
        return $query->result();
    }

     function view_laporanpenerimaanall()
    {
         $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,
         p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit");
        return $query->result();
    }

    function view_laporanpenerimaanperbulan($tahun,$bulan)
    {
        $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit where (select year(p.tgl_penerimaan)) = '$tahun' and (select month(p.tgl_penerimaan)) = '$bulan'");
        return $query->result();
    }

    function print_laporanpenerimaanperbulan($tahun,$bulan)
    {
        $query=$this->db->query("SELECT p.kd_penerimaan,p.tgl_penerimaan,p.kd_petugas,p.jml_brg_diterima,p.satuan,p.kondisi,p.diberikan_oleh,p.penerima,p.keterangan,b.nm_barang,u.nm_unit FROM tb_penerimaan p inner join tb_barang b on p.kd_barang = b.kd_barang inner join tb_unit u on p.kd_unit=u.kd_unit where (select year(p.tgl_penerimaan))='$tahun' and (select month(p.tgl_penerimaan)) = '$bulan'");
        return $query->result();
    }
 
}
?>