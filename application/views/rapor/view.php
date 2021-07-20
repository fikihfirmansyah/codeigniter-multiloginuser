<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<a href="<?php echo base_url("rapor/form"); ?>" class="btn btn-info">UPLOAD DATA</a>
	<a href="<?php echo base_url("rapor/export"); ?>" class="btn btn-info">EXSPORT DATA</a>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<b>Rekap Rapor Akhlak</b>
		</h1><br>

	</section>

	<!-- Main content -->
	<table id="table1" class="table table-bordered table-hover">
		<colgroup>
			<col style="background-color:#fff">
			<col style="background-color:#f1d3a1">
			<col style="background-color:#e3dbd9">
			<col style="background-color:#E5DB9C">
			<col style="background-color:#89b4c4">
			<col style="background-color:#E6A57E">
			<col style="background-color:#F5BFD2">
			<col style="background-color:#EB96AA">
		</colgroup>
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
				<th>Tanggal Upload</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if (!empty($rapor)) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
				foreach ($rapor as $data) { ?>
					<tr>

						<th><?php echo $data->cabang ?></th>
						<td><?php echo $data->nilai_amanah . '%' ?></td>
						<td><?php echo $data->nilai_kompeten . '%' ?></td>
						<td><?php echo $data->nilai_harmonis . '%' ?></td>
						<td><?php echo $data->nilai_loyal . '%' ?></td>
						<td><?php echo $data->nilai_adaptif . '%' ?></td>
						<td><?php echo $data->nilai_kolab . '%' ?></td>
						<td><?php echo $data->nilai_total . '%' ?></td>
						<td><?php echo $data->created_at ?></td>
					</tr>

				<?php } ?>
			<?php } else { // Jika data tidak ada
				echo "<tr><td>Data tidak ada</td></tr>";
			}
			?>

		</tbody>
	</table>