<?php 
session_start();
if(@$_SESSION['username']!=''){
?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-money.png">
        <title>Keuangan Administrator</title>
        <!-- Custom CSS -->
        <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">
        <link href="dist/css/bootstrap.css" rel="stylesheet">
        <link href="dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body>
        
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <?php 
                include '_inc_page_template/_inc_temp_header.php';
                include '_inc_page_template/_inc_temp_aside.php';
                include '_inc_page_template/_inc_temp_content_and_footer.php';
            ?>       
        </div>

        
        
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="dist/js/custom.js"></script>
        <!--This page JavaScript -->
        
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/hullabaloo.min.js"></script>
        <script src="dist/js/myMain.js"></script>
    </html>
<?php
}else{
    echo "<script> window.location='index.php'; </script>";
} ?>
