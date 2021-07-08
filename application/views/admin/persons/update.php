<?php echo anchor('admin/person', 'Back'); ?>
<form action="<?= base_url('admin/person/update') ?>" method="post">
	<table>

		<tr>
		<div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" name="first_name" value="<?= $person->first_name ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">
                    <label for="exampleInputEmail1">Email	</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email" name="email" value="<?= $person->email ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">
                    <label for="examplePhoneEmail1">Phone</label>
                    <input type="text" class="form-control" id="examplePhoneEmail1" placeholder="Masukkan Phone" name="phone" value="<?= $person->phone ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">

		<label>Status Aktif : </label>

      <label><input type="radio" name="activated" value="1" <?php if($person->activated =='1') echo 'checked'?>>Aktif</label>
      <label><input type="radio" name="activated" value="0" <?php if($person->activated =='0') echo 'checked'?>>Non-Aktif</label></td>
	  </div>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="id" value="<?= $person->id ?>">
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
