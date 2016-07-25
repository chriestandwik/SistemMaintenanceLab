<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-file-file-download"></i>&nbsp;  Tambah Data Penerimaan</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertpenerimaan'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <input class="form-control" name="kd_penerimaan" type="hidden" value="<?php echo $kode; ?>" readonly=readonly>
                <div class="col-sm-4 form-group">
                      <label>Tanggal Penerimaan</label>
                      <input class="form-control datepicker-here" name="tgl_terima" data-language="en" data-date-format="dd/mm/yyyy" required>
                    </div>
                  <div class="col-md-4 form-group">
                     <label>Kondisi</label>
                    <input class="form-control" name="kondisi" type="text" >
                  </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-md-4 form-group">
                     <label>Nama Barang</label>
                    <input class="form-control autocomplete" name="autocomplete_barang" id="auto1" type="text" required>
                      <input class="form-control autocomplete" name="kd_barang" id="kd_barang" type="hidden" required>
                  </div>
                     <div class="col-md-4 form-group">
                     <label>Diberikan Oleh</label>
                    <input class="form-control" name="sender" type="text" >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Nama Unit</label>
                       <input class="form-control autocomplete2" name="autocomplete_unit" id="auto2" type="text" required>
                      <input class="form-control autocomplete2" name="kd_unit" id="kd_unit" type="hidden" required>
                    </div>
                     <div class="col-md-4 form-group">
                     <label>Penerima</label>
                    <input class="form-control" name="penerima" type="text" >
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-4 form-group">
                      <label>Jumlah Barang yang diterima</label>
                        <input class="form-control" name="jml_diterima" type="text" required></br>
                      <label>Satuan</label>
                      <input class="form-control" name="satuan" type="text" required>
                    </div>
                     <div class="col-md-4 form-group">
                     <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                  </div>
                </td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambah Penerimaan</button>
              <a href="penerimaanbarang"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>