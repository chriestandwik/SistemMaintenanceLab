<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>halaman asisten</title>
</head>
<body>

<h1>Halaman Asisten</h1>
    <h1>Haii selamat datang dihalaman <b>member</b>, anda login sebagai <?php echo $nama_petugas; ?></h1>
			<?php
			echo anchor('asisten/logout','Keluar');
			?>
</html>

