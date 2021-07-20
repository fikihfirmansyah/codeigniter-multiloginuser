<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/iCheck/icheck.min.js"></script>

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
<script>
	window.onload = function() {
		<?php if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		} ?>
	}

	function effect_msg_form() {
		$('.form-msg').slideDown(1000),
			setTimeout(function() {
				$('.form-msg').slideUp(1000);
			}, 3000)
	}

	function effect_msg() {
		$('.msg').show(1000),
			setTimeout(function() {
				$('.msg').fadeOut(1000);
			}, 3000)
	}
</script>