<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/uploads/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php'); ?>

	<!-- css -->
	<?php require_once('_css.php'); ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Amanah", "Kompeten", "Harmonis", "Loyal", "Adaptif", "kolaboratif"],
				datasets: [{
					label: <?php echo json_encode($cabang); ?>,
					data: [
						<?php echo json_encode($diagrams->ilai_amanah); ?>,
						<?php echo json_encode($diagrams->nilai_kompeten); ?>,
						<?php echo json_encode($diagrams->nilai_harmonis); ?>,
						<?php echo json_encode($diagrams->nilai_loyal); ?>,
						<?php echo json_encode($diagrams->nilai_adaptif); ?>,
						<?php echo json_encode($diagrams->nilai_kolab); ?>,
					],



					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1


				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('_header.php'); ?>
		<!-- sidebar -->
		<?php require_once('_sidebar.php'); ?>
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<?php echo $contents; ?>
			</section>
		</div>
		<!-- footer -->
		<?php require_once('_footer.php'); ?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- js -->
	<?php require_once('_js.php'); ?>
</body>

</html>