<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-action-store"></i>&nbsp;  Jadwal Maintenance</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        <a href="tambahjadwal">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Jadwal</button>
        </a>
        </p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="25%" >Maintenance Ke - </th>
                        <th>Batas Tanggal</th>
                        <th>Tahun</th>
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="6"><center><strong>Data Jadwal Maintenance Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo "Maintenance Ke - ".$row->maintenance_ke; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row->batas_tgl_awal))." - ".date("d/m/Y",strtotime($row->batas_tgl_akhir)) ; ?></td>
                   <?php foreach($tahun as $row2) {
                        if($row->tahun==$row2->id_tahun){
                            echo "<td> Semester ".$row2->semester." ".$row2->tahun_ajaran." </td>";
                        }
                    } ?>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/updatejadwal/<?php echo $row->kd_jadwal; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_jadwal/".$row->kd_jadwal,"
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