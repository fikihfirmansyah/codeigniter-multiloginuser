<?php echo anchor('admin/person', 'Back'); ?>
<form action="<?= base_url('admin/person/create') ?>" method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="first_name"></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>phone</td>
			<td><input type="text" name="phone"></td>
		</tr>
		<tr>
			<td>photo</td>
			<td><input type="text" name="photo"></td>
		</tr>
		<tr>
			<td>activated</td>
			<td><input type="text" name="activated"></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
