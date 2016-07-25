<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
        <h4><i class="mdi-av-my-library-books"></i>&nbsp;  Update Barang</h4>
          <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
            </br></br>
            <?php echo form_open('staff/proses_updatebarang'); ?>
            <table>
              <tr>
                <td> 
              <div class="col-sm-6 form-group">
                <label>Kode Barang</label>
                <input class="form-control" name="kd_barang" value="<?php echo $barang->kd_barang; ?>" readonly>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                    <label>Nama Barang</label>
                    <input class="form-control" name="nm_barang" value="<?php echo $barang->nm_barang; ?>" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td><div class="col-sm-6">
                    <div class="md-form-group">
                        <label>Kategori</label></br>
                    <select id="select" name="kategori">
                        <option value="0">&nbsp;- Pilih Kategori Barang -&nbsp;</option>
                        <?php foreach($kategori as $row){ 
                        if($barang->kd_kategori==$row->kd_kategori){ $select = "selected"; } else $select="";
                        ?>
                        <option value="<?php echo $row->kd_kategori; ?>" <?php echo $select; ?> >
                            <?php echo $row->nm_kategori; ?>
                        </option>
                        <?php } ?> 
                    </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td width="35%"> 
                <div class="col-sm-6 form-group">
                <label>Satuan</label>
                <input class="form-control" type="text" name="satuan" value="<?php echo $barang->satuan; ?>" required>
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Jenis Barang</label></br>
                       <input onclick="document.getElementById('charstype').disabled = false; document.getElementById('charstype2').disabled = false;" type="radio" name="jns_barang" value="maintenance" <?php if($barang->jenis_barang=="maintenance"){ echo "checked";} ?> > Maintenance
                       <input onclick="document.getElementById('charstype').disabled = true; document.getElementById('charstype2').disabled = true;" 
                        type="radio" name="jns_barang" value="non maintenance" <?php if($barang->jenis_barang=="non maintenance"){ echo "checked";} ?> >Non Maintenance</br></br>
                
                  </div>
                  </td>
              </tr>
              <tr>
                <td width="35%"> 
                 <div class="col-sm-6 form-group">
                      <label>Klasifikasi Barang</label></br>
                      <input type="radio" name="klasifikasi" id="charstype" value="hardware" text="dsd" <?php if($barang->klasifikasi=="hardware"){ echo "checked";} ?> required> Hardware &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="klasifikasi" id="charstype2" value="software" text="dsd" <?php if($barang->klasifikasi=="software"){ echo "checked";} ?> required> Software</br></br></option>
                  </div>
                  </td>
              </tr>
              <tr>
              <td>
              </br>
              <div class="col-sm-6">
              <button class="btn btn-addon btn-success" type="submit"><i class="fa fa-save"></i>Ubah Data Barang</button>
              <a href="../barang"><button class="btn btn-default" type="button"><i class="fa fa-undo"></i>&nbsp; Batal</button></a>
                 </br></br>
              </div>
              </td>
              </tr>
            </table> 
            <?php echo form_close(); ?>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>