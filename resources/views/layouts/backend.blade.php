<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">
<link href="{{ asset('back/css/sb-admin-2.min.css')}}" rel="stylesheet">
<link href="{{ asset('back/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stack('styles')
</head>
<body id="page-top">
<div id="wrapper">
	<ul class="navbar-nav bg-gradient-navy sidebar sidebar-dark accordion toggled" id="accordionSidebar">
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
			<div class="sidebar-brand-icon">
				<img src="{{ asset('back/img/log.png')}}" class="logo img-fluid">
			</div>
			<div class="sidebar-brand-text mx-3">Barkatul</div>
		</a>
		<hr class="sidebar-divider my-0">
		<li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
			<a class="nav-link" href="{{ route('home') }}">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dasbor</span></a>
			</li>
			<li class="nav-item {{ (request()->is('artikel','artikel/create','categories','categories/*/edit')) ? 'active' : '' }}">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
				aria-expanded="true" aria-controls="collapsePages">
				<i class="fas fa-fw fa-folder"></i>
				<span>Artikel</span>
			</a>
			<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Artikel:</h6>
					<a class="collapse-item" href="{{route('artikel.index')}}">Semua Artikel</a>
					<a class="collapse-item" href="{{route('artikel.create')}}">Buat Artikel</a>
					<a class="collapse-item" href="{{route('categories.index')}}">Kategori</a>
				</div>
			</div>
		</li>
		<li class="nav-item {{ (request()->is('pages','pages/create','pages/*/edit')) ? 'active' : '' }}">
			<a class="nav-link" href="{{route('pages.index')}}">
				<i class="fas fa-fw fa-table"></i>
				<span>Halaman</span></a>
			</li>
			<li class="nav-item {{ (request()->is('silsilah','silsilah/*/edit')) ? 'active' : '' }}">
				<a class="nav-link" href="{{route('silsilah.index')}}">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Silsilah</span></a>
				</li>
				<li class="nav-item {{ (request()->is('tawasul','tawasul/*/edit')) ? 'active' : '' }}">
					<a class="nav-link" href="{{route('tawasul.index')}}">
						<i class="fas fa-fw fa-table"></i>
						<span>Tawasul</span></a>
					</li>

					<li class="nav-item {{ (request()->is('users','users/*/edit')) ? 'active' : '' }}">
						<a class="nav-link" href="{{route('users.index')}}">
							<i class="fas fa-fw fa-users"></i>
							<span>Users</span></a>
						</li>
						<li class="nav-item {{ (request()->is('settings','settings/*/edit')) ? 'active' : '' }}">
							<a class="nav-link" href="{{route('settings.index')}}">
								<i class="fas fa-fw fa-edit"></i>
								<span>Setting</span></a>
							</li>
							<hr class="sidebar-divider d-none d-md-block">
							<div class="text-center d-none d-md-inline">
								<button class="rounded-circle border-0" id="sidebarToggle"></button>
							</div>
						</ul>
						<div id="content-wrapper" class="d-flex flex-column">
							<div id="content">
								<nav class="navbar navbar-expand navbar-light bg-gray-300 topbar mb-4 static-top shadow">  
									<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-1">
										<i class="fa fa-bars"></i>
									</button>
									<a href="{{url('/')}}" class="nav-link d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" target="_blank"><h4 style="font-size:18px;font-weight: bold;color:orangered;">
									.::BarkatulKaunain::.</h4>
				                    </a>
									<ul class="navbar-nav ml-auto">
										<div class="topbar-divider d-none d-sm-block"></div>
										<li class="nav-item dropdown no-arrow">
											<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
											<img class="img-profile rounded-circle"
											src="{{ asset('back/img/undraw_profile.svg')}}">
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
										aria-labelledby="userDropdown">
										<a class="dropdown-item" href="#">
											<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
											Profile
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
						</ul>
					</nav>
					<div class="container-fluid">
						@include('sweetalert::alert')
						@yield('content')
					</div>
				</div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; BarkatulKaunain 2020 - {{date('Y')}}</span>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
	</div>
	<script src="{{ asset('back/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('back/js/sb-admin-2.min.js')}}"></script>
	<script src="{{ asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
	@stack('scripts')
</body>
</html>