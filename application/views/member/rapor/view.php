<div class="container" align="center">
	<h1>Data Preview</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Cabang Pelabuhan</th>
				<th scope="col">Temuan SPI</th>
				<th scope="col">Nilai Amanah</th>
				<th scope="col">Level Of Service (ET/BT)(30%)</th>
				<th scope="col">Tingkat Partisipasi Pelatihan (20%)</th>
				<th scope="col">Availability Alat (20%)</th>
				<th scope="col">Utilisasi Alat (30%)</th>
				<th scope="col">Nilai Kompeten</th>
				<th scope="col">Kolaborasi Tim Internalisasi Budaya</th>
				<th scope="col">Nilai Harmonis</th>
				<th scope="col">Revenue</th>
				<th scope="col">Efisiensi</th>
				<th scope="col">Nilai Loyal</th>
				<th scope="col">Koreksi Nota</th>
				<th scope="col">Penggunaan Modul SD</th>
				<th scope="col">Nilai Adaptif</th>
				<th scope="col">Realisasi KPI</th>
				<th scope="col">Realisasi PKM</th>
				<th scope="col">Nilai Kolaboratif</th>
				<th scope="col">Nilai Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($rapor)) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
				foreach ($rapor as $data) { ?>
					<tr>
						<th scope="row"><?php echo $data->cabang ?></th>
						<td><?php echo $data->temuan ?></td>
						<td><?php echo $data->nilai_amanah ?></td>
						<td><?php echo $data->level ?></td>
						<td><?php echo $data->tingkat ?></td>
						<td><?php echo $data->avail ?></td>
						<td><?php echo $data->util ?></td>
						<td><?php echo $data->nilai_kompeten ?></td>
						<td><?php echo $data->kaloborasi ?></td>
						<td><?php echo $data->nilai_harmonis ?></td>
						<td><?php echo $data->revenue ?></td>
						<td><?php echo $data->efisiensi ?></td>
						<td><?php echo $data->nilai_loyal ?></td>
						<td><?php echo $data->koreksi ?></td>
						<td><?php echo $data->modul ?></td>
						<td><?php echo $data->nilai_adaptif ?></td>
						<td><?php echo $data->realisasi_kpi ?></td>
						<td><?php echo $data->realisasi_pkm ?></td>
						<td><?php echo $data->nilai_kolab ?></td>
						<td><?php echo $data->nilai_total ?></td>
					</tr>

				<?php } ?>
			<?php } else { // Jika data tidak ada
				echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
			}
			?>


		</tbody>
	</table>

	<a href="<?php echo base_url("member/rapor/form"); ?>" class="btn btn-info">upload</a>
</div>