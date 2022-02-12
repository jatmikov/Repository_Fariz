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
            <h1>Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Pasien</li>
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
                <h3 class="card-title">Data Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahModal">
                    Tambah Pasien
                </a>

                <div class="modal fade" id="tambahModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Pasien</h4>
                        <form role="form" action="" method="post">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group"><label for="company" class=" form-control-label">Nama Pasien</label>
                        <input type="text" id="nama_psn" placeholder="Masukkan Nama Lengkap" class="form-control" name="nama_psn" required="">
                        </div>
                        <div class="form-group"><label for="street" class=" form-control-label">Jenis Kelamin</label>
                                <select type="text" id="jk_psn" placeholder="Masukkan Jenis Kelamin" class="form-control" name="jk_psn" required="">
                                <option value="" label="Pilih Jenis Kelamin"></option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>  
                                </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Alamat</label>
                        <input type="text" id="alamat_psn" placeholder="Masukkan Alamat" class="form-control" name="alamat_psn" required="">
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


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th width="13%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                $result = mysqli_query($connect, "SELECT * FROM pasien");

                                // tampilkan query
                                    while ($row=mysqli_fetch_object($result))
                                    {
                                    ?>
                  <tr>
                    <td><?=$no++?></td>
                      <td><?=$row->nama_psn?></td>
                      <td><?=$row->jk_psn?></td>
                      <td><?=$row->alamat_psn?></td>
                      <td>
                      <button type="button" data-id="<?php echo $row->id_psn;?>" data-nama_psn="<?php echo $row->nama_psn; ?>"  data-jk_psn="<?php echo $row->jk_psn; ?>" data-alamat_psn="<?php echo $row->alamat_psn; ?>" 
                      class="btn btn-warning mb-1 open-AddBookDialog2" data-toggle="modal" data-target="#editModal">
                      Edit
                      </button>
                      <button type="submit" data-id="<?php echo $row->id_psn; ?>" class="btn btn-danger mb-1 open-AddBookDialog" data-toggle="modal" data-target="#hapusModal">
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
              <h4 class="modal-title">Edit Pasien</h4>
              <form role="form" action="" method="post">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="bookId2" id="bookId2">
                        <div class="form-group"><label for="company" class=" form-control-label">Nama Pasien</label>
                        <input type="text" id="nama_psn" placeholder="Masukkan Nama Lengkap" class="form-control" name="nama_psn" required="">
                        </div>
                        <div class="form-group"><label for="street" class=" form-control-label">Jenis Kelamin</label>
                                <select type="text" id="jk_psn" placeholder="Masukkan Jenis Kelamin" class="form-control" name="jk_psn" required="">
                                <option value="" label="Pilih Jenis Kelamin"></option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>  
                                </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Alamat</label>
                        <input type="text" id="alamat_psn" placeholder="Masukkan Alamat" class="form-control" name="alamat_psn" required="">
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

      $table      = "pasien";

        $nama_psn       =$_POST['nama_psn'];
        $jk_psn       =$_POST['jk_psn'];
        $alamat_psn       =$_POST['alamat_psn'];
        
        $simpan2      = "INSERT INTO $table (nama_psn,jk_psn,alamat_psn)
                    VALUES('$nama_psn','$jk_psn', '$alamat_psn')";

      mysqli_query($connect,$simpan2);
      echo "<script language='javascript'>document.location.href='pasien.php'</script>";
      }

      else if (@$_POST['hapus']) {
        include "../config/config.php";

            $table      = "pasien";

            $id       =$_POST['bookId'];

            $hapus      = "DELETE FROM $table WHERE id_psn='$id'";
        mysqli_query($connect,$hapus);
        echo "<script language='javascript'>document.location.href='pasien.php'</script>";
        }

      else if (@$_POST['update']) {
      include "../config/config.php";

          $update      = "UPDATE `pasien` SET `nama_psn`='$_POST[nama_psn]',`jk_psn`='$_POST[jk_psn]',`alamat_psn`='$_POST[alamat_psn]' WHERE id_psn='$_POST[bookId2]'";
      mysqli_query($connect,$update);
      echo "<script language='javascript'>document.location.href='pasien.php'</script>";
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
    var nama_psn = $(this).data('nama_psn');
        var jk_psn = $(this).data('jk_psn');
        var alamat_psn = $(this).data('alamat_psn');
        
        $(".modal-body #bookId2").val( myBookId );
    $(".modal-body #nama_psn").val( nama_psn );
        $(".modal-body #jk_psn").val( jk_psn );
        $(".modal-body #alamat_psn").val( alamat_psn );
        
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