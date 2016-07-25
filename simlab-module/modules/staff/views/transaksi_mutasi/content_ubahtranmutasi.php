<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-launch"></i>&nbsp;  Ubah Transaksi Mutasi</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
    </br></br>
            <?php echo form_open('staff/prose_updatemutasi'); ?>
            <table>
              <tr>
                <td> 
                <div class="col-sm-6 form-group">
                      <label>Kode Penempatan</label>
                      <input class="form-control" name="kd_penempatn" ng-model="user.firstName" value="<?php echo $data->no_mutasi; ?>" readonly>
                  </div>
                  </td>
              </tr>
            <tr>
            <td width="35%"> 
           <div class="col-sm-4 form-group">
                  <label>Nama Barang</label>
                  <input class="form-control autocompletepnm" name="autonmbrg" id="autonmbrg" 
                 value="<?php
                        foreach($ibarang as $row2) {
                        if($data->kd_inventaris==$row2->kd_inventaris){
                            foreach($barang as $row3) {
                            if($row2->kd_barang==$row3->kd_barang){
                                echo $row3->nm_barang;
                                    }
                                }
                            }
                        }
                        ?>" type="text" required>
                  <input class="form-control autocompletepnm" name="kd_invent" id="kd_invent" type="hidden" value="<?php echo $data->kd_inventaris; ?>" required>
              </div>
            </td>
            </tr>
             <td width="35%"> 
               <div class="col-sm-4 form-group">
          <label>Tanggal Penempatan</label>
          <input class="form-control datepicker-here" name="tgl_pnmpt" data-language="en" data-date-format="dd/mm/yyyy" value="<?php echo $data->tgl_mutasi; ?>" required>
               </div>
            </td>
            </tr>
              <tr>
                <td><div class="col-sm-6">
                    <div class="md-form-group">
                        <label>Lokasi Penempatan</label></br>
                    <select id="select" name="lokasi">
                        <?php foreach($lab as $rowl){ 
                        if($data->kd_lab==$rowl->kd_lab){ $select = "selected"; } else $select="";
                        ?>
                        <option value="<?php echo $rowl->kd_lab; ?>" <?php echo $select; ?> >
                            <?php echo $rowl->nm_lab; ?>
                        </option>
                        <?php } ?> 
                    </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-md-4 form-group">
                     <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?php echo $data->keterangan; ?></textarea>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Transaksi Mutasi</button>
              <a href="../transaksimutasi"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
    <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>