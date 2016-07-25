<?php $baseurl = base_url('staff'); ?>
<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-action-assignment"></i>&nbsp; Total Akhir Inventaris Barang</h4>
       <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        </p>
        <div class="table-responsive">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="35%">Nama Barang</th>
                        <th>Jumlah Penerimaan</th>
                        <th>Total Akhir</th>
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
                     <td><?php echo $row->totalakhir."&nbsp"; echo $row->satuan; ?></td>
                     <td>
                     <?php
                        $kodebarang  = $row->kd_barang;
                        $qnmb = $this->db->query
                        ("SELECT SUM(jml_brg_diserahkan) as diserahkan from tb_penyerahan where kd_barang='$kodebarang'");
                        $dbb = $qnmb->row_array();
                        $jml_diserah = $dbb['diserahkan'];
                        echo $row->totalakhir - $jml_diserah."&nbsp"; echo $row->satuan;;
                      ?>
                      </td>
                </tr>
                <?php }  } ?>
                </tbody>
            </table>
             <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>