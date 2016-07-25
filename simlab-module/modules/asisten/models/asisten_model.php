<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asisten_model extends CI_Model{

    //========== Model db kategori =======================================================
    function tampil_data_kategori()
    {
        $query=$this->db->query("SELECT * FROM tb_kategori ORDER BY kd_kategori ASC");
        return $query->result();
    }

    //  function view_databarangmainten()
    // {
    //     $query=$this->db->query("SELECT * FROM tb_barang where jenis_barang='maintenance' and klasifikasi='hardware'");
    //     return $query->result();
    // }

     function view_databarangmainten()
    {
        $query=$this->db->query("SELECT a.kd_inventaris,a.kd_barang,b.nm_barang,c.kd_maintenance from tb_inventaris_barang a
inner join tb_barang b on a.kd_barang = b.kd_barang inner join tb_maintenance c on a.kd_inventaris = c.kd_inventaris group by a.kd_inventaris asc");
        return $query->result();
    }

//      function view_datainvent($id)
//     {
//         $query=$this->db->query("select a.kd_inventaris,a.kd_barang,b.nm_barang from tb_inventaris_barang a
// inner join tb_barang b on a.kd_barang = b.kd_barang order by a.kd_inventaris asc");
// return $query->result();
//     }

 function data_kondisi()
    {
        $query=$this->db->query("SELECT * from tb_maintenance");
		return $query->result();
    }

     function view_dkdmaint()
    {
        $query=$this->db->query("SELECT distinct kd_inventaris from tb_maintenance order by kd_maintenance ASC ");
		return $query->result();
    }

     function view_datamainten()
    {
        $query=$this->db->query("SELECT * FROM tb_maintenance order by kd_maintenance ASC");
        return $query->result();
    }

     function id_maintenancehardware(){
        $this->db->select('RIGHT(tb_maintenance.kd_maintenance,3) as kode', FALSE);
        $this->db->order_by('kd_maintenance','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_maintenance');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
            }else{
            $kode = 1;
            }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "MTH".$kodemax;
        return $kodejadi;
    }

    public function tambah_maintenhard($data){
        $this->db->insert('tb_maintenance', $data); 
    }
 
}
?>