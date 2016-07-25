<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-file-file-upload"></i>&nbsp;  Penyerahan Barang</h4>
       <?php $this->load->view('staff/template/staff_subheadercontent'); ?>

        <a href="tambahpenyerahan">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Penyerahan Barang</button>
        </a>
        </p>
        <div class="table-responsive">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                         <th>Nama Barang</th>
                        <th style="text-align:center" width="25%">Menu</th>
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
                    <td><?php echo $row->kd_barang; ?></td>
                     <td>
                    <?php foreach($barang as $row2) {
                        if($row->kd_barang==$row2->kd_barang){
                            echo $row2->nm_barang;
                        }
                    } ?>
                    </td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/detailpenyerahanbarang/<?php echo $row->kd_barang; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-list"></i>&nbsp;Detail</button>
                        </a>
                    </center>
                    </td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
              <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>