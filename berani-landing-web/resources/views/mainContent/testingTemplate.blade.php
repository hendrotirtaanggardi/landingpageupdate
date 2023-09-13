<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Confido | Riwayat Order</title>

				<!-- Ionicons -->
				<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
				<!-- Tempusdominus Bootstrap 4 -->
				<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
				<!-- iCheck -->
				<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
				<!-- JQVMap -->
				<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
				<!-- Theme style -->
				<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
				<!-- overlayScrollbars -->
				<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
				<!-- Daterange picker -->
				<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
				<!-- summernote -->
				<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

				<!-- DataTables -->
				<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
				<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
				<!-- Theme style -->
				<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
				<div class="wrapper">
								<!-- Navbar -->
								<nav class="main-header navbar navbar-expand navbar-white navbar-light">
												<!-- Left navbar links -->
												<ul class="navbar-nav">
																<li class="nav-item">
																				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
																												class="fas fa-bars"></i></a>
																</li>
																<li class="nav-item d-none d-sm-inline-block">
																				<a href="/pacific-main/admin/" class="nav-link">Home</a>
																				<!-- </li>
						<li class="nav-item d-none d-sm-inline-block">
								<a href="#" class="nav-link">Contact</a>
						</li> -->
												</ul>

												<!-- Right navbar links -->
												<ul class="navbar-nav ml-auto">
																<!-- Navbar Search -->
																<li class="nav-item">
																				<a class="nav-link" data-widget="navbar-search" href="#" role="button">
																								<i class="fas fa-search"></i>
																				</a>
																				<div class="navbar-search-block">
																								<form class="form-inline">
																												<div class="input-group input-group-sm">
																																<input class="form-control form-control-navbar" type="search" placeholder="Search"
																																				aria-label="Search">
																																<div class="input-group-append">
																																				<button class="btn btn-navbar" type="submit">
																																								<i class="fas fa-search"></i>
																																				</button>
																																				<button class="btn btn-navbar" type="button" data-widget="navbar-search">
																																								<i class="fas fa-times"></i>
																																				</button>
																																</div>
																												</div>
																								</form>
																				</div>
																</li>
																<li class="nav-item">
																				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
																								<i class="fas fa-expand-arrows-alt"></i>
																				</a>
																</li>
												</ul>
								</nav>
								<!-- /.navbar -->

								<!-- Main Sidebar Container -->
								<aside class="main-sidebar sidebar-dark-primary elevation-4">
												<!-- Brand Logo -->
												<a href="/pacific-main/admin/" class="brand-link">
																<img src="../dist/img/ConfidoLogo.png" alt="Confido Logo" class="brand-image img-circle elevation-3"
																				style="opacity: .8">
																<span class="brand-text font-weight-light">Confido</span>
												</a>

												<!-- Sidebar -->
												<div class="sidebar">
																<!-- Sidebar user (optional) -->
																<div class="user-panel mt-3 pb-3 mb-3 d-flex">
																				<div class="image">
																								<img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
																				</div>
																				<div class="info">
																								<a href="#" class="d-block">Alexander Pierce</a>
																				</div>
																</div>

																<!-- SidebarSearch Form -->
																<div class="form-inline">
																				<div class="input-group" data-widget="sidebar-search">
																								<input class="form-control form-control-sidebar" type="search" placeholder="Search"
																												aria-label="Search">
																								<div class="input-group-append">
																												<button class="btn btn-sidebar">
																																<i class="fas fa-search fa-fw"></i>
																												</button>
																								</div>
																				</div>
																</div>
												</div>
												<!-- /.sidebar -->
								</aside>

								<!-- Content Wrapper. Contains page content -->
								<!-- <div class="content-wrapper"> -->
								<!-- Content Header (Page header) -->
								<!-- <section class="content-header">
						<div class="container-fluid"> -->

								<!-- </div>/.container-fluid
				</section> -->

								<!-- Content Wrapper. Contains page content -->
								<div class="content-wrapper">
												<!-- Content Header (Page header) -->
												<section class="content-header">
																<div class="container-fluid">
																				<div class="row mb-2">
																								<div class="col-sm-6">
																												<h1>Riwayat Order</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/pacific-main/admin/">Home</a></li>
																																<li class="breadcrumb-item active">Riwayat Order</li>
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
																																				<h3 class="card-title">DATA RIWAYAT ORDER</h3>
																																</div>
																																<!-- /.card-header -->
																																<div class="card-body">
																																				<table id="example1" class="table table-bordered table-striped">
																																								<thead>
																																												<tr>
																																																<th>ID Booking</th>
																																																<th>Nama</th>
																																																<th>Maskapai</th>
																																																<th>Rute</th>
																																																<th>Jenis</th>
																																																<th>Tanggal</th>
																																																<th>Jumlah</th>
																																																<th>Status</th>
																																																<th>Action</th>
																																												</tr>
																																								</thead>
																																								<tbody>
																																												<tr>
																																																<td>ASN2F6a8e6e</td>
																																																<td>REUSE</td>
																																																<td>Garuda</td>
																																																<td>Makasar - Jakarta</td>
																																																<td>First Class</td>
																																																<td>06-11-2022</td>
																																																<td>2</td>
																																																<td>Belum Konfirmasi</td>
																																																<td>
																																																				<button class="btn btn-primary btn-xs" type="button"
																																																								data-toggle="modal" data-target="#modal-bayar">Bayar

																																																				</button>
																																																				<a href="invoice.php" target="_blank">
																																																								<button class="btn btn-success btn-xs" type="button">Cetak
																																																								</button>
																																																				</a>
																																																				<button class="btn btn-warning btn-xs" type="button"
																																																								data-toggle="modal" data-target="#modal-lg">Lapor

																																																				</button>
																																																</td>

																																																<div class="modal fade" id="modal-bayar">
																																																				<div class="modal-dialog modal-lg">
																																																								<div class="modal-content">
																																																												<div class="modal-header">
																																																																<h4 class="modal-title">Upload Bukti oembayaran</h4>
																																																																<button type="button" class="close"
																																																																				data-dismiss="modal" aria-label="Close">
																																																																				<span aria-hidden="true">&times;</span>
																																																																</button>
																																																												</div>
																																																												<div class="modal-body">
																																																																<div class="form-group row">
																																																																				<div class="col-sm-12">
																																																																								<div class="form-group">
																																																																												<label for="exampleInputFile">File
																																																																																input</label>
																																																																												<div class="input-group">
																																																																																<div class="custom-file">
																																																																																				<input type="file"
																																																																																								class="custom-file-input"
																																																																																								id="exampleInputFile">
																																																																																				<label class="custom-file-label"
																																																																																								for="exampleInputFile">Choose
																																																																																								file</label>
																																																																																</div>
																																																																												</div>
																																																																								</div>
																																																																				</div>
																																																																</div>
																																																												</div>
																																																												<div class="modal-footer justify-content-between">
																																																																<button type="button"
																																																																				class="btn btn-primary">Save</button>
																																																												</div>
																																																								</div>
																																																								<!-- /.modal-content -->
																																																				</div>
																																																				<!-- /.modal-dialog -->
																																																</div>

																																												</tr>
																																												<td>PSB4y2b1i2q</td>
																																												<td>Fulan</td>
																																												<td>Garuda Indonesia</td>
																																												<td>Jakarta - Bali</td>
																																												<td>Bisnis</td>
																																												<td>12-11-2021</td>
																																												<td>1</td>
																																												<td>Sudah Konfirmasi</td>
																																												<td>
																																																<button class="btn btn-primary btn-xs" type="button"
																																																				data-toggle="modal" data-target="#modal-bayar">Bayar

																																																</button>
																																																<a href="invoice.php" target="_blank">
																																																				<button class="btn btn-success btn-xs" type="button">Cetak
																																																				</button>
																																																</a>
																																																<button class="btn btn-warning btn-xs" type="button"
																																																				data-toggle="modal" data-target="#modal-lg">Lapor

																																																</button>
																																												</td>

																																												</tr>
																																												<td>PSA8d6c9e1e</td>
																																												<td>Test</td>
																																												<td>Citilink</td>
																																												<td>Yogyakarta - Semarang</td>
																																												<td>Ekonomi</td>
																																												<td>06-10-2022</td>
																																												<td>1</td>
																																												<td>Belum Konfirmasi</td>
																																												<td>
																																																<button class="btn btn-primary btn-xs" type="button"
																																																				data-toggle="modal" data-target="#modal-bayar">Bayar

																																																</button>
																																																<a href="invoice.php" target="_blank">
																																																				<button class="btn btn-success btn-xs" type="button">Cetak
																																																				</button>
																																																</a>
																																																<button class="btn btn-warning btn-xs" type="button"
																																																				data-toggle="modal" data-target="#modal-lg">Lapor

																																																</button>
																																												</td>

																																												<div class="modal fade" id="modal-lg">
																																																<div class="modal-dialog modal-lg">
																																																				<div class="modal-content">
																																																								<div class="modal-header">
																																																												<h4 class="modal-title">Lapor</h4>
																																																												<button type="button" class="close"
																																																																data-dismiss="modal" aria-label="Close">
																																																																<span aria-hidden="true">&times;</span>
																																																												</button>
																																																								</div>
																																																								<div class="modal-body">
																																																												<div class="form-group row">
																																																																<label for="inputExperience"
																																																																				class="col-sm-2 col-form-label">Keluhan</label>
																																																																<div class="col-sm-10">
																																																																				<textarea class="form-control" id="inputExperience" placeholder="Keluhan"></textarea>
																																																																</div>
																																																												</div>
																																																								</div>
																																																								<div class="modal-footer justify-content-between">
																																																												<button type="button"
																																																																class="btn btn-primary">SUbmit</button>
																																																								</div>
																																																				</div>
																																																				<!-- /.modal-content -->
																																																</div>
																																																<!-- /.modal-dialog -->
																																												</div>

																																												</tr>

																																				</table>
																																</div>
																																<!-- /.card-body -->
																												</div>
																												<!-- /.card -->
																								</div>
																								<!-- /.col -->
																				</div>
																				<!-- /.row -->
																</div>
																<!-- /.container-fluid -->
												</section>
												<!-- /.content -->
								</div>
								<!-- /.content-wrapper -->
								<footer class="main-footer">
												<strong>Confido &copy; 2022.</strong>
												All rights reserved.
												<div class="float-right d-none d-sm-inline-block">
												</div>
								</footer>

								<!-- Control Sidebar -->
								<aside class="control-sidebar control-sidebar-dark">
												<!-- Control sidebar content goes here -->
								</aside>
								<!-- /.control-sidebar -->
				</div>
				<!-- ./wrapper -->

				<!-- jQuery -->
				<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
				<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
				<script>
								$.widget.bridge('uibutton', $.ui.button)
				</script>
				<!-- Bootstrap 4 -->
				<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
				<!-- ChartJS -->
				<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
				<!-- Sparkline -->
				<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
				<!-- JQVMap -->
				<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
				<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
				<!-- jQuery Knob Chart -->
				<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
				<!-- daterangepicker -->
				<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
				<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
				<!-- Tempusdominus Bootstrap 4 -->
				<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
				<!-- Summernote -->
				<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
				<!-- overlayScrollbars -->
				<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
				<!-- AdminLTE App -->
				<script src="{{ asset('dist/js/adminlte.js') }}"></script>
				<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
				<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

				{{-- Tiket --}}
				<!-- DataTables  & Plugins -->
				<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
				<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
				<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

				<!-- Page specific script -->
				<script>
								$(function() {
												$("#example1").DataTable({
																"responsive": true,
																"lengthChange": false,
																"autoWidth": false,
																"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
												}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
												$('#example2').DataTable({
																"paging": true,
																"lengthChange": false,
																"searching": false,
																"ordering": true,
																"info": true,
																"autoWidth": false,
																"responsive": true,
												});
								});
				</script>


				<script>
								$(function() {
												bsCustomFileInput.init();
								});
				</script>

</body>

</html>
