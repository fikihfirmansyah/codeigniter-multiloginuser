<?php echo anchor('admin/person', 'Back'); ?>
<table>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?= $person->name ?></td>
	</tr>
	<tr>
		<td>NIPP</td>
		<td>:</td>
		<td><?= $person->nipp ?></td>
	</tr>
	<tr>
		<td>email</td>
		<td>:</td>
		<td><?= $person->email ?></td>
	</tr>
	<tr>
		<td>phone</td>
		<td>:</td>
		<td><?= $person->phone ?></td>
	</tr>
	<tr>
		<td>photo</td>
		<td>:</td>
		<td><?= $person->photo ?></td>
	</tr>
	<tr>
		<td>activated</td>
		<td>:</td>
		<td><?= $person->activated ?></td>
	</tr>
</table>
