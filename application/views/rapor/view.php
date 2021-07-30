<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<a href="<?php echo base_url("rapor/form"); ?>" class="btn btn-info">UNGGAH DATA</a>
	<a href="<?php echo base_url("rapor/export"); ?>" class="btn btn-info">REKAP DATA</a>

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
			<col style="background-color:#fff">
			<col style="background-color:#f1d3a1">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#e3dbd9">
			<col style="background-color:#fff">
			<col style="background-color:#E5DB9C">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#89b4c4">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#E6A57E">
			<col style="background-color:#fff">
			<col style="background-color:#fff">
			<col style="background-color:#F5BFD2">
			<col style="background-color:#EB96AA">
		</colgroup>
		<thead>
			<tr>
				<th>Cabang Pelabuhan</th>
				<th>Temuan SPI</th>
				<th>Nilai Amanah</th>
				<th>Level Of Service (ET/BT)</th>
				<th>Tingkat partisipasi pelatihan</th>
				<th>Availability Alat</th>
				<th>Utilisasi Alat </th>
				<th>Nilai KOMPETEN</th>
				<th>Kolaborasi Tim Internalisasi Budaya</th>
				<th>Nilai HARMONIS</th>
				<th>Revenue</th>
				<th>Efisiensi</th>
				<th>Nilai LOYAL</th>
				<th>Koreksi Nota </th>
				<th>Penggunaan Modul SD</th>
				<th>Nilai ADAPTIF</th>
				<th>Realisasi KPI Feb</th>
				<th>Realisasi PKM Feb</th>
				<th>Nilai KOLABORATIF</th>
				<th>NILAI TOTAL</th>
				<th>Tanggal Upload</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if (!empty($rapor)) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
				foreach ($rapor as $data) { ?>
					<tr>

						<th><?php echo $data->cabang ?></th>
						<th><?php echo $data->temuan . '%'  ?></th>
						<th><?php echo $data->nilai_amanah . '%'  ?></th>
						<th><?php echo $data->level . '%'  ?></th>
						<th><?php echo $data->tingkat . '%'  ?></th>
						<th><?php echo $data->avail . '%'  ?></th>
						<td><?php echo $data->util . '%' ?></td>
						<td><?php echo $data->avail . '%' ?></td>
						<td><?php echo $data->nilai_kompeten . '%' ?></td>
						<td><?php echo $data->kaloborasi . '%' ?></td>
						<td><?php echo $data->nilai_harmonis . '%' ?></td>
						<td><?php echo $data->revenue . '%' ?></td>
						<td><?php echo $data->efisiensi . '%' ?></td>
						<td><?php echo $data->nilai_loyal . '%' ?></td>
						<td><?php echo $data->koreksi . '%' ?></td>
						<td><?php echo $data->modul . '%' ?></td>
						<td><?php echo $data->nilai_adaptif . '%' ?></td>
						<td><?php echo $data->realisasi_kpi . '%' ?></td>
						<td><?php echo $data->realisasi_pkm . '%' ?></td>
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