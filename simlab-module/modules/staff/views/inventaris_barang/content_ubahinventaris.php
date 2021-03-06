<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-action-assignment"></i>&nbsp;  Ubah Inventaris Barang</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
             </br></br>
            <?php echo form_open('staff/proses_updateinventaris'); ?>
             <table>
              <tr>
                <td> 
                <div class="col-sm-4 form-group">
                      <label>Kode Inventaris Barang</label>
                      <input class="form-control" name="kd_invent" value="<?php echo $barang->kd_inventaris; ?>" readonly>
                  </div>
                  </td>
              </tr>
              <tr>
                  <td>
                  <div class="col-sm-4 form-group">
                      <label>Tanggal Inventaris</label>
                      <input class="form-control datepicker-here" name="tgl_invent" data-language="en" data-date-format="dd/mm/yyyy" value="<?php echo date("d/m/Y",strtotime($barang->tgl_inventaris)); ?>" required>
                    </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                <div class="col-md-4 form-group">
                    <label>Kode Penerimaan</label>
<input class="form-control autocompleteinv" name="autocomplete_barang" id="auto1" type="text" value="<?php echo $barang->kd_penerimaan; ?>" required>
<input class="form-control autocompleteinv" name="kd_barang" id="kd_barang" type="hidden" value="<?php echo $barang->kd_barang; ?>" required>
<input class="form-control autocompleteinv" name="kd_penerimaan" id="kd_penerimaan" type="hidden" value="<?php echo $barang->kd_penerimaan; ?>" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-3 form-group">
                      <label>Stok Awal</label>
                      <input class="form-control autocompleteinv" name="stok_awal" id="stok_awal" value="<?php echo $barang->stok_awal ?>" type="text" readonly>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-3 form-group">
                      <label>Stok Akhir</label>
                      <input class="form-control autocompleteinv" name="stok_akhir" id="stok_akhir" type="text" value="<?php echo $barang->stok_akhir ?>" readonly>
                    </div>
                </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Inventaris Barang</button>
              <a href="../detailinventarisbarang/<?php echo $barang->kd_penerimaan ?>"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table>  
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>