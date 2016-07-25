<?php
 $namaHari = array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu","Minggu"); 
    $namaBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $today = date('l, F j, Y'); 
    $sekarang = date('j') . " " . $namaBulan[(date('n')-1)] . " " . date('Y');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Laporan Data Kampus</title>
<style>
table, td, th {    
    border: 1px solid #000;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
    page-break-inside: auto;
}

p{
  line-height: 5px;
  font-size: 14;
}

th, td {
    padding: 5px;
}
</style>
</head>
<body>
<table border="1">
    <thead>
    <tr>
       <td colspan="9">
          <table cellpadding="0" cellspacing="0">
                <tr>
                  <td width="15%" rowspan="4" align="center"><img src="C:\xampp\htdocs\simlab-uk\assets\logo_uk.png" style="max-height: 95px;" /></td>
                  <td width="65%"  rowspan="4"  align="center">
                    <p><strong>Laporan Penerimaan</strong></p>
                    <p><strong>Tahun 2016</strong></p>
                    <p><strong>Laboratorium Komputer</strong></p>
                    <p><strong>Universitas Kanjuruhan Malang</strong></p>
                  </td>
                  <td width="10%" style="border-bottom: 1px solid white;border-right: 1px solid white;" >&nbsp;Kode Dokumen</td>
                  <td width="9" style="border-bottom: 1px solid white; border-right: 1px solid white;" >:</td>
                  <td colspan="3"  style="border-bottom: 1px solid white" >LKI.BRG.001</td>
                </tr>
                <tr>
                  <td style="border-bottom: 1px solid white;border-right: 1px solid white;" >&nbsp;Tanggal Terbit</td>
                  <td style="border-bottom: 1px solid white;border-right: 1px solid white;" >:</td>
                  <td colspan="3" style="border-bottom: 1px solid white" >1 Mei 2016</td>
                </tr>
                <tr>
                  <td style="border-bottom: 1px solid white;border-right: 1px solid white;" >&nbsp;Revisi</td>
                  <td style="border-bottom: 1px solid white;border-right: 1px solid white;" >:</td>
                  <td colspan="3" style="border-bottom: 1px solid white" ><?php echo $sekarang; ?></td>
                </tr>
                <tr>
                  <td style="border-right: 1px solid white;" >&nbsp;Halaman</td>
                  <td style="border-right: 1px solid white;" >:</td>
                  <td colspan="3"></td>
            </tr>
  </table>
       </td>
    </tr>
    <tr>
    <th width="15">No.</th>
    <th>Kode Penerimaan</th>
    <th>Tgl Terima</th>
    <th>Nama Barang</th>
    <th>Barang Diterima</th>
    <th>Kondisi</th>
    <th>Pengirim</th>
    <th>Penerima</th>
    <th> Keterangan</th>
    </tr>
  </thead>
  <tbody>
     <?php  if(empty($data)){ ?>
          <tr>
              <td colspan="9"><center><strong>Data Penerimaan Belum Terisi</strong> </center></td>
          </tr>
      <?php } else { ?>
     <?php
     $no=0;
      foreach($data as $row){ ?>
      <tr>
          <td><?php echo ++$no; ?></td>
          <td><?php echo $row->kd_penerimaan; ?></td>
          <td><?php echo $row->tgl_penerimaan; ?></td>
           <td><?php echo $row->nm_barang; ?></td>
           <td><?php echo $row->jml_brg_diterima." &nbsp;"; echo $row->satuan; ?></td>
           <td><?php echo $row->kondisi; ?></td>
           <td><?php echo $row->diberikan_oleh; ?></td>
           <td><?php echo $row->penerima; ?></td>
           <td><?php echo $row->keterangan; ?></td>
      </tr>
      <?php }  } ?>
      </tbody>
  </table>
  <script type="text/php">
        if ( isset($pdf) ) {
            $font = Font_Metrics::get_font("arial", "regular");
            $pdf->page_text(819, 111, "{PAGE_NUM} Dari {PAGE_COUNT}", $font, 12);
        }
    </script>
</body>
</html>