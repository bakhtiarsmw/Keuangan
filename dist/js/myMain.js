var hulla = new hullabaloo();
$(document).ready(function() {

    showDataProfile();

    var table_ajax = $('#tb_barang').DataTable( {
        "ajax": '_inc_ajax/f_transaksi/transaksi.php',
        "order": [[ 0, 'desc' ]],
        "bDestroy": true,
        "columns": [
            { "data": "id_transaksi",
              "width": "20px",
              "sClass": "text-center"
            },
            { "data": "nama" },
            { "data":  null,
              render: function ( data, type, row ) {
                if(row.jenis_transaksi=='M'){
                  return '<span style="color:blue;">TRANSAKSI MASUK</span>';
                }else{
                  return '<span style="color:red;">TRANSAKSI KELUAR</span>';
                }
              }
            },
            { "data": "nominal",
              "render": function ( data, type, row ) {
                var html = numberWithCommas(data);
                return html;
              },
              "width": "100px","sClass": "text-right"
            },
            { "data": "keterangan" },
            { "data": null,
              "render": function ( data, type, row ) {
                var create = row.tgl_add_transaksi
                var update = row.tgl_update_transaksi
                return "<i>Transaksi dibuat pada tgl "+create+"<br> di Update pada tgl : "+update+"<i>";
              }
            },
            { "data":  null,
              render: function ( data, type, row ) {
                return "<a href='#' class='btn btn-primary btn-sm' onclick='getDataUpdate("+row.id_transaksi+")'>Update</a> <a href='#' class='btn btn-danger btn-sm' onclick='popupDelete("+row.id_transaksi+")'>Delete</a>";
              },
              "width": "100px",
              "sClass": "text-center"
            }
        ]
    } );


    var table_ajax_anggota = $('#tb_anggota').DataTable( {
        "ajax": '_inc_ajax/f_anggota/anggota.php',
        "order": [[ 0, 'desc' ]],
        "bDestroy": true,
        "columns": [
            { "data": "id_anggota",
              "width": "20px",
              "sClass": "text-center"
            },
            { "data": "nama" },
            { "data":  null,
              render: function ( data, type, row ) {
                if(row.jk=='L'){
                  return 'LAKI - LAKI';
                }else{
                  return 'PEREMPUAN';
                }
              }
            },
            { "data": "telp"},
            { "data": "alamat" },
            { "data":  null,
              render: function ( data, type, row ) {
                return "<a href='#' class='btn btn-primary btn-sm' onclick='getDataUpdateAnggota("+row.id_anggota+")'>Update</a> <a href='#' class='btn btn-danger btn-sm' onclick='popupDeleteAnggota("+row.id_anggota+")'>Delete</a>";
              },
              "width": "100px",
              "sClass": "text-center"
            }
        ]
    } );

    var table_ajax_masuk = $('#tb_transaksi_masuk').DataTable( {
        "ajax": '_inc_ajax/f_transaksi_masuk/transaksi_masuk.php',
        "order": [[ 0, 'desc' ]],
        "bDestroy": true,
        "columns": [
            { "data": "id_transaksi",
              "width": "20px",
              "sClass": "text-center"
            },
            { "data": "nama" },
            { "data":  null,
              render: function ( data, type, row ) {
                if(row.jenis_transaksi=='M'){
                  return '<span style="color:blue;">TRANSAKSI MASUK</span>';
                }else{
                  return '<span style="color:red;">TRANSAKSI KELUAR</span>';
                }
              }
            },
            { "data": "nominal",
              "render": function ( data, type, row ) {
                var html = numberWithCommas(data);
                return html;
              },
              "width": "100px","sClass": "text-right"
            },
            { "data": "keterangan" },
            { "data": null,
              "render": function ( data, type, row ) {
                var create = row.tgl_add_transaksi
                var update = row.tgl_update_transaksi
                return "<i>Transaksi dibuat pada tgl "+create+"<br> di Update pada tgl : "+update+"<i>";
              }
            }
        ]
    } );

    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

    $("#tgl_awal_id").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir_id").datepicker('setStartDate', startDate);
        if($("#tgl_awal_id").val() > $("#tgl_akhir_id").val()){
          $("#tgl_akhir_id").val($("#tgl_awal_id").val());
        }
    });

    $('.dataTables_length').addClass('bs-select');
    
    
    // Fungsi Ajax Transaksi Create
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_transaksi/simpan_transaksi.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalAdd').modal('hide');
                        table_ajax.ajax.reload();    
                        hulla.send('Success Inserting Data', 'success')
                                                    
                  }else{
                    hulla.send('Inserting Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    });   
    
    // Fungsi Ajax Transaksi Update
    var formsUpdate = document.getElementsByClassName('form_ubah_transaksi');
    var validation = Array.prototype.filter.call(formsUpdate, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_transaksi/ubah_transaksi.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalUpdate').modal('hide');
                        table_ajax.ajax.reload();    
                        hulla.send('Success Updating Data', 'success')
                                                    
                  }else{
                    hulla.send('Updating Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    }); 

    // Fungsi Ajax Transaksi Delete
    var formsDelete = document.getElementsByClassName('form_delete_transaksi');
    var validation = Array.prototype.filter.call(formsDelete, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_transaksi/hapus_transaksi.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalDelete').modal('hide');
                        table_ajax.ajax.reload();    
                        hulla.send('Success Deleting Data', 'success')
                                                    
                  }else{
                    hulla.send('Deleting Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    }); 

    // Fungsi Ajax Anggota Create
    var formsAnggota = document.getElementsByClassName('form_anggota_baru');
    var validation = Array.prototype.filter.call(formsAnggota, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_anggota/simpan_anggota.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalAddAnggota').modal('hide');
                        table_ajax_anggota.ajax.reload();    
                        hulla.send('Success Inserting Data', 'success')
                                                    
                  }else{
                    hulla.send('Inserting Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    });

    // Fungsi Ajax Anggota Delete
    var formsDeleteAnggota = document.getElementsByClassName('form_delete_anggota');
    var validation = Array.prototype.filter.call(formsDeleteAnggota, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_anggota/hapus_anggota.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalDeleteAnggota').modal('hide');
                        table_ajax_anggota.ajax.reload();    
                        hulla.send('Success Deleting Data', 'success')
                                                    
                  }else{
                    hulla.send('Deleting Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    }); 

    // Fungsi Ajax Transaksi Update
    var formsUpdateAnggota = document.getElementsByClassName('form_anggota_ubah');
    var validation = Array.prototype.filter.call(formsUpdateAnggota, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_anggota/ubah_anggota.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalUpdateAnggota').modal('hide');
                        table_ajax_anggota.ajax.reload();    
                        hulla.send('Success Updating Data', 'success')
                                                    
                  }else{
                    hulla.send('Updating Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    });
    // Fungsi Ajax Profil Update
    var formsUpdateProfile = document.getElementsByClassName('form_profil');
    var validation = Array.prototype.filter.call(formsUpdateProfile, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            $.ajax({
              url:"_inc_ajax/f_profile/ubah_profile.php",
              data:$(this).serialize(),
              type:'POST',
              success:function(data){
                  if(data == 'success'){
                        $('#modalProfile').modal('hide');   
                        showDataProfile();
                        hulla.send('Success Updating Data', 'success')
                                                    
                  }else{
                    hulla.send('Updating Data is Failed', 'danger')
                  }
              }
            });
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    });

    // Fungsi Ajax Cari Report Transaksi Masuk dengan Tanggal
    var formsFindReportTransaksiMasuk = document.getElementsByClassName('find_report_transaksi_masuk');
    var validation = Array.prototype.filter.call(formsFindReportTransaksiMasuk, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{
            var table_ajax_masuk_find = $('#tb_transaksi_masuk').DataTable( {
            "ajax": '_inc_ajax/f_transaksi_masuk/transaksi_masuk_find.php?tgl_awal='+$("#tgl_awal_id").val()+'&tgl_akhir='+$("#tgl_akhir_id").val(),
            "order": [[ 0, 'desc' ]],
            "bDestroy": true,
            "columns": [
                { "data": "id_transaksi",
                  "width": "20px",
                  "sClass": "text-center"
                },
                { "data": "nama" },
                { "data":  null,
                  render: function ( data, type, row ) {
                    if(row.jenis_transaksi=='M'){
                      return '<span style="color:blue;">TRANSAKSI MASUK</span>';
                    }else{
                      return '<span style="color:red;">TRANSAKSI KELUAR</span>';
                    }
                  }
                },
                { "data": "nominal",
                  "render": function ( data, type, row ) {
                    var html = numberWithCommas(data);
                    return html;
                  },
                  "width": "100px","sClass": "text-right"
                },
                { "data": "keterangan" },
                { "data": null,
                  "render": function ( data, type, row ) {
                    var create = row.tgl_add_transaksi
                    var update = row.tgl_update_transaksi
                    return "<i>Transaksi dibuat pada tgl "+create+"<br> di Update pada tgl : "+update+"<i>";
                  }
                }
            ]
        } ); 
            event.preventDefault();
            event.stopPropagation();

        }
        form.classList.add('was-validated');
      }, false);
    });

        
});

function goToReportMasuk(){
  window.open("_inc_ajax/f_transaksi_masuk/laporan_transaksi_masuk.php?tgl_awal="+$('#tgl_awal_id').val()+"&tgl_akhir="+$('#tgl_akhir_id').val(), '_blank');
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function showDataProfile(){
  id_admin = $("#id_admin_session").val();
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_profile/getProfile.php",    // file PHP yang akan merespon ajax
    data: { id_admin: id_admin} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $("#ProfileNama").html(resultItem.nama+" ");
        $("#ProfileEmail").html(resultItem.email);
  });
}

function popupDelete(dataTransaksi){
  
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_transaksi/getTransaksi.php",    // file PHP yang akan merespon ajax
    data: { id_transaksi: dataTransaksi} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $('#modalDelete').modal('show');
        $("#namaTransaksiPopup").html(resultItem.nama);
        $("#id_transaksiDelete").val(resultItem.id_transaksi);
  });
}

function popupProfile(id_admin){

  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_profile/getProfile.php",    // file PHP yang akan merespon ajax
    data: { id_admin: id_admin} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $('#modalProfile').modal('show');
        $("#id_adminProfil").val(resultItem.id_admin);
        $("#namaProfil").val(resultItem.nama);
        $("#emailProfil").val(resultItem.email);
        $("#usernameProfil").val(resultItem.username);
  });

}
function popupDeleteAnggota(dataAnggota){  
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_anggota/getAnggota.php",    // file PHP yang akan merespon ajax
    data: { id_anggota: dataAnggota} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $('#modalDeleteAnggota').modal('show');
        $("#namaAnggotaPopup").html(resultItem.nama);
        $("#id_anggotaDelete").val(resultItem.id_anggota);
  });
}

function getDataUpdate(id_transaksi){

  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_transaksi/getTransaksi.php",    // file PHP yang akan merespon ajax
    data: { id_transaksi: id_transaksi} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $('#modalUpdate').modal('show');
        $("#id_transaksiUpdate").val(resultItem.id_transaksi);
        $("#namaTransaksiUpdate").val(resultItem.nama);
        $("#nominalTransaksiUpdate").val(resultItem.nominal);
        $("#jenisTransaksiUpdate").val(resultItem.jenis_transaksi);
        $("#keteranganTransaksiUpdate").val(resultItem.keterangan);
  });
}
function getDataUpdateAnggota(id_anggota){

  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "_inc_ajax/f_anggota/getAnggota.php",    // file PHP yang akan merespon ajax
    data: { id_anggota: id_anggota} ,
    dataType: 'json'
  }).done(function( resultItem ) {   // KETIKA PROSES Ajax Request Selesai
        $('#modalUpdateAnggota').modal('show');
        $("#id_anggotaUpdate").val(resultItem.id_anggota);
        $("#namaAnggotaUpdate").val(resultItem.nama);
        $("#telpUpdate").val(resultItem.telp);
        $("#jenisKelaminUpdate").val(resultItem.jk);
        $("#alamatAnggotaUpdate").val(resultItem.alamat);
  });
}

function tandaPemisahTitik(b){
  var _minus = false;
  if (b<0) _minus = true;
  b = b.toString();
  b=b.replace(".","");
  
  c = "";
  panjang = b.length;
  j = 0;
  for (i = panjang; i > 0; i--){
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)){
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
  }
  if (_minus) c = "-" + c ;
  return c;
}

function numbersonly(ini, e){
    if (e.keyCode>=48){
        if(e.keyCode<=57){
            a = ini.value.toString().replace(".","");
            b = a.replace(/[^\d]/g,"");
            b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
            ini.value = tandaPemisahTitik(b);
            return false;
        }

        else if(e.keyCode<=105){
          if(e.keyCode>=96){
            //e.keycode = e.keycode - 47;
            a = ini.value.toString().replace(".","");
            b = a.replace(/[^\d]/g,"");
            b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
            ini.value = tandaPemisahTitik(b);
            //alert(e.keycode);
            return false;
            }
          else {return false;}
        }
        else {
          return false; }
    }

    else if (e.keyCode==48){
        a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
          ini.value = tandaPemisahTitik(b);
          return false;
        } else {
          return false;
        }
    }else if (e.keyCode==95){
        a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
        b = a.replace(/[^\d]/g,"");
        if (parseFloat(b)!=0){
          ini.value = tandaPemisahTitik(b);
          return false;
        } else {
          return false;
        }
    }
    else if (e.keyCode==8 || e.keycode==46){
        a = ini.value.replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = b.substr(0,b.length -1);
        if (tandaPemisahTitik(b)!=""){
          ini.value = tandaPemisahTitik(b);
        } else {
          ini.value = "";
        }
        
        return false;
      } 
    else if (e.keyCode==9){
        return true;
    } 
    else if (e.keyCode==17){
        return true;
    }
    else if (e.keyCode==13){
        return true;
    } 
    else {
        //alert (e.keyCode);
        return false;
    }
}