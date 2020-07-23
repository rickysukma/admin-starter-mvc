<?php
session_start();
require 'config/connection.php';
require 'core/app.php';

if(!App::isLogin()){
	//lempar orang jika mencoba akses dashboard tanpa login
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Accounting</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/skin-purple.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Zebra Pagination -->
	<link rel="stylesheet" href="css/zpagination.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 3 -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/zpagination.js"></script>
	<!-- Toast -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
	<script>
		$(document).ready(function () {
			$('.sidebar-menu').tree();
			// $('.sidebar-menu').on("click", function(e){
			// 	$(this).next('ul').toggle();
			// 	e.stopPropagation();
			// 	e.preventDefault();
			// });
			// render('dashboard');
			$(".sidebar-menu").on('click',function(e){
				$('.sidebar-menu').tree();
			});
		})
	</script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<input type="hidden" id="base_url" value="<?php echo "https://" . $_SERVER['SERVER_NAME'] ."/admin-starter-mvc/request.php" ?>">
		<?php require 'partials/header.php' ?>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<?php require 'partials/aside.php' ?>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div id="progress"></div>
		<div class="content-wrapper" id="main-container">
			<!-- content here -->
			<?php
			// if(isset($_GET['page'])){
			// 	if($_GET['page'] == '' || !file_exists("core/$_GET[page].php")){
			// 		App::notfound();
			// 		exit();
			// 	}
			// 	require 'core/'.$_GET['page'].'.php';
			// 	ucfirst($_GET['page'])::index();
			// }else{
			// 	App::index();
			// }
			?>
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
			</div>
			<strong>Copyright &copy; <?php echo date('Y') ?>
				<a href="https://adminlte.io">AdminLTE</a>.</strong> All rights reserved. Made with 😠
		</footer>
	</div>
	<!-- ./wrapper -->
	<!-- SlimScroll -->
	<script src="js/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="js/adminlte.min.js"></script>
	<script src="js/generic.js"></script>
	<script src="js/app.js"></script>
	<script>
	function do_load(page){
		refresh(page);
		$.ajax({
			url:page+'.php',
			data:{},
			dataType:'html',
			success:function(html){
			$("#main-container").html(html);
			}
		});
	}

	function refresh(page){
		localStorage.setItem("refresh", page);
	}

	//check for Navigation Timing API support
	if (window.performance) {
		console.info("window.performance works fine on this browser");
	}
	if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
		do_load(localStorage.getItem("refresh"));
	} else {
		console.info( "This page is not reloaded");
	}
	</script>
</body>

</html>