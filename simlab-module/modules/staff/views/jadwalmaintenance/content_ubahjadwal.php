<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-store"></i>&nbsp;  Ubah Jadwal</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_updatejadwal'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                      <label>Maintenance Ke -</label>
                       <input class="form-control" name="id_jadwal" type="hidden" value="<?php echo $jadwal->kd_jadwal; ?>">
                    <input class="form-control" name="maintenanceke" value="<?php echo $jadwal->maintenance_ke; ?>" type="text">
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Batas Tanggal</label>
                      <input class="form-control" name="tgl_dflt" type="hidden"  value="<?php echo date("d/m/Y",strtotime($jadwal->batas_tgl_awal)) ." - ".date("d/m/Y",strtotime($jadwal->batas_tgl_akhir)); ?>">
              <input type="text" data-range="true" name="batas" data-multiple-dates-separator=" - " class="datepicker-here form-control" value="<?php echo date("d/m/Y",strtotime($jadwal->batas_tgl_awal)) ." - ".date("d/m/Y",strtotime($jadwal->batas_tgl_akhir)); ?>"/>
                    </div>
                </td>
              </tr>
               <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Tahun Ajarang</label></br>
                      <select id="select" name="tahun">
                        <option value="0">&nbsp;- Tahun Ajaran -&nbsp;</option>
                       <?php foreach($tahun as $row){ 
                        if($jadwal->tahun==$row->id_tahun){ $select = "selected"; } else $select="";
                        ?>
                        <option value="<?php echo $row->id_tahun; ?>" <?php echo $select; ?> >
                            <?php echo "Semester ". $row->semester." ".$row->tahun_ajaran; ?>
                        </option>
                        <?php } ?> 
                    </div>
                </td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Jadwal</button>
              <a href="../jadwal"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>