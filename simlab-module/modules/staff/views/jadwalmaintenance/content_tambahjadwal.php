<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-store"></i>&nbsp;  Tambah Jadwal</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertjadwal'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                      <label>Maintenance Ke -</label>
                       <input class="form-control" name="id_jadwal" type="hidden" value="<?php echo $kode ?>">
                      <input class="form-control" name="maintenanceke" type="text">
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Batas Tanggal</label>
              <input type="text" data-range="true" name="batas" data-multiple-dates-separator=" - " class="datepicker-here form-control"/>
                    </div>
                </td>
              </tr>
               <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Tahun Ajarang</label></br>
                      <select id="select" name="tahun">
                        <option value="0">&nbsp;- Tahun Ajaran -&nbsp;</option>
                        <?php foreach($tahun as $row){ ?>
                        <option value="<?php echo $row->id_tahun; ?>"> <?php echo "Semester ". $row->semester." ".$row->tahun_ajaran; ?></option>
                        <?php } ?> 
                    </select>
                    </div>
                </td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambahkan Jadwal</button>
              <a href="jadwal"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>