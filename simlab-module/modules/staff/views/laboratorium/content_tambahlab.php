<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-store"></i>&nbsp;  Tambah Laboratorium</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertlaboratorium'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                      <label>Kode Laboratorium</label>
                      <input class="form-control" name="kd_lab" type="text" value="<?php echo $kode ?>" readonly>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Nama Laboratorium</label>
                      <input class="form-control" name="nm_lab" type="text" required>
                    </div>
                </td>
              </tr>
               <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Kuota</label>
                      <input class="form-control" name="kuota" type="text" required>
                    </div>
                </td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambahkan Laboratorium</button>
              <a href="laboratorium"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>