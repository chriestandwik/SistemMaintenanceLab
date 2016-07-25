<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 >&nbsp; Laporan  Penerimaan Barang Per Bulan</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
       
        </p>
        <div>
         <?php $baseurl = base_url('staff');?>
        <?php echo form_open('staff/redirectpnerimaanbulan','class="form-inline"'); ?>
          <!--form class="form-inline" role="form" method="post" action="<?php echo $baseurl;?>/redirectpnerimaanbulan/"-->
           <div class="form-group">
              <label>Tahun Penerimaan</label></br>
            <select name="cbTahun" class="form-control">
            <option value="" <?php if($this->uri->segment(3)==""){ echo "selected";} ?>>Semua Tahun Penerimaan</option>
            <option value="2017" <?php if($this->uri->segment(3)=="2017"){ echo "selected";} ?>>Penerimaan Tahun 2017</option>
            <option value="2016" <?php if($this->uri->segment(3)=="2016"){ echo "selected";} ?>>Penerimaan Tahun 2016</option>
            </select>
            </div>
            <div class="form-group">
            <label>Bulan Penerimaan</label></br>
            <select name="cboxbulan" class="form-control">
            <option value="" <?php if($this->uri->segment(4)=="null"){ echo "selected";} ?>> -- Pilih Bulan --</option>
            <option value="1" <?php if($this->uri->segment(4)=="1"){ echo "selected";} ?>>Januari</option>
            <option value="2" <?php if($this->uri->segment(4)=="2"){ echo "selected";} ?>>Februari</option>
            <option value="3" <?php if($this->uri->segment(4)=="3"){ echo "selected";} ?>>Maret</option>
            <option value="4" <?php if($this->uri->segment(4)=="4"){ echo "selected";} ?>>April</option>
            <option value="5" <?php if($this->uri->segment(4)=="5"){ echo "selected";} ?>>Mei</option>
            <option value="6" <?php if($this->uri->segment(4)=="6"){ echo "selected";} ?>>Juni</option>
            <option value="7" <?php if($this->uri->segment(4)=="7"){ echo "selected";} ?>>Juli</option>
            <option value="8" <?php if($this->uri->segment(4)=="8"){ echo "selected";} ?>>Agustus</option>
            <option value="9" <?php if($this->uri->segment(4)=="9"){ echo "selected";} ?>>September</option>
            <option value="10" <?php if($this->uri->segment(4)=="10"){ echo "selected";} ?>>Oktober</option>
            <option value="11" <?php if($this->uri->segment(4)=="11"){ echo "selected";} ?>>November</option>
            <option value="12" <?php if($this->uri->segment(4)=="12"){ echo "selected";} ?>>Desember</option>
            </select>
            <button type="submit" class="btn btn-info">Tampilkan Data</button>
            </div>
          </form>

</div></br>
        <div class="table-responsive">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Penerimaan</th>
                        <th>Tgl Terima</th>
                        <th>Nama Barang</th>
                        <th>Barang Diterima</th>
                        <th>Kondisi</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($data)){ ?>
                    <tr>
                        <td colspan="10"><center><strong>Tahun Dan Bulan Penerimaan Belum Terpilih</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                $no=0;
                foreach($data as $row){ ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row->kd_penerimaan; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($row->tgl_penerimaan)); ?></td>
                     <td><?php echo $row->nm_barang; ?></td>
                     <td><?php echo $row->jml_brg_diterima."&nbsp"; echo $row->satuan; ?></td>
                     <td><?php echo $row->kondisi; ?></td>
                     <td><?php echo $row->diberikan_oleh; ?></td>
                     <td><?php echo $row->penerima; ?></td>
                     <td><?php echo $row->keterangan; ?></td>
                </tr>
                <?php }  } ?>
                </tbody>
            </table></div>
               <?php if($this->uri->segment(3)==""){ ?>
               <a href='<?php echo site_url('staff/cetakpenerimaanperbulan');?>' target="_blank">
               &nbsp;&nbsp;<button class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak Semua Data Laporan</button>
               </a>
           <?php } else { ?>
               <a href='<?php echo site_url('staff/cetakpenerimaanperbulan/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'');?>' target="_blank">
               &nbsp;&nbsp;<button class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak Laporan Tahun <?php echo $this->uri->segment(3); ?> </button>
               </a>
               <?php } ?>
               </p></br>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>