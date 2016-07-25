<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-dns"></i>&nbsp;  Ubah Data Unit</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
		      <?php echo form_open('staff/proses_updateunit'); ?>
            <table>
              <tr>
                <td width="35%"> 
               <div class="col-sm-6 form-group">
                      <label>Kode Unit</label>
        <input class="form-control" name="kd_unit" type="text" value="<?php echo $unit->kd_unit; ?>" readonly>
                  </div>
                  </td>
              </tr>
              <tr>
                <td><div class="col-sm-6 form-group">
                      <label>Nama Unit</label>
            <input class="form-control" name="nm_unit" type="text" value="<?php echo $unit->nm_unit; ?>" required>
                  </div></td>
              </tr>
              <tr>
                <td><div class="col-sm-6 form-group">
                      <label>Nama Unit</label>
            <input class="form-control" name="telepon" type="text" value="<?php echo $unit->telepon; ?>" required>
                  </div></td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-pencil"></i>Ubah Data Unit</button>
              <a href="../unit"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>