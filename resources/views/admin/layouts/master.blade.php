<!doctype html>
<html lang="en">
<head>
@include('admin.layouts.head')
<title>Hamropasal | Dashboard </title>
</head>
<body>
	<!--wrapper-->
	<div class="wrapper">
		@include('admin.layouts.sidebar')
		<!--start header -->
		<header>
			@include('admin.layouts.navbar')
		</header>
		<!--end header -->
		<div class="overlay toggle-icon"></div>
			<a href="#" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © <?php echo date("Y");?>. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	@include('admin.layouts.footer')
</body>
</html>