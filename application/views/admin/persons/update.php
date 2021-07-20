<?php echo anchor('admin/person', 'Back'); ?>
<form action="<?= base_url('admin/person/update') ?>" method="post"><br>
	<table>
	<tr>
		<div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" name="username" value="<?= $person->username ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" name="name" value="<?= $person->name ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">
                    <label for="exampleInputNIPP1">NIPP</label>
                    <input type="text" class="form-control" id="exampleInputNIPP1" placeholder="Masukkan NIPP" name="nipp" value="<?= $person->nipp ?>">
                  </div>
		</tr>
		<tr>
		<div class="form-group">
                    <label for="exampleInputNIPP1">NIPP</label>
					<select type="text" name="branch" class="form-control" required placeholder="Branch" value="<?= $person->branch ?>">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<option value="Kantor Pusat">Kantor Pusat</option>
			<option value="Belawan">Belawan</option>
			<option value="Dumai">Dumai</option>
			<option value="TPK Belawan">TPK Belawan</option>
			<option value="Tanjung Pinang">Tanjung Pinang</option>
			<option value="Pekan Baru">Pekan Baru</option>
			<option value="Tanjung Balai Karimun">Tanjung Balai Karimun</option>
			<option value="Kuala Tanjung">Kuala Tanjung</option>
			<option value="Batam">Batam</option>
			<option value="Sei Pakning">Sei Pakning</option>
			<option value="Sibolga">Sibolga</option>
			<option value="Malahayati">Malahayati</option>
			<option value="Lhokseumawe">Lhokseumawe</option>
			<option value="Tanjung Balai Asahan">Tanjung Balai Asahan</option>
			<option value="Gunung Sitoli">Gunung Sitoli</option>
			<option value="Unit Galangan Kapal">Unit Galangan Kapal</option>
		</select>                  </div>
		</tr>

			<?php echo form_error('branch','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
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
