<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-av-my-library-books"></i>&nbsp;  Tambah Tahun</h4>
           <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertahun'); ?>
            <table>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                      <label>Tahun Ajaran</label>
                      <input class="form-control" ng-model="user.firstName" name="thn_ajaran" required>
                       <input class="form-control" name="id_tahun" type="hidden" value="<?php echo $kode ?>" readonly>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Semester</label>
                      <input class="form-control" ng-model="user.firstName" type="text" name="semester" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                      </select>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambahkan Tahun Ajaran</button>
              <a href="tampiltahun"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>