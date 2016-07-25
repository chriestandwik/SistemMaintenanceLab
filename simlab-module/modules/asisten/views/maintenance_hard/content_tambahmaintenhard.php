<?php $this->load->view('asisten/template/assisten_header'); ?>  
<?php $this->load->view('asisten/template/assisten_headercontent'); ?>
    <h4 ><i class="mdi-device-devices"></i>&nbsp;  Maintenance Hardware</h4>
        <?php $this->load->view('asisten/template/assisten_subheadercontent'); ?>
        </p>
       <?php echo form_open('asisten/proses_insertmainthard'); ?>
           <table>
              <tr>
               <td> 
                <input class="form-control" name="id_maintenance" type="hidden" value="<?php echo $kode; ?>" readonly=readonly>
                <input class="form-control" name="kd_petugas" type="hidden" value="<?php echo $kd_petugas; ?>" readonly=readonly>
                <div class="col-sm-4 form-group">
                      <label>Tanggal Maintenance</label>
                      <input class="form-control " name="tgl_maintenance" value="<?php echo date("d/m/Y") ?>" readonly>
                    </div>
                  </td>
              </tr>
              <tr>
                <td> 
                <div class="col-sm-6 form-group">
                      <label>Nama Barang</label>
                    <input class="form-control autocomplete" name="autocomplete_barang" id="auto1" type="text" required>
                      <input class="form-control autocomplete" name="kd_inventaris" id="kd_inventaris" type="hidden" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Spesifikasi</label>
                       <input class="form-control autocomplete2" name="spek" id="spek" type="text" required>
                  </div></td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Kondisi</label></br>
                     <input onclick="document.getElementById('keterangan').disabled = false;" type="radio" name="kondisi" value="Rusak"> Rusak &nbsp;&nbsp;
                     <input onclick="document.getElementById('keterangan').disabled = true;" type="radio" name="kondisi" value="Normal">Normal</br>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Keterangan</label>
                       <input name="ket_normal" type="hidden" value="">
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Simpan Maintenance</button>
              <a href="maintenancehardware"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('asisten/template/assisten_dashboardfootercontent'); ?>
<?php $this->load->view('asisten/template/assisten_footer'); ?>