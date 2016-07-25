<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4><i class="mdi-av-my-library-books"></i>&nbsp;  Master Data Barang</h4>
    <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        <a href="tambahbarang">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Barang</button>
        </a>
        </p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <!--- <th>Jenis Barang</th> -->
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->nm_barang; ?></td>
                    <td><?php echo $row->nm_kategori;  ?></td>
                    <td><?php echo $row->satuan; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/updatebarang/<?php echo $row->kd_barang; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                       <?=anchor("staff/delete_barang/".$row->kd_barang,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php }if(empty($rows)){?>
                    <tr>
                        <td colspan="6"><center><strong> Data Barang Belum Terisi</strong></center></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
              <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>