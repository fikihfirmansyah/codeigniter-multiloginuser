<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%" text-align="center" vertical-align="middle" line-height="90px";>
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Nomor HP</th>
				<th>Status</th>
				<th class="text-center" width="160px" style="padding-left: 20px;">Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($persons as $person) { ?>
				<tr>
					<td class="text-center" text-align="center" vertical-align="middle" line-height="90px";><?= $no++ ?></td>
					<td><?= $person->name ?></td>
					<td><?= $person->email ?></td>
					<td><?= $person->phone ?></td>
					<td><?php if($person->activated == "1"){ 
						echo "Aktif";
					}else{
						echo "Non-Aktif";
					}
					?>					
					<td class="text-center" width="160px" text-align="center" vertical-align="middle" line-height="90px"; style="padding-left: 20px;">

					<?php echo anchor('admin/person/edit/' . $person->id, '<button type="button" class="btn btn-block btn-warning btn-xs" onClick=\'return confirm("are you sure you want to delete??");\'>Edit</button>'); ?> <br>
					<?php echo anchor('admin/person/delete/' . $person->id, '<button type="button" class="btn btn-block btn-danger btn-xs"onClick=\'return confirm("are you sure you want to delete??");\'>Delete</button>'); ?>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
