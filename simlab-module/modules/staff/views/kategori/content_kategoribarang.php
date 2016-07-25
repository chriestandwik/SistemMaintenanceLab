<?php $this->load->view('staff/template/staff_header'); ?>  
<?php $this->load->view('staff/template/staff_headercontent'); ?>
    <h4 ><i class="mdi-editor-format-list-bulleted"></i>&nbsp;  Kategori</h4>
        <?php $this->load->view('staff/template/staff_subheadercontent'); ?>
        <a href="tambahkategori">
            &nbsp;&nbsp;<button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Tambah kategori</button>
        </a>
        </p>
        <div class="table-responsive">
            <table align="center" class="table  table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="65%" >Nama Kategori</th>
                        <th style="text-align:center;">Menu</th>
                    </tr>
                </thead>
                <tbody>
               <?php  if(empty($kategori)){ ?>
                    <tr>
                        <td colspan="6"><center><strong>Data Kategori Belum Terisi</strong> </center></td>
                    </tr>
                <?php } else { ?>
               <?php
                $nomer=1; 
                foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo ++$start; ?></td>
                    <td><?php echo $row->nm_kategori; ?></td>
                    <td><center>
                        <a href="<?php echo base_url(); ?>staff/ubahkategori/<?php echo $row->kd_kategori; ?>">
                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp;Ubah</button>
                        </a>
                    <?=anchor("staff/delete_kategori/".$row->kd_kategori,"
                    <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Hapus</button>",
                    array('onclick' => "return confirm('Apakah anda yakin akan menghapus data ini?')"))?></center>
                    </td>
                </tr>
                <?php  }  } ?>
                </tbody>
            </table>
           <center><div><?php echo $pagination; ?></div></center>
        </div>
<?php $this->load->view('staff/template/staff_dashboardfootercontent'); ?>
<?php $this->load->view('staff/template/staff_footer'); ?>