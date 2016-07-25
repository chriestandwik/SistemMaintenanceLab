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

th, td {
    padding: 5px;
}
</style>
</head>
<body>
<table border="1">
  <tr>
    <td width="80" rowspan="4" align="center"><img src="C:\xampp\htdocs\simlab-uk\assets\logo_uk.png" style="max-height: 95px;" /></td>
    <td width="280" align="center"><strong>Laporan Penerimaan</strong></td>
    <td width="95">fdsfds</td>
    <td width="9">&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
  <tr>
    <td width="280" align="center"><strong>Tahun 2016</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="280" align="center"><strong>Laboratorium Komputer</strong></td>
   <td width="100"></td>
    <td width="9">&nbsp;</td>
    <td width="150">&nbsp;</td>
  </tr>
  <tr>
     <td width="280" align="center"><strong>Universitas Kanjuruhan Malang</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</p>
  <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Penerimaan</th>
                        <th>Tgl Terima</th>
                        <th>Nama Barang</th>
                        <th>Barang Diterima</th>
                        <th>Kondisi</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($data)){ ?>
                    <tr>
                        <td colspan="10"><center><strong>Data Penerimaan Belum Terisi</strong> </center></td>
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
</body>
</html>