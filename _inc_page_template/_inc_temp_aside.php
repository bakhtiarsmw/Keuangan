<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <input type="hidden" id="id_admin_session" value="<?=$_SESSION['id_admin']?>">
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium"><span id="ProfileNama"> </span><i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"> <span id="ProfileEmail"></span> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="popupProfile(<?=$_SESSION['id_admin'];?>)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="_inc_ajax/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <hr>
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" id="goDashboard" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?pg=<?=base64_encode('anggota')?>" aria-expanded="false">
                        <i class="mdi mdi-account-network"></i><span class="hide-menu">Anggota</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?pg=<?=base64_encode('laporan_transaksi_masuk')?>" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu" style="color:blue;">Laporan Transaksi Masuk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?pg=<?=base64_encode('laporan_transaksi_keluar')?>" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu" style="color:blue;">Laporan Transaksi Keluar</span>
                    </a>
                </li>
                
            </ul>
            
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">    
    <div class="modal-content">
      <form action="/" class="form_profil" novalidate id="form_profil">
          <div class="modal-header">
            <h7 class="modal-title" id="exampleModalCenterTitle">Profil Anda</h7>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">                        
            <div class="form-group">
                <label for="namaProfil">Nama Anda</label>
                <input type="hidden" class="form-control form-control-sm" name="id_admin" id="id_adminProfil" required>
                <input type="text" class="form-control form-control-sm" id="namaProfil" placeholder="Nama Anda" name="nama" required>
                <div class="invalid-feedback">
                   Isi Nama Anda
                </div>
            </div>
            <div class="form-group">
                <label for="emailProfil">Email</label>
                <input type="email" class="form-control form-control-sm" id="emailProfil" placeholder="Email" name="email" required>
                <div class="invalid-feedback">
                   Isi Email Anda
                </div>
            </div>    
            <div class="form-group">
                <label for="usernameProfil">Username</label>
                <input type="text" class="form-control form-control-sm" id="usernameProfil" placeholder="Username" name="username" required>
                <div class="invalid-feedback">
                   Isi Userame Anda
                </div>
            </div> 
            <div class="form-group">
                <label for="usernameProfil">Password</label>
                <input type="password" class="form-control form-control-sm" placeholder="Ubah Password anda disini" name="password">
            </div>           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Ubah Profile</button>
          </div>
      </form>
    </div>    
  </div>
</div>