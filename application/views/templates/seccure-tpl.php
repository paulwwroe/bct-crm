<?php check_session(); ?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        <title>BCT</title>

        <!-- Plugins -->
        <link href="<?php echo base_url('plugins/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/metis-menu/metisMenu.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/morris/morris.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/font-awesome/font-awesome.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/jquery-ui/jquery-ui.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/a11y-dialog/a11y-dialog.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/sidebar/main.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/note/main.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/modal/main.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />

    </head>

    <body>

        <div id="wrapper">

            <!-- Shortcut Link -->
            <a href="#main-heading" class="sr-only">skip navigation</a>

            <!-- Navigation -->
            <?php $this->load->view("partials/navigation.php"); ?>

            <!-- Content -->
            <div id="page-wrapper">

                <?php echo $body; ?>

            </div>

        </div>

        <script src="<?php echo base_url('plugins/jquery/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/metis-menu/metisMenu.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/morris/morris.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script> 
        <script src="<?php echo base_url('assets/js/search/search.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
        
        <!-- Controller Specific JS -->
        <?php if (!empty($scripts)) {load_scripts($scripts);} ?>
         
    </body>
     
</html>