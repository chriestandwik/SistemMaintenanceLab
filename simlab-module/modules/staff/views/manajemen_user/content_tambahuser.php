<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-social-person-add"></i>&nbsp;  Tambah User</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br>
            <?php echo form_open('staff/proses_insertuser'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-4 form-group">
                      <label>Kode Petugas</label>
                      <input class="form-control" name="kd_petugas" type="text" value="<?php echo $kode ?>" readonly>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Jabatan</label></br>
                      <select name="jabatan">
                        <option value="staff">Staff</option>
                        <option value="kepalalab">Kepala Laboratorium</option>
                        <option value="asisten">Asisten</option>
                      </select>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Username</label>
                      <input class="form-control" name="username" type="text" required>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Password</label>
                      <input class="form-control" name="password" type="password" required>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Penempatan</label>
                      <input class="form-control" name="username" type="text" required>
                    </div>
                </td>
              </tr>
              <tr>
              <td>
                </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambahkan User</button>
              <a href="manajemenuser"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>