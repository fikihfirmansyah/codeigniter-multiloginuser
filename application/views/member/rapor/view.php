<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<a href="<?php echo base_url("member/rapor/form"); ?>" class="btn btn-info">UPLOAD DATA</a>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Tables
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
		</ol>
	</section>

	<!-- Main content -->
	<table id="table1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Cabang Pelabuhan</th>
				<th>Nilai Amanah</th>
				<th>Nilai Kompeten</th>
				<th>Nilai Harmonis</th>
				<th>Nilai Loyal</th>
				<th>Nilai Adaptif</th>
				<th>Nilai Kolaboratif</th>
				<th>Nilai Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($rapor)) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
				foreach ($rapor as $data) { ?>
					<tr>
						<th scope="row"><?php echo $data->cabang ?></th>
						<td><?php echo $data->nilai_amanah ?></td>
						<td><?php echo $data->nilai_kompeten ?></td>
						<td><?php echo $data->nilai_harmonis ?></td>
						<td><?php echo $data->nilai_loyal ?></td>
						<td><?php echo $data->nilai_adaptif ?></td>
						<td><?php echo $data->nilai_kolab ?></td>
						<td><?php echo $data->nilai_total ?></td>
					</tr>

				<?php } ?>
			<?php } else { // Jika data tidak ada
				echo "<tr><td>Data tidak ada</td></tr>";
			}
			?>

		</tbody>
	</table>