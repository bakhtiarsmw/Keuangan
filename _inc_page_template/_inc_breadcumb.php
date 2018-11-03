<div class="row align-items-center">
    <?php 
        $page=base64_decode(@$_GET['pg']);
        if($page=='anggota'){
             echo '  <div class="col-12">
                        <h4 class="page-title">Anggota</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Anggota</li>
                                </ol>
                            </nav>
                        </div>
                    </div>';
        }else if($page=='transaksi'){
             echo '  <div class="col-12">
                        <h4 class="page-title">Transaksi</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>';
        }else{
            echo '  <div class="col-12">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>';
        }
    ?>
    
</div>