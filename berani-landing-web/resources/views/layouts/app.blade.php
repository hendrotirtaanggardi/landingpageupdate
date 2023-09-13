<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<meta name="csrf-token" content="{{ csrf_token() }}" />
				<link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" />
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link
								href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
								rel="stylesheet">
				<link href="{{ asset('css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
				<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

				{{-- Trix Editor --}}
				<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
				<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
				<style>
								trix-toolbar [data-trix-button-group="file-tools"] {
												display: none
								}
				</style>

				<!-- DataTables -->
				<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
				<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

				<script src="https://kit.fontawesome.com/91ba5df506.js" crossorigin="anonymous"></script>

				@livewireStyles

				@yield('custom_styles')

				<title>{{ $tabTitle }}</title>
				<link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" />
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
				<div class="d-flex flex-column flex-root">
								<div class="page d-flex flex-row flex-column-fluid">
												<!--begin::Aside-->
												{{-- @include('layouts.sidebar') --}}
												<!--end::Aside-->

												<!--begin::Wrapper-->
												<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

																<!--begin::Header-->
																@include('layouts.header')
																<!--end::Header-->

																<!--begin::Content-->
																<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
																				<!--begin::Post-->
																				<div class="post d-flex flex-column-fluid" id="kt_post">
																								<!--begin::Container-->
																								<div id="kt_content_container" class="container-xxl">
																												@yield('content')
																								</div>
																								<!--end::Container-->
																				</div>
																				<!--end::Post-->
																</div>
																<!--end::Content-->

																<!--begin::Footer-->
																@include('layouts.footer')
																<!--end::Footer-->

												</div>
												<!--end::Wrapper-->
								</div>
				</div>

				<!--begin::Modal Logout-->
				<div class="modal fade" tabindex="-1" id="kt_modal_1">
								<div class="modal-dialog">
												<div class="modal-content">
																<div class="modal-header">
																				<h5 class="modal-title fs-4">Logout Confirmation</h5>
																				<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
																								aria-label="Close">
																								<span class="svg-icon svg-icon-2x">
																												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																																fill="none">
																																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																																				rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																																<rect x="7.41422" y="6" width="16" height="2" rx="1"
																																				transform="rotate(45 7.41422 6)" fill="black"></rect>
																												</svg>
																								</span>
																				</div>
																</div>
																<div class="modal-body">
																				<p class="fs-5">Are you sure want to end your session?</p>
																</div>
																<div class="modal-footer">
																				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
																				<form action="{{ route('logout') }}" method="post">
																								@csrf
																								<button type="submit" class="btn btn-primary">Logout</button>
																				</form>
																</div>
												</div>
								</div>
				</div>
				<!--end::Modal Logout-->

				<!--begin::Scrolltop-->
				<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
								<i class="fa-solid fa-angle-up"></i>
				</div>
				<!--end::Scrolltop-->

				<script src="{{ asset('js/plugins.bundle.js') }}"></script>
				<script src="{{ asset('js/scripts.bundle.js') }}"></script>

				@livewireScripts

				@yield('custom_scripts')

				<script>
								document.addEventListener('trix-file-accept', function(e) {
												e.preventDefault();
								})
				</script>

				<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

				<!-- jQuery -->
				<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>


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

				<script>
								$(function() {
												$("#example1").DataTable({
																"responsive": true,
																"lengthChange": false,
																"autoWidth": false,
																"buttons": ["copy", "csv", "excel", "pdf", "print"]
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
</body>

</html>
