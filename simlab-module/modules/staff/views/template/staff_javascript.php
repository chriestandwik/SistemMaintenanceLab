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
<script src="<?php echo base_url('assets/scripts/datepicker.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/autocomplete/jquery.autocomplete.js') ?>"></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href="<?php echo base_url('assets/scripts/autocomplete/jquery.autocomplete.css') ?>" rel="stylesheet" />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
    <link href="<?php echo base_url('assets/scripts/autocomplete/default.css') ?>" rel='stylesheet' />

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                serviceUrl: site+'/staff/autocompletebarang',
                onSelect: function (suggestion) {
                    $('#kd_barang').val(''+suggestion.kd_barang); 
                }
            });
        });
        
         var alamat = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete2').autocomplete({
                serviceUrl: alamat+'/staff/autocompleteunit',
                onSelect: function (suggestion) {
                    $('#kd_unit').val(''+suggestion.kd_unit); 
                }
            });
        });
        
        var urla = "<?php echo site_url();?>";
        $(function(){
            $('.autocompleteinv').autocomplete({
                serviceUrl: urla+'/staff/autocompletetambahinventaris',
                onSelect: function (suggestion) {
                    $('#kd_barang').val(''+suggestion.kd_barang);
                    $('#stok_awal').val(''+suggestion.stok_awal);
                    $('#stok_akhir').val(''+suggestion.stok_akhir);
                    $('#kd_penerimaan').val(''+suggestion.kd_penerimaan); 
                }
            });
        });
        
        var urlb = "<?php echo site_url();?>";
        $(function(){
            $('.autocompletepnm').autocomplete({
                serviceUrl: alamat+'/staff/autocompletepenempatan',
                onSelect: function (suggestion) {
                    $('#kd_invent').val(''+suggestion.kd_inventaris); 
                }
            });
        });
        
        var urlx = "<?php echo site_url();?>";
        $(function(){
            $('.autocomppenyerahan').autocomplete({
                serviceUrl: urlx+'/staff/autocomppenyerahan',
                onSelect: function (suggestion) {
                    $('#kd_barang').val(''+suggestion.kd_barang);
                    $('#stok_akhir').val(''+suggestion.stok_akhir);
                    $('#kd_invent').val(''+suggestion.kd_invent); 
                }
            });
        });
    </script>