<?php $this->load->view('asisten/template/assisten_header'); ?>  
<?php $this->load->view('asisten/template/assisten_headercontent'); ?>
    <h4 ><i class="mdi-action-home"></i>&nbsp;  Maintenance Software</h4>
        <?php $this->load->view('asisten/template/assisten_subheadercontent'); ?>
        </p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Software</th>
                        <th>Spesifikasi</th>
                        <th>Kondisi</th>
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($unit)){ ?>
                    <tr>
                        <td colspan="6"><center><strong>Data Maintenance Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                $nomer=1; 
                foreach($unit as $row){ ?>
                <tr>
                    <td><?php echo $nomer; ?></td>
                    <td><?php echo $row->nm_unit; ?></td>
                    <td><?php echo $row->telepon; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/ubahunit/<?php echo $row->kd_unit; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_unit/".$row->kd_unit,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php $nomer++; }  } ?>
                </tbody>
            </table>
        </div>
<?php $this->load->view('asisten/template/assisten_dashboardfootercontent'); ?>
<?php $this->load->view('asisten/template/assisten_footer'); ?>