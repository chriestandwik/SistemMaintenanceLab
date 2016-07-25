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
                serviceUrl: site+'/asisten/autocompletehardware',
                onSelect: function (suggestion) {
                    $('#kd_inventaris').val(''+suggestion.kd_inventaris); 
                    $('#spek').val(''+suggestion.spesifikasi);
                }
            });
        });
        
    </script>