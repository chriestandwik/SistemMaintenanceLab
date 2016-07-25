<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-action-launch"></i>&nbsp;  Transaksi Mutasi</h4>
         <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
       
        <a href="tambahtransmutasi">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Transaksi Mutasi</button>
        </a>
        <p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Inventaris</th>
                        <th>Tanggal Mutasi</th>
                        <th>Nama Barang</th>
                        <th>Lokasi Lama</th>
                        <th>Keterangan</th>
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
                    <td><?php echo $row->kd_inventaris ?></td>
                    <td><?php echo $row->tgl_mutasi; ?></td>
                    <td>
                         <?php foreach($barang as $row2) {
                        if($row->kd_barang==$row2->kd_barang){
                            echo $row2->nm_barang;
                        }
                    } ?>
                    </td>
                    <td><?php echo $row->nm_lab; ?></td>
                    <td><?php echo $row->keterangan; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/updatemutasi/<?php echo $row->no_mutasi; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/deletemutasi/".$row->no_mutasi,"
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