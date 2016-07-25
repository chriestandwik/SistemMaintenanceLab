<?php $baseurl = base_url('staff'); ?>
<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-file-file-upload"></i>&nbsp;  Penyerahan Barang</h4>
       <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            &nbsp;<a href="<?php echo $baseurl; ?>/penyerahanbarang">
            <button class="btn btn-default"><i class="fa fa-undo"></i>&nbsp; Kembali Ke Halaman Sebelumnya</button></a>
        </p>
        <div class="table-responsive">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Penyerahan</th>
                        <th>Tgl Penyerahan</th>
                        <th>Jumlah Barang yg Diserahkan</th>
                        <th>Kondisi</th>
                        <th>Stok Gudang</th>
                        <th>Stok Akhir</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th style="text-align:center" width="35%" >Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="12"><center><strong>Data Penyerahan Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->kd_penyerahan; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row->tgl_penyerahan)); ?></td>
                     <td><?php echo $row->jml_brg_diserahkan."&nbsp"; echo $row->satuan; ?></td>
                     <td><?php echo $row->kondisi; ?></td>
                     <td><?php echo $row->stok_akhir_gudang; ?></td>
                     <td><?php echo $row->stok_akhir_setelah_diterima; ?></td>
                     <td><?php echo $row->diberikan_oleh; ?></td>
                     <td><?php echo $row->penerima; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/ubahpenyerahan/<?php echo $row->kd_penyerahan; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_penyerahan/".$row->kd_penyerahan,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
             
        </div> <center><div><?php echo $pagination; ?></div></center>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>