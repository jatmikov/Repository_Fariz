<?php
  @session_start();
  include "../config/config.php";

   $nama_user = @$_SESSION['nama_user'];
   $level = @$_SESSION['level'];

  if(@$_SESSION['status'] != "login") {
    header("location:../index.php");
  }

$tgl = date("Y-m-d");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi | Klinik</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
    <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="shortcut icon" href="../images/logo.jpg">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../images/logo.jpg" alt="SI Klinik" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include "include/header.php"; ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
  <?php include "include/sidebar.php"; ?>
</aside>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Obat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahModal">
                    Tambah Obat
                </a>

                <div class="modal fade" id="tambahModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Obat</h4>
                        <form role="form" action="" method="post">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group"><label for="street" class=" form-control-label">Kategori Penyakit</label>
                        <select type="text" id="kategori_obat"  class="form-control" name="kategori_obat" required="">
                        <option value="" label="Silahkan Pilih Kategori"></option>
                            <?php
                            include "../config/config.php";
                              $Q = mysqli_query($connect,"SELECT * FROM kategori ORDER BY id_penyakit ASC");
                              while($r = mysqli_fetch_array($Q)) {
                                if($data['id_penyakit']==$r['id_penyakit']) {
                                  $s='selected';
                                } else {
                                  $s='';
                                }
                                echo "<option value='$r[id_penyakit]' $s> $r[penyakit]</option>";
                              }
                            ?>
                        </select>  
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Nama Obat</label>
                        <input type="text" id="nama_obat" placeholder="Masukkan Nama Obat" class="form-control" name="nama_obat" required="">
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Jenis Obat</label>
                        <input type="text" id="jenis_obat" placeholder="Masukkan Jenis Obat" class="form-control" name="jenis_obat" required="">
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Harga</label>
                        <input type="number" id="harga_obat" placeholder="Masukkan Harga Obat" class="form-control" name="harga_obat" required="">
                        </div>
                         <div class="form-group"><label for="company" class=" form-control-label">Jumlah Stok</label>
                        <input type="number" id="stok_obat" placeholder="Masukkan Stok Obat" class="form-control" name="stok_obat" required="">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambah" class="btn btn-primary" value="tambah">Simpan</button>
                      </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <a class="btn btn-success mb-1" data-toggle="modal" data-target="#addModal">
                    Tambah Kategori Penyakit
                </a>

                <div class="modal fade" id="addModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Kategori Penyakit</h4>
                        <form role="form" action="" method="post">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group"><label for="company" class=" form-control-label">Jenis Penyakit</label>
                        <input type="text" id="penyakit" placeholder="Masukkan Spesialsisasi" class="form-control" name="penyakit" required="">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="add" class="btn btn-primary" value="add">Simpan</button>
                      </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->



                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="13%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                $result = mysqli_query($connect, "SELECT * FROM obat JOIN kategori ON kategori.id_penyakit=obat.kategori_obat");

                                // tampilkan query
                                    while ($row=mysqli_fetch_object($result))
                                    {
                                    ?>
                  <tr>
                    <td><?=$no++?></td>
                      <td><?=$row->penyakit?></td>
                      <td><?=$row->nama_obat?></td>
                      <td><?=$row->jenis_obat?></td>
                      <td>Rp. <?=$row->harga_obat?></td>
                      <td><?=$row->stok_obat?></td>
                      <td>
                      <button type="button" data-id="<?php echo $row->id_obat;?>" data-kategori_obat="<?php echo $row->kategori_obat; ?>"  data-nama_obat="<?php echo $row->nama_obat; ?>"  data-jenis_obat="<?php echo $row->jenis_obat; ?>" data-harga_obat="<?php echo $row->harga_obat; ?>" data-stok_obat="<?php echo $row->stok_obat; ?>"
                      class="btn btn-warning mb-1 open-AddBookDialog2" data-toggle="modal" data-target="#editModal">
                      Edit
                      </button>
                      <button type="submit" data-id="<?php echo $row->id_obat; ?>" class="btn btn-danger mb-1 open-AddBookDialog" data-toggle="modal" data-target="#hapusModal">
                      Hapus
                      </button>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


    <form action="" method="post">
            <div class="modal fade" id="hapusModal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                            <input type="hidden" name="bookId" id="bookId" />
                          </div>
                        </div>
                        <div class="modal-body">
                            <p>
                               Apakah Anda Yakin?
                           </p>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapus" value="hapus" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        </form>



<div class="modal fade" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <form role="form" action="" method="post">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="bookId2" id="bookId2">
               <div class="form-group"><label for="street" class=" form-control-label">Kategori Penyakit</label>
                        <select type="text" id="kategori_obat"  class="form-control" name="kategori_obat" required="">
                        <option value="" label="Silahkan Pilih Kategori"></option>
                            <?php
                            include "../config/config.php";
                              $Q = mysqli_query($connect,"SELECT * FROM kategori ORDER BY id_penyakit ASC");
                              while($r = mysqli_fetch_array($Q)) {
                                if($data['id_penyakit']==$r['id_penyakit']) {
                                  $s='selected';
                                } else {
                                  $s='';
                                }
                                echo "<option value='$r[id_penyakit]' $s> $r[penyakit]</option>";
                              }
                            ?>
                        </select>  
                        </div>
               <div class="form-group"><label for="company" class=" form-control-label">Nama Obat</label>
                        <input type="text" id="nama_obat" placeholder="Masukkan Nama Obat" class="form-control" name="nama_obat" required="">
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Jenis Obat</label>
                        <input type="text" id="jenis_obat" placeholder="Masukkan Jenis Obat" class="form-control" name="jenis_obat" required="">
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Harga</label>
                        <input type="number" id="harga_obat" placeholder="Masukkan Harga Obat" class="form-control" name="harga_obat" required="">
                        </div>
                         <div class="form-group"><label for="company" class=" form-control-label">Jumlah Stok</label>
                        <input type="number" id="stok_obat" placeholder="Masukkan Stok Obat" class="form-control" name="stok_obat" required="">
                        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <?php
      if (@$_POST['tambah']) {
      include "../config/config.php";

      $table      = "obat";

        $kategori_obat       =$_POST['kategori_obat'];
        $nama_obat       =$_POST['nama_obat'];
        $jenis_obat       =$_POST['jenis_obat'];
        $harga_obat       =$_POST['harga_obat'];
        $stok_obat       =$_POST['stok_obat'];
        
        $simpan      = "INSERT INTO $table (kategori_obat,nama_obat,jenis_obat,harga_obat,stok_obat)
                    VALUES('$kategori_obat','$nama_obat','$jenis_obat', '$harga_obat', '$stok_obat')";

      mysqli_query($connect,$simpan);
      echo "<script language='javascript'>document.location.href='obat.php'</script>";
      }

      else if (@$_POST['add']) {
      include "../config/config.php";

      $table      = "kategori";

        $penyakit       =$_POST['penyakit'];
       
        $simpan      = "INSERT INTO $table (penyakit)
                    VALUES('$penyakit')";

      mysqli_query($connect,$simpan);
      echo "<script language='javascript'>document.location.href='obat.php'</script>";
      }

      else if (@$_POST['hapus']) {
        include "../config/config.php";

            $table      = "obat";

            $id       =$_POST['bookId'];

            $hapus      = "DELETE FROM $table WHERE id_obat='$id'";
        mysqli_query($connect,$hapus);
        echo "<script language='javascript'>document.location.href='obat.php'</script>";
        }

      else if (@$_POST['update']) {
      include "../config/config.php";

          $update      = "UPDATE `obat` SET `kategori_obat`='$_POST[kategori_obat]',`nama_obat`='$_POST[nama_obat]',`jenis_obat`='$_POST[jenis_obat]',`harga_obat`='$_POST[harga_obat]',`stok_obat`='$_POST[stok_obat]' WHERE id_obat='$_POST[bookId2]'";
      mysqli_query($connect,$update);
      echo "<script language='javascript'>document.location.href='obat.php'</script>";
      }

      ?>


<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script type="text/javascript">

$(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val( myBookId );
});

$(document).on("click", ".open-AddBookDialog2", function () {
        var myBookId = $(this).data('id');
        var kategori_obat = $(this).data('kategori_obat');
        var nama_obat = $(this).data('nama_obat');
        var jenis_obat = $(this).data('jenis_obat');
        var harga_obat = $(this).data('harga_obat');
        var stok_obat = $(this).data('stok_obat');

        $(".modal-body #bookId2").val( myBookId );
    $(".modal-body #kategori_obat").val( kategori_obat );
    $(".modal-body #nama_obat").val( nama_obat );
        $(".modal-body #jenis_obat").val( jenis_obat );
        $(".modal-body #harga_obat").val( harga_obat );
        $(".modal-body #stok_obat").val( stok_obat );

        });

    </script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,"responsive": true, "lengthChange": false, "ordering": true,  "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>