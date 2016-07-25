<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-av-my-library-books"></i>&nbsp;  Ubah Tahun Ajaran</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_updatetahun'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                    <label>Tahun Ajaran</label>
                     <input type="hidden" name="idtahun" value="<?php echo $data->id_tahun; ?>">
                    <input class="form-control" name="tahun_ajaran" value="<?php echo $data->tahun_ajaran; ?>" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                <label>Semester</label>
                <input class="form-control" type="text" name="semester" value="<?php echo $data->semester; ?>" required>
                  </div>
                  </td>
              </tr>
               <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                      <option <?php if(($data->status)==1){ echo"selected";} ?> value="1">Aktif</option>
                      <option <?php if(($data->status)==0){ echo"selected";} ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Data Barang</button>
              <a href="../tampiltahun"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>