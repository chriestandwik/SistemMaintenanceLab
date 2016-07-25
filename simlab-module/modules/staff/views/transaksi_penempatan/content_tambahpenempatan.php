<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-editor-format-list-bulleted"></i>&nbsp;  Tambah Transaksi Penempatan</h4>
           <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertpenempatan'); ?>
            <table>
              <tr>
                <td> 
                <div class="col-sm-6 form-group">
                      <label>Kode Penempatan</label>
                      <input class="form-control" name="kd_penempatn" ng-model="user.firstName" value="<?php echo $kode; ?>" readonly>
                  </div>
                  </td>
              </tr>
            <tr>
            <td width="35%"> 
           <div class="col-sm-4 form-group">
                  <label>Nama Barang</label>
                  <input class="form-control autocompletepnm" name="autonmbrg" id="autonmbrg" type="text" required>
                  <input class="form-control autocompletepnm" name="kd_invent" id="kd_invent" type="hidden" required>
              </div>
            </td>
            </tr>
             <td width="35%"> 
               <div class="col-sm-4 form-group">
          <label>Tanggal Penempatan</label>
          <input class="form-control datepicker-here" name="tgl_pnmpt" data-language="en" data-date-format="dd/mm/yyyy" required>
               </div>
            </td>
            </tr>
              <tr>
                <td><div class="col-sm-6">
                    <div class="md-form-group">
                        <label>Lokasi Penempatan</label></br>
                    <select id="select" name="lokasi">
                        <option value="0">&nbsp;- Pilih Lokasi Penempatan -&nbsp;</option>
                        <?php foreach($lab as $row){ ?>
                        <option value="<?php echo $row->kd_lab; ?>"><?php echo $row->nm_lab; ?></option>
                        <?php } ?> 
                    </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-md-4 form-group">
                     <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambah Transaksi Penempatan</button>
              <a href="transaksipenempatan"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>