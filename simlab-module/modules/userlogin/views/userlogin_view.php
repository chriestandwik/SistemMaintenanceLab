<?php
$stat = $this->input->get("akun");
if($stat=="kalab"){ $jabatan = "Kepala Laboratorium"; $gambaruser="gambar_kalab"; }
else if($stat=="asisten"){ $jabatan = "Asisten";$gambaruser="gambar_asissten"; }
else if($stat=="staff"){ $jabatan = "Staff";$gambaruser="gambar_staff"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Login <?php echo $jabatan; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <?php $this->load->view('global_template_view/main_stylesheet'); ?>
</head>
<body>
<div class="app indigo animated fadeIn">
    
 <div class="center-block w-xxl animated bounceInDown">
    <div class="navbar">
    </div>

    <div class="p-lg panel md-whiteframe-z1 text-color m">
        <h4 class="text-center">Login <?php echo $jabatan; ?></h4>
      <div class="loginprofile-img <?php echo $gambaruser; ?>"></div>
    <?php
        if($stat=="kalab"){ echo form_open("userlogin/loginkalab"); }
        else if($stat=="asisten"){ echo form_open("userlogin/loginasisten"); }
        else if($stat=="staff"){ echo form_open("userlogin/loginstaff"); }
     ?>
        <div class="md-form-group float-label">
          <input class="md-input" ng-model="user.firstName" name="nama_petugas" required>
          <label>Nama Petugas</label>
        </div>
        <div class="md-form-group float-label">
          <input class="md-input " ng-model="user.firstName" name="password" type="password" required>
          <label>Kata Sandi</label>
        </div>
        <button md-ink-ripple type="submit" class="md-btn md-raised blue btn-block p-h-md">Login</button>
        <?php echo form_close(); ?>
    </div>

    <div class="text-center">
      <a href="<?php echo site_url('/'); ?>" style="font-size:12px;">Kembali Ke Halaman Sebelumnya</a>
    </div>
  </div>



<?php $this->load->view('global_template_view/main_footer'); ?>