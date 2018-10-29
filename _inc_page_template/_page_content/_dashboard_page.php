
<!-- column -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Transaksi</h4>
                    <h5 class="card-subtitle">Daftar Transaksi</h5>
                </div>
                <div class="ml-auto">
                    <div class="dl">
                        <a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center" data-toggle="modal" data-target="#modalAdd" style="background: #2196F3;"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Lakukan Transaksi Baru</span> </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" id="tb_barang">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">ID</th>
                            <th class="border-top-0">Nama Transaksi</th>
                            <th class="border-top-0">Jenis Transaksi</th>
                            <th class="border-top-0">Nominal</th>
                            <th class="border-top-0">Ket</th>
                            <th class="border-top-0">Act</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal Transaksi Baru -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
        <div class="modal-content">
            <form action="/" class="needs-validation" novalidate id="form_transaksi_baru">
              <div class="modal-header">
                <h7 class="modal-title" id="exampleModalCenterTitle">Transaksi Baru</h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">                        
                <div class="form-group">
                    <label for="namaBarangAdd">Nama Transaksi Baru</label>
                    <input type="text" class="form-control form-control-sm" id="namaTransaksiAdd" placeholder="Nama Transaksi" name="nama" required>
                    <div class="invalid-feedback">
                       Isi Nama Transaksi Baru
                    </div>
                </div>
                <div class="form-group">
                    <label for="namaBarangAdd">Jenis Transaksi</label>
                    <select name="jenis_transaksi"  class="form-control form-control-sm" id="jenisTransaksiAdd" placeholder="Pilih Jenis Transaksi" required>
                      <option value="">Pilih Jenis Transaksi</option>
                      <option value="M">Transaksi Masuk</option>
                      <option value="K">Transaksi Keluar</option>
                    </select>
                    <div class="invalid-feedback">
                       Pilih Jenis Transaksi
                    </div>
                </div>
                <div class="form-group">
                    <label for="hargaBarangAdd">Nominal</label>
                    <input type="text" class="form-control form-control-sm" id="nominalTransaksiAdd" placeholder="Harga" name="nominal" required onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                    <div class="invalid-feedback">
                       Isi Nominal Transaksi
                    </div>
                </div>    
                <div class="form-group">
                    <label for="namaBarangAdd">Keterangan Tambahan</label>
                    <input type="text" class="form-control form-control-sm" id="keteranganTransaksiAdd" value="-" required placeholder="Ketarangan" name="keterangan">
                    <div class="invalid-feedback">
                       Isi Keterangan dengan - jika tidak ada
                    </div>
                </div>          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Bertransaksi Sekarang</button>
              </div>
          </form>
        </div>
    
  </div>
</div>
<!-- End Modal Transaksi Baru -->

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
        <div class="modal-content">
            <form action="/" class="form_ubah_transaksi" novalidate id="form_ubah_transaksi">
              <div class="modal-header">
                <h7 class="modal-title" id="exampleModalCenterTitle">Update Transaksi</h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">                        
                <div class="form-group">
                    <label for="namaBarangUpdate">Nama Transaksi</label>
                    <input type="hidden" name="id_transaksi" id="id_transaksiUpdate">
                    <input type="text" class="form-control form-control-sm" id="namaTransaksiUpdate" placeholder="Nama Transaksi" name="nama" required>
                    <div class="invalid-feedback">
                       Isi Nama Transaksi
                    </div>
                </div>
                <div class="form-group">
                    <label for="namaBarangAdd">Jenis Transaksi</label>
                    <select name="jenis_transaksi"  class="form-control form-control-sm" id="jenisTransaksiUpdate" placeholder="Pilih Jenis Transaksi" required>
                      <option value="">Pilih Jenis Transaksi</option>
                      <option value="M">Transaksi Masuk</option>
                      <option value="K">Transaksi Keluar</option>
                    </select>
                    <div class="invalid-feedback">
                       Pilih Jenis Transaksi
                    </div>
                </div>
                <div class="form-group">
                    <label for="hargaBarangUpdate">Nominal</label>
                    <input type="text" class="form-control form-control-sm" id="nominalTransaksiUpdate" placeholder="Nominal" name="nominal" required onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                    <div class="invalid-feedback">
                       Isi Nominal
                    </div>
                </div>  
                <div class="form-group">
                    <label for="namaBarangAdd">Keterangan Tambahan</label>
                    <input type="text" class="form-control form-control-sm" id="keteranganTransaksiUpdate" value="-" required placeholder="Ketarangan" name="keterangan">
                    <div class="invalid-feedback">
                       Isi Keterangan dengan - jika tidak ada
                    </div>
                </div>                      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
              </div>
          </form>
        </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="" class="form_delete_transaksi" novalidate id="form_delete_transaksi" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_transaksi" id="id_transaksiDelete" required>
            Menghapus Tranasksi : <span id="namaTransaksiPopup"></span>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </div>
        </form>
    </div>
  </div>
</div>

