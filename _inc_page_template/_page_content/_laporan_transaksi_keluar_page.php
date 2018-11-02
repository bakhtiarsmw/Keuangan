
<!-- column -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Transaksi Keluar</h4>
                    <h5 class="card-subtitle">Daftar Transaksi Keluar</h5>
                </div>
                <div class="ml-auto">                  
                  <div class="dl">
                      <a href="#" class="btn btn-block create-btn text-white no-block d-flex align-items-center"style="background: #CF000F;" onclick="goToReportKeluar()"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Cetak Data Ini</span> </a>
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <form method="POST" action="/" novalidate class="find_report_transaksi_keluar" id="find_report_transaksi_keluar">
                            <div class="row">
                              <div class="col-3">
                                <input type="text" placeholder="Masukkan tanggal Mulai" class="form-control datepicker" name="tgl_awal" id="tgl_awal_id" required>
                                <div class="invalid-feedback">
                                   Isi Tanggal Mulai
                                </div>
                              </div>
                              <div class="col-3">
                                <input placeholder="Masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir" id="tgl_akhir_id" required>
                                 <div class="invalid-feedback">
                                   Isi Tanggal Akhir
                                </div>
                              </div>
                              <div class="col-3">
                                <input type="submit" class="btn btn-primary" value="Cari">
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive" style="padding:10px;font-size: 12px;">
                <table class="table table-bordered" cellspacing="0" id="tb_transaksi_keluar">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">ID</th>
                            <th class="border-top-0">Nama Transaksi</th>
                            <th class="border-top-0">Jenis Transaksi</th>
                            <th class="border-top-0">Nominal</th>
                            <th class="border-top-0">Ket</th>
                            <th class="border-top-0">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>


