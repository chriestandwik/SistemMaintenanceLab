<?php $baseurl = base_url('staff'); ?>
<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-action-assignment"></i>&nbsp; Inventaris Barang</h4>
       <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        </p>
        <div class="table-responsive">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="35%">Nama Barang</th>
                        <th>Tgl Terima</th>
                        <th>Jumlah Penerimaan</th>
                        <th>Total Akhir</th>
                        <th style="text-align:center" width="30%">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($rows)){ ?>
                    <tr>
                        <td colspan="12"><center><strong>Data Penerimaan Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                     <td><?php echo $row->nm_barang; ?></td>
                     <td><?php echo $row->tgl_penerimaan; ?></td>
                     <td><?php echo $row->jml_brg_diterima."&nbsp"; echo $row->satuan; ?></td>
                     <td>
                     <?php
                        $kodebarang  = $row->kd_barang;
                        $qnmb = $this->db->query
                        ("SELECT SUM(jml_brg_diserahkan) as diserahkan from tb_penyerahan where kd_barang='$kodebarang'");
                        $dbb = $qnmb->row_array();
                        $jml_diserah = $dbb['diserahkan'];
                        echo $row->jml_brg_diterima - $jml_diserah."&nbsp"; echo $row->satuan;;
                      ?>
                      </td>
                    <td><center>
                      <a href="<?php echo $baseurl; ?>/tambahinventarisbarang/<?php echo $row->kd_penerimaan; ?>">
            &nbsp;&nbsp;<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Inventaris</button>
        </a>
                        <a href="<?php echo base_url(); ?>staff/detailinventarisbarang/<?php echo $row->kd_penerimaan; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-list"></i>&nbsp; Detail</button>
                        </a></center>
                    </td>
                </tr>
                <?php }  } ?>
                </tbody>
            </table>
             <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>