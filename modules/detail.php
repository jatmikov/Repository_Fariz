<?php
  @session_start();
  include "../config/config.php";

   $nama_user = @$_SESSION['nama_user'];
   $level = @$_SESSION['level'];

  if(@$_SESSION['status'] != "login") {
    header("location:../index.php");
  }

$tgl = date("Y-m-d");

 if (isset($_GET['id_rekmed'])) {
   
   $id_rekmed = mysqli_real_escape_string($connect, $_GET['id_rekmed']);

   $sql = "SELECT * FROM rekmed JOIN pasien ON pasien.id_psn=rekmed.psn_id JOIN pegawai ON pegawai.id_pgw=rekmed.pgw_id JOIN tindakan ON tindakan.id_tdk=rekmed.tdk_id JOIN obat ON obat.id_obat=rekmed.obat_id WHERE id_rekmed = $id_rekmed";

   $result = mysqli_query($connect, $sql);

   $rekmed = mysqli_fetch_assoc($result);

   mysqli_free_result($result);
   mysqli_close($connect);
 }

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
            <h1>Detail Rekam Medis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="rekmed.php">Rekam Medis</a></li>
              <li class="breadcrumb-item active">Detail Rekam Medis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<?php if ($rekmed): ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Rekam Medis <?php echo htmlspecialchars($rekmed['nama_psn']); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal">
                    <div class="card-body">
                      <table style="background:transparent; outline:none; border:none; width: 500px" id="example1" class="table">
                  <thead>
                  <tr>
                    <th style="background:transparent; outline:none; border:none; width: 200px;"></th>
                    <th style="background:transparent; outline:none; border:none; width: 10px;"></th>
                    <th style="background:transparent; outline:none; border:none; width: 290px;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['tgl']); ?></td>
                  </tr>
                  <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['nama_psn']); ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin Pasien</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['jk_psn']); ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Pasien</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['alamat_psn']); ?></td>
                  </tr>
                  <tr>
                    <td>Keluhan</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['keluhan']); ?></td>
                  </tr>
                  <tr>
                    <td>Dokter yang Menangani</td>
                    <td>:</td>
                    <td>dr. <?php echo htmlspecialchars($rekmed['nama_pgw']); ?></td>
                  </tr>
                  <tr>
                    <td>Diagnosa Dokter</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['diagnosa']); ?></td>
                  </tr>
                  <tr>
                    <td>Tindakan</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['jenis_tdk']); ?></td>
                  </tr>
                  <tr>
                    <td>Biaya Pemeriksaan</td>
                    <td>:</td>
                    <td>Rp. <?php echo htmlspecialchars($rekmed['biaya_tdk']); ?></td>
                  </tr>
                  <tr>
                    <td>Obat</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($rekmed['nama_obat']); ?> | <?php echo htmlspecialchars($rekmed['jenis_obat']); ?></td>
                  </tr>
                  <tr>
                    <td>Harga Obat</td>
                    <td>:</td>
                    <td>Rp. <?php echo htmlspecialchars($rekmed['harga_obat']); ?></td>
                  </tr>
                  <tr>
                    <td>Total Biaya</td>
                    <td>:</td>
                    <td>Rp. <?php echo htmlspecialchars($rekmed['total']); ?></td>
                  </tr>
                  </tbody>
                </table>
                      </div>
                  </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    <?php endif; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



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

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": false,"responsive": false, "info": false, "lengthChange": false, "ordering": false,  "autoWidth": false,
      "buttons": ["copy", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script type='text/javascript'>
  <?php   
    echo $a;
    ?>

    function changesValue(id){  
     document.getElementById('biaya_tdk').value = biaya_tdk[id].biaya_tdk;
      }
       function oa(){
       
        }
    
<?php   
    echo $b;
    ?>

    function updatesValue(id){  
     document.getElementById('harga_obat').value = harga_obat[id].harga_obat;
      }
       function ob(){
       
        }

        </script>

</body>
</html>