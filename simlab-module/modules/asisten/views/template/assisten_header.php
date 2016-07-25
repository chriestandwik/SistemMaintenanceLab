<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SIM-Lab <?php echo $jabatan; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php $this->load->view('asisten/template/assisten_stylesheet'); ?>
</head>

<body>
    <div class="app blue-grey-50">

        <!-- aside -->
        <aside id="aside" class="app-aside modal fade" role="menu">
            <div class="left">
                <div class="box bg-white">
                    <div class="navbar md-whiteframe-z1 no-radius indigo">
                        <!-- brand -->
                        <a class="navbar-brand">
                            <img src="<?php echo base_url('/assets/images/logo.png') ?>" alt="." style="max-height: 39px; margin-top:10px;">
                            <span class="hidden-folded inline"> &nbsp;SIM-Lab</span>
                        </a>
                        <!-- / brand -->
                    </div>
                    <div class="box-row">
                        <div class="box-cell scrollable hover">
                            <div class="box-inner">
                                <div class="p hidden-folded blue-50" style="background-image:url(<?php echo base_url('/assets/images/bg2.png') ?>); background-size:cover">
                                    <div class="rounded w-64 bg-white inline pos-rlt">
                                        <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-responsive rounded">
                                    </div>
                                    <a class="block m-t-sm">
                                        <span class="block font-bold"><?php echo $nama_petugas; ?></span> john.smith@gmail.com
                                    </a>
                                </div>
                                <?php $this->load->view('asisten/template/assisten_sidemenu'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- / aside -->

        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="box">
                <!-- Content Navbar -->
                <div class="navbar md-whiteframe-z1 no-radius indigo">
                    <!-- Open side - Naviation on mobile -->
                    <a md-ink-ripple data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
                    <ul class="nav nav-sm navbar-tool pull-right">
                        <li class="dropdown">
                            <a md-ink-ripple data-toggle="dropdown">
            Selamat Datang, <strong><?php echo $nama_petugas; ?> &nbsp;</strong> 
              <i class="mdi-action-account-circle i-24"></i> &nbsp; &nbsp; 
          </a>
                            <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
                                <li><a href="pengaturanakun">Pengaturan Akun</a></li>
                                <li><a href>Pengaturan Sistem</a></li>
                                <li><a href>Sort by name</a></li>
                                <li class="divider"></li>
                                <li>
                                    <?php echo anchor('asisten/logout','Logout'); ?>
                                </li>
                            </ul>
                            <div class="pull-right" ui-view="navbar@"></div>
                        </li>
                    </ul>
                    <!-- / -->
                </div>

                <div class="box-row">
                    <div class="box-cell">
                        <div class="box-inner" style="padding:20px 20px;">