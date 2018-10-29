
<!-- column -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Anggota</h4>
                    <h5 class="card-subtitle">Daftar Anggota</h5>
                </div>
                <div class="ml-auto">
                    <div class="dl">
                        <a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center" data-toggle="modal" data-target="#modalAddAnggota" style="background: #2196F3;"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Tambah Anggota Baru</span> </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" id="tb_anggota">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">ID</th>
                            <th class="border-top-0">Nama</th>
                            <th class="border-top-0">JK</th>
                            <th class="border-top-0">Telp</th>
                            <th class="border-top-0">Alamat</th>
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
<div class="modal fade" id="modalAddAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">    
    <div class="modal-content">
      <form action="/" class="form_anggota_baru" novalidate id="form_anggota_baru">
          <div class="modal-header">
            <h7 class="modal-title" id="exampleModalCenterTitle">Anggota Baru</h7>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">                        
            <div class="form-group">
                <label for="namaAnggotaAdd">Nama Anggota Baru</label>
                <input type="text" class="form-control form-control-sm" id="namaAnggotaAdd" placeholder="Nama Anggota" name="nama" required>
                <div class="invalid-feedback">
                   Isi Nama Anggota Baru
                </div>
            </div>
            <div class="form-group">
                <label for="namaJenisKelaminAdd">Jenis Kelamin</label>
                <select name="jk" class="form-control form-control-sm" id="jenisKelaminAdd" placeholder="Pilih Jenis Transaksi" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                   Pilih Jenis Kelamin
                </div>
            </div>
            <div class="form-group">
                <label for="telpAdd">Telepon</label>
                <input type="text" class="form-control form-control-sm" id="telpAdd" placeholder="Telepon" name="telp" required>
                <div class="invalid-feedback">
                   Isi Nomor Telepon
                </div>
            </div>    
            <div class="form-group">
                <label for="alamatAnggotaAdd">Alamat Lengkap</label>
                <textarea class="form-control form-control-sm" id="alamatAnggotaAdd" required placeholder="Alamat Lengkap Anggota" name="alamat"></textarea>
                <div class="invalid-feedback">
                   Isi Alamat dengan Lengkap
                </div>
            </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambah Anggota</button>
          </div>
      </form>
    </div>    
  </div>
</div>
<!-- End Modal Transaksi Baru -->

<div class="modal fade" id="modalUpdateAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
        <div class="modal-content">
          <form action="/" class="form_anggota_ubah" novalidate id="form_anggota_ubah">
              <div class="modal-header">
                <h7 class="modal-title" id="exampleModalCenterTitle">Ubah Data Anggota</h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">                        
                <div class="form-group">
                    <label for="namaAnggotaUpdate">Nama Anggota Baru</label>
                    <input type="hidden" name="id_anggota" id="id_anggotaUpdate">
                    <input type="text" class="form-control form-control-sm" id="namaAnggotaUpdate" placeholder="Nama Anggota" name="nama" required>
                    <div class="invalid-feedback">
                       Isi Nama Anggota Baru
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenisKelaminAdd">Jenis Kelamin</label>
                    <select name="jk"  class="form-control form-control-sm" id="jenisKelaminUpdate" placeholder="Pilih Jenis Transaksi" required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                       Pilih Jenis Kelamin
                    </div>
                </div>
                <div class="form-group">
                    <label for="telpAdd">Telepon</label>
                    <input type="text" class="form-control form-control-sm" id="telpUpdate" placeholder="Telepon" name="telp" required>
                    <div class="invalid-feedback">
                       Isi Nomor Telepon
                    </div>
                </div>    
                <div class="form-group">
                    <label for="alamatAnggotaAdd">Alamat Lengkap</label>
                    <textarea class="form-control form-control-sm" id="alamatAnggotaUpdate" required placeholder="Alamat Lengkap Anggota" name="alamat"></textarea>
                    <div class="invalid-feedback">
                       Isi Alamat dengan Lengkap
                    </div>
                </div>          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Ubah Anggota</button>
              </div>
          </form>
        </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDeleteAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="" class="form_delete_anggota" novalidate id="form_delete_anggota" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_anggota" id="id_anggotaDelete" required>
            Menghapus Anggota : <span id="namaAnggotaPopup"></span>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </div>
        </form>
    </div>
  </div>
</div>

