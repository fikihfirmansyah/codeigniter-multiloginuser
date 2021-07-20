<!-- JavaScript -->
<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
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

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets'); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets'); ?>/dist/js/demo.js"></script>
<!-- page script -->
<script>
	$(function() {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': false
		})
	})
</script>
<script>
	$(document).ready(function() {
		$('#table1').DataTable()
	})
</script>