<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-editor-format-list-bulleted"></i>&nbsp;  Tambah Kategori Barang</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_insertkategori'); ?>
            <table>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                      <label>Kode Kategori</label>
                      <input class="form-control" name="kd_kategori" type="text" value="<?php echo $kode ?>" readonly>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>
                    <div class="col-sm-6 form-group">
                      <label>Nama Kategori</label>
                      <input class="form-control" name="nm_kategori" type="text" required>
                    </div>
                </td>
              </tr>
              <tr>
              <td>
                     </br></br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Tambahkan Kategori</button>
              <a href="kategoribarang"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                  </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>