<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>SIM-Lab User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <?php $this->load->view('global_template_view/main_stylesheet'); ?>
</head>
<body>
<div class="app indigo-900">

    <center>
        <div class="card center-block md-whiteframe-z1" style="width:660px; margin-top:67px;">
          <div class="card-heading indigo">
           <center>
                <h4>Sistem Informasi Maintenance Laboratorium
                </h4>
              </center>
          </div>
          <div class="card-body  text-color m">
            <div class="row row-sm">
              <table width="552" border="0" align="center">
                    <tr>
                      <td width="150" align="center"></td>
                      <td width="27" align="center">&nbsp;</td>
                      <td width="162" align="center">&nbsp;</td>
                      <td width="30" align="center">&nbsp;</td>
                      <td width="161" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><a href="userlogin?akun=staff"><div class="loginprofile-img gambar_staff"></div></a></td>
                      <td>&nbsp;</td>
                      <td><a href="userlogin?akun=kalab"><div class="loginprofile-img gambar_kalab"></div></a></td>
                      <td><center></center></td>
                      <td><a href="userlogin?akun=asisten"><div class="loginprofile-img gambar_asissten"></div></a></td>
                    </tr>
                    <tr>
                      <td><center><strong> Staff </strong></center></td>
                      <td>&nbsp;</td>
                      <td><center><strong> Kepala Laboratorium </strong></center></td>
                      <td>&nbsp;</td>
                      <td><center> <strong>Asisten </strong></center></td>
                    </tr>
                  </table>
              </br></br>
                </div>
            </div>
        </div>
    </center>
   <?php $this->load->view('global_template_view/userinit_footer'); ?>
</div>

</div>
<script src="<?php echo base_url('assets/libs/jquery/jquery/dist/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery/bootstrap/dist/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery/waves/dist/waves.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-load.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-jp.config.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-jp.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-nav.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-toggle.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-form.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-waves.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/ui-client.js') ?>"></script>
</script>
</body>
</html>

