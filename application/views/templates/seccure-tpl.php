<?php check_session(); ?>
<!DOCTYPE html>
<html>
    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        <!-- Title -->
        <title>BCT</title>

        <!-- Plugins -->
        <link href="<?php echo base_url('plugins/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/font-awesome/font-awesome.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/jquery-ui/jquery-ui.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('plugins/a11y-dialog/a11y-dialog.css'); ?>" rel="stylesheet" />

        <!-- Theme Styles -->
        <link href="<?php echo base_url('assets/css/sb-admin.min.css'); ?>" rel="stylesheet" />

        <!-- Page Styles -->
        <link href="<?php echo base_url('assets/css/note/main.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/modal/main.css'); ?>" rel="stylesheet" />

        <!-- General Styles -->
        <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />

    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        
        <!-- Shortcut Link -->
        <a href="#main-heading" class="sr-only">skip navigation</a>
        
        <!-- Navigation -->
        <?php $this->load->view("partials/navigation.php"); ?>          

        <!-- Page Content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <?php echo $body; ?>
            </div>
        </div>

        <!-- Example Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plugins -->
        <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/jquery-ui/jquery.easing.min.js'); ?>"></script>

        <!-- Assets -->
        <script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/search/search.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
        
        <!-- Controller Specific JS -->
        <?php if (!empty($scripts)) {load_scripts($scripts);} ?>
         
    </body>
     
</html>