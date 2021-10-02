<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hamropasal | Dashboard </title>
</head>

<body>
	<div class="wrapper">
		<div class="sidebar-wrapper" data-simplebar="true">
			@include('admin.layouts.sidebar')
		</div>
		<header>
			@include('admin.layouts.navbar')
		</header>
		<div class="page-wrapper">

			@yield('content')
			{{-- Dashboard contents here --}}
		
		
		
		</div>
		<div class="overlay toggle-icon"></div>
			<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<footer class="page-footer">
			<p class="mb-0">Copyright © <?php echo date("Y");?>. All right reserved.</p>
		</footer>
	</div>
	@include('admin.layouts.footer')
</body>
</html>