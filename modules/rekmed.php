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
            <h1>Rekam Medis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Rekam Medis</li>
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
                <h3 class="card-title">Data Rekam Medis</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahModal">
                    Tambah Rekam Medis
                </a>

                <div class="modal fade" id="tambahModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Rekam Medis</h4>
                        <form role="form" action="" method="post">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group"><label for="street" class=" form-control-label">Nama Pasien</label>
                        <select type="text" id="psn_id"  class="form-control" name="psn_id" required="">
                        <option value="" label="Silahkan Pilih Pasien"></option>
                            <?php
                            include "../config/config.php";
                              $Q = mysqli_query($connect,"SELECT * FROM pasien ORDER BY id_psn ASC");
                              while($r = mysqli_fetch_array($Q)) {
                                if($data['id_psn']==$r['id_psn']) {
                                  $s='selected';
                                } else {
                                  $s='';
                                }
                                echo "<option value='$r[id_psn]' $s> $r[nama_psn]</option>";
                              }
                            ?>
                        </select>  
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Keluhan</label>
                        <input type="text" id="keluhan" placeholder="Masukkan Keluhan" class="form-control" name="keluhan" required="">
                        </div>
                         <div class="form-group"><label for="street" class=" form-control-label">Nama Dokter</label>
                        <select type="text" id="pgw_id"  class="form-control" name="pgw_id" required="">
                        <option value="" label="Silahkan Pilih Dokter"></option>
                            <?php
                            include "../config/config.php";
                              $Q = mysqli_query($connect,"SELECT * FROM pegawai WHERE bidang_pgw !='' ORDER BY id_pgw ASC");
                              while($r = mysqli_fetch_array($Q)) {
                                if($data['id_pgw']==$r['id_pgw']) {
                                  $s='selected';
                                } else {
                                  $s='';
                                }
                                echo "<option value='$r[id_pgw]' $s> dr. $r[nama_pgw] - Dokter $r[bidang_pgw]</option>";
                              }
                            ?>
                        </select>  
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Diagnosa</label>
                        <input type="text" id="diagnosa" placeholder="Masukkan Diagnosa" class="form-control" name="diagnosa" required="">
                        </div>
                        <div class="form-group"><label for="street" class=" form-control-label">Tindakan</label>
                        <select type="text" id="tdk_id"  class="form-control" name="tdk_id" required="" onchange="changesValue(this.value)">
                        <option value="" label="Silahkan Pilih Tindakan"></option>
                            <?php
                            $query=mysqli_query($connect,"SELECT * FROM tindakan ORDER BY id_tdk ASC");
                            $a="var biaya_tdk =  new Array();\n;";
                            while($hasil=mysqli_fetch_array($query)){
                            echo "<option value='$hasil[id_tdk]'>$hasil[jenis_tdk]</option>";
                            $a.="biaya_tdk['".$hasil['id_tdk']."']={biaya_tdk:'".addslashes($hasil['biaya_tdk'])."'};\n";
                            }
                            ?>
                        </select>  
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Biaya Perawatan</label>
                        <input type="text" id="biaya_tdk" class="form-control" name="biaya_tdk" onkeyup="oa();" required="" readonly="">
                        </div>
                        <div class="form-group"><label for="street" class=" form-control-label">Obat</label>
                        <select type="text" id="obat_id"  class="form-control" name="obat_id" required="" onchange="updatesValue(this.value)">
                        <option value="" label="Silahkan Pilih Obat"></option>
                             <?php
                            $query=mysqli_query($connect,"SELECT * FROM obat JOIN kategori ON kategori.id_penyakit=obat.kategori_obat ORDER BY id_obat ASC");
                            $b="var harga_obat =  new Array();\n;";
                            while($hasil=mysqli_fetch_array($query)){
                            echo "<option value='$hasil[id_obat]'>$hasil[nama_obat] | $hasil[jenis_obat] | $hasil[penyakit]</option>";
                            $b.="harga_obat['".$hasil['id_obat']."']={harga_obat:'".addslashes($hasil['harga_obat'])."'};\n";
                            }
                            ?>
                        </select>  
                        </div>
                        <div class="form-group"><label for="company" class=" form-control-label">Harga Obat</label>
                        <input type="text" id="harga_obat" class="form-control" name="harga_obat" onkeyup="ob();" required="" readonly="">
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
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Nama Dokter</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Total Biaya</th>
                    <th width="13%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                $result = mysqli_query($connect, "SELECT * FROM rekmed JOIN pasien ON pasien.id_psn=rekmed.psn_id JOIN pegawai ON pegawai.id_pgw=rekmed.pgw_id JOIN tindakan ON tindakan.id_tdk=rekmed.tdk_id JOIN obat ON obat.id_obat=rekmed.obat_id");

                                // tampilkan query
                                    while ($row=mysqli_fetch_object($result))
                                    {
                                    ?>
                  <tr>
                    <td><?=$no++?></td>
                      <td><?=$row->tgl?></td>
                      <td><?=$row->nama_psn?></td>
                      <td><?=$row->keluhan?></td>
                      <td>dr. <?=$row->nama_pgw?></td>
                      <td><?=$row->diagnosa?></td>
                      <td><?=$row->jenis_tdk?></td>
                      <td><?=$row->nama_obat?> <?=$row->jenis_obat?></td>
                      <td>Rp. <?=$row->total?></td>
                      <td>
                      <a href="detail.php?id_rekmed=<?php echo $row->id_rekmed; ?>" class="btn btn-primary mb-1">
                      Details
                      </a>  
                      <button type="submit" data-id="<?php echo $row->id_rekmed; ?>" class="btn btn-danger mb-1 open-AddBookDialog" data-toggle="modal" data-target="#hapusModal">
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


      <?php
      if (@$_POST['tambah']) {
      include "../config/config.php";

      $update      = "UPDATE `obat` SET `stok_obat`=`stok_obat`-1 WHERE id_obat='$_POST[obat_id]'";
      mysqli_query($connect,$update);

      $table      = "rekmed";
      $table2     = "tindakan";
      $table3     = "obat";      

        $psn_id       =$_POST['psn_id'];
        $keluhan       =$_POST['keluhan'];
        $pgw_id       =$_POST['pgw_id'];
        $diagnosa       =$_POST['diagnosa'];
        $tdk_id       =$_POST['tdk_id'];
        $obat_id       =$_POST['obat_id'];
        $biaya       =$_POST['biaya_tdk'];
        $harga       =$_POST['harga_obat'];
        $tgl           = date("Y-m-d");


        $total = $biaya + $harga;


        $simpan      = "INSERT INTO $table (psn_id, tgl, keluhan,pgw_id,diagnosa,tdk_id,obat_id,total)
                    VALUES('$psn_id','$tgl','$keluhan', '$pgw_id', '$diagnosa', '$tdk_id', '$obat_id', '$total')";

      mysqli_query($connect,$simpan);
      echo "<script language='javascript'>document.location.href='rekmed.php'</script>";
      }

      else if (@$_POST['hapus']) {
        include "../config/config.php";

            $table      = "rekmed";

            $id       =$_POST['bookId'];

            $hapus      = "DELETE FROM $table WHERE id_rekmed='$id'";
        mysqli_query($connect,$hapus);
        echo "<script language='javascript'>document.location.href='rekmed.php'</script>";
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

    </script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,"responsive": true, "lengthChange": true, "ordering": true,  "autoWidth": true,
      "buttons": ["copy", "excel", "pdf", "print"]
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