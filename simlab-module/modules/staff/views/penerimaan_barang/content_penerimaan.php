<?php $baseurl = base_url('staff'); ?>
<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-file-file-download"></i>&nbsp;  Penerimaan Barang</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        <a href="<?php echo $baseurl ?>/tambahpenerimaan">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Penerimaan Barang</button>
        </a>
        </p>
        <div class="table-responsive">
            <table  class="table  table-bordered">
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
                        <th width="20%">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="10"><center><strong>Data Penerimaan Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->kd_penerimaan; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row->tgl_penerimaan)); ?></td>
                     <td><?php echo $row->nm_barang; ?></td>
                     <td><?php echo $row->jml_brg_diterima."&nbsp"; echo $row->satuan; ?></td>
                     <td><?php echo $row->kondisi; ?></td>
                     <td><?php echo $row->diberikan_oleh; ?></td>
                     <td><?php echo $row->penerima; ?></td>
                     <td><?php echo $row->keterangan; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/ubahpenerimaan/<?php echo $row->kd_penerimaan; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_penerimaan/".$row->kd_penerimaan,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php }  } ?>
                </tbody>
            </table>
              <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>