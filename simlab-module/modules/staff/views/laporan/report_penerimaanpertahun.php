<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 >&nbsp; Laporan  Penerimaan Barang Per Tahun</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
       
        </p>
        <div>
         <?php $baseurl = base_url('staff');?>
        <form name="tahun" class="form-inline">
    <form>     
    <div class="form-group">
    <p><strong>Tahun Penerimaan</strong></p>
      <select name="cbTahun" onchange="location=document.tahun.cbTahun.options[document.tahun.cbTahun.selectedIndex].value" class="form-control">
       <option value="<?php echo $baseurl; ?>/laporanpenerimaanpertahun/" <?php if($this->uri->segment(3)==""){ echo "selected";} ?>>Semua Tahun Penerimaan</option>
     <option value="<?php echo $baseurl; ?>/laporanpenerimaanpertahun/2017" <?php if($this->uri->segment(3)=="2017"){ echo "selected";} ?>>Penerimaan Tahun 2017</option>
    <option value="<?php echo $baseurl; ?>/laporanpenerimaanpertahun/2016" <?php if($this->uri->segment(3)=="2016"){ echo "selected";} ?>>Penerimaan Tahun 2016</option>
      </select>
      </div>
      </form>
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
                        <td colspan="9"><center><strong>Data Penerimaan Belum Terisi</strong> </center></td>
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
               <a href='<?php echo site_url('staff/cetakpenerimaanpertahun');?>' target="_blank">
               &nbsp;&nbsp;<button class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak Semua Data Laporan</button>
               </a>
           <?php } else { ?>
               <a href='<?php echo site_url('staff/cetakpenerimaanpertahun/'.$this->uri->segment(3).'');?>' target="_blank">
               &nbsp;&nbsp;<button class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Cetak Laporan Tahun <?php echo $this->uri->segment(3); ?> </button>
               </a>
               <?php } ?>
               </p></br>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>