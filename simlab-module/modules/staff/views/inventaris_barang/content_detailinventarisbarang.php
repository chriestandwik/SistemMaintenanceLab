<?php $baseurl = base_url('staff'); ?>
<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-action-assignment"></i>&nbsp;Detail Inventaris Barang</h4>
       <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
         &nbsp;<a href="<?php echo $baseurl; ?>/inventarisbarang">
            &nbsp;<button class="btn btn-default"><i class="fa fa-undo"></i>&nbsp; Kembali Ke Halaman Sebelumnya</button>
        </a>
        </p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Inventaris</th>
                        <th>Tanggal Inventaris</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Penerimaan</th>
                        <th>Stok Awal</th>
                        <th>Stok Akhir</th>
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="6"><center><strong>Data Inventaris Barang Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                $pengurang = 0;
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->kd_inventaris; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row->tgl_inventaris)); ?></td>
                    <td>
                    <?php foreach($barang as $row2) {
                        if($row->kd_barang==$row2->kd_barang){
                            echo $row2->nm_barang;
                        }
                    } ?>
                    </td>
                    <td>
                    <?php foreach($penerimaan as $row3) {
                        
                        if($row->kd_penerimaan==$row3->kd_penerimaan){
                            $jmlpenerimaan = ($row3->jml_brg_diterima) - ($pengurang++);
                            echo $jmlpenerimaan;
                            
                        }
                    } ?>
                    </td>
                    <td><?php echo $row->stok_awal; ?></td>
                    <td><?php echo $row->stok_akhir; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/updateinventaris/<?php echo $row->kd_inventaris; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_inventaris/".$row->kd_inventaris,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
              <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>