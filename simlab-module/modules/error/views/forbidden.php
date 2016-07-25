<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Forbidden Acces</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <?php $this->load->view('global_template_view/main_stylesheet'); ?>
</head>
<body>
<div class="app">
    <div class="red bg-big">
  <div class="text-center">
    <h1 class="text-shadow no-margin text-white text-4x p-v-lg">
      <span class="text-2x font-bold m-t-lg block">Akses Terlarang</span>
    </h1>
    <h2 class="h1 m-v-lg text-black">OOPS!</h2>
    <p class="h4 m-v-lg text-u-c font-bold text-black">Anda Tidak diperbolehkan mengakses halaman ini</p>
    <div class="p-v-lg">
       <a href="../">
            &nbsp;&nbsp;<button class="btn btn-info">Kembali ke Halaman Sebelumnya</button>
        </a>
    </div>
  </div>
</div>
<?php $this->load->view('global_template_view/main_footer'); ?>