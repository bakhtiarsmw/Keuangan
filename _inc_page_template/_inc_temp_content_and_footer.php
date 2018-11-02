<div class="page-wrapper">            
    <div class="page-breadcrumb">
        <?php include '_inc_breadcumb.php'; ?>
    </div>   
    <div class="container-fluid">       
        <div class="row" id="loadContentPage">
            <?php 
                $page = base64_decode(@$_GET['pg']);
                if($page=='anggota'){
                    include '_page_content/_anggota_page.php';
                }else if($page=='laporan_transaksi_masuk'){
                    include '_page_content/_laporan_transaksi_masuk_page.php';
                }else{
                    include '_page_content/_dashboard_page.php';                    
                }
            ?>
        </div>       
    </div>
    <footer class="footer text-center">
        All Rights Reserved.
    </footer>
</div>

