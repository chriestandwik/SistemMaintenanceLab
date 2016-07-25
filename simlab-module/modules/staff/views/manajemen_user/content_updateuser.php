<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-social-person-add"></i>&nbsp;  Edit User</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br>
            <?php echo form_open('staff/proses_updateuser'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-4 form-group">
                      <label>Kode Petugas</label>
                      <input class="form-control" name="kd_petugas" type="text" value="<?php echo $data->kd_petugas ?>" readonly>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Jabatan</label></br>
                      <select name="jabatan">
                        <option value="staff" <?php if($data->jabatan=="staff"){ echo "selected"; } else {
                        echo"";} ?> >Staff</option>
                        <option value="kepalalab" <?php if($data->jabatan=="kepalalab"){ echo "selected"; } else {
                        echo"";} ?> >Kepala Laboratorium</option>
                        <option value="asisten" <?php if($data->jabatan=="asisten"){ echo "selected"; } else {
                        echo"";} ?> >Asisten</option>
                      </select>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Username</label>
                      <input class="form-control" name="username" value="<?php echo $data->nm_petugas ?>" type="text" required>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Password</label>
                      <input class="form-control" name="password" value="<?php echo $data->password ?>" type="password" required>
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
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Data User</button>
              <a href="../manajemenuser"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>