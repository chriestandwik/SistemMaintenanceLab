<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-social-person-add"></i>&nbsp;  Manajemen User</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        <a href="tambahuser">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah User</button>
        </a>
        <p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama User</th>
                        <th>Jabatan</th>
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="6"><center><strong>Data Transaksi Mutasi Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                $nomer=1; 
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->nm_petugas; ?></td>
                    <td><?php echo $row->jabatan; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/updateuser/<?php echo $row->kd_petugas; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/deleteuser/".$row->kd_petugas,"
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