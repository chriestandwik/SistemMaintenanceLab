<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-file-file-download"></i>&nbsp;  Ubah Data Penerimaan</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_updatepenerimaan'); ?>
            <table>
              <tr>
                <td width="35%"> 
                    <input class="form-control" name="kd_penerimaan" type="hidden" value="<?php echo $data->kd_penerimaan; ?>">
                <div class="col-sm-4 form-group">
                      <label>Tanggal Penerimaan</label>
                      <input class="form-control datepicker-here" name="tgl_terima" data-language="en" data-date-format="dd/mm/yyyy" value="<?php echo date("d/m/Y",strtotime($data->tgl_penerimaan)); ?>" required>
                    </div>
                  <div class="col-md-4 form-group">
                     <label>Kondisi</label>
                    <input class="form-control" name="kondisi" value="<?php echo $data->kondisi; ?>" type="text" >
                  </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-md-4 form-group">
                     <label>Nama Barang</label>
                    <?php foreach($barang as $row1){ 
                        if($data->kd_barang==$row1->kd_barang){ $val1 = $row1->nm_barang; }};
                        ?>
    <input class="form-control autocomplete" name="autocomplete_barang" id="auto1"  type="text" value="<?php echo $val1 ?>" required>
    <input class="form-control autocomplete" name="kd_barang" id="kd_barang" type="hidden" value="<?php echo $data->kd_barang ?>" required>
                  </div>
                     <div class="col-md-4 form-group">
                     <label>Diberikan Oleh</label>
                    <input class="form-control" name="sender" value="<?php echo $data->diberikan_oleh; ?>" type="text" >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Nama Unit</label>
                        <?php foreach($unit as $row2){ 
                        if($data->kd_unit==$row2->kd_unit){ $val2 = $row2->nm_unit; }};
                        ?>
        <input class="form-control autocomplete2" name="autocomplete_unit" id="auto2" value="<?php echo $val2 ?>" type="text" required>
<input class="form-control autocomplete2" name="kd_unit" id="kd_unit" type="hidden" value="<?php echo $data->kd_unit; ?>" required>
                    </div>
                     <div class="col-md-4 form-group">
                     <label>Penerima</label>
                    <input class="form-control" name="penerima" type="text" value="<?php echo $data->penerima; ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Jumlah Barang yang diterima</label>
            <input class="form-control" name="jml_diterima" type="text" value="<?php echo $data->jml_brg_diterima; ?>" required></br>
                      <label>Satuan</label>
                      <input class="form-control" name="satuan" type="text" value="<?php echo $data->satuan; ?>" required>
                    </div>
                     <div class="col-md-4 form-group">
                     <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?php echo $data->keterangan; ?></textarea>
                  </div>
                </td>
              </tr>
              <tr>
              <td>
                </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Penerimaan</button>
              <a href="../penerimaanbarang"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>