<?php $this->load->view('asisten/template/assisten_header'); ?>  
<?php $this->load->view('asisten/template/assisten_headercontent'); ?>
    <h4 ><i class="mdi-device-devices"></i>&nbsp;Data Maintenance Hardware</h4>
        <?php $this->load->view('asisten/template/assisten_subheadercontent'); ?>
        <a href="tambah_maintenancehardware">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah Maintenance</button>
        </a></p>
         <div class="table-responsive">
            <table align="center" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode CPU</th>
                          <?php foreach($databarang as $row){ ?>
                            <th><?php echo $row->nm_barang." - ".$row->kd_inventaris; ?></th>
                        <!--- <th>Jenis Barang</th> -->
                        <!-- <th style="text-align:center;">Menu</th> -->
                         <?php } ?>
                    </tr>
                     </thead>
                     <tbody>
                    <tr>
                    <?php
                      $no=1; 
                     foreach($dtknd as $row2){ 
                      ?>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row2->kd_inventaris  ?></td>
                      <td><?php //echo $row2->kondisi; ?></td>
                      <?php $no++; echo"</tr>"; } ?>
                    
                </tbody>
            </table>
        </div>

       
<?php $this->load->view('asisten/template/assisten_dashboardfootercontent'); ?>
<?php $this->load->view('asisten/template/assisten_footer'); ?>