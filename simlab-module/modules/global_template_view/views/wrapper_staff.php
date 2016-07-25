<?php  
$mnu = $this->input->get("menu");
if ($mnu==""){ $this->load->view('staff/content_home');}
else if($mnu=="beranda"){ $this->load->view('staff/content_home'); }
else if($mnu=="home"){ redirect('/staff/beranda'); }
else if($mnu=="barang"){ $this->load->view('staff/content_databarang'); }
else if($mnu=="tambahbarang"){ $this->load->view('staff/content_tambahbarang'); }
else if($mnu=="kategori"){ $this->load->view('staff/content_kategoribarang'); }
?>