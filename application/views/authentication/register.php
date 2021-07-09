<div class="register-box">
	<div class="register-logo">
	<img width="64" src="<?php echo base_url() ;?>/assets\uploads\images\<?php echo $site['logo']?>" /><br>

		<a href="<?php echo base_url() ;?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Daftar Akun Baru</p>
		<?php echo form_open('auth/check_register','') ;?>
		<div class="form-group has-feedback">
			<input type="text" name="name" class="form-control" required placeholder="Nama Lengkap">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo form_error('name','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback">
			<input type="text" name="username" class="form-control" required placeholder="Username">
			<span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
			<?php echo form_error('username','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" required placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?php echo form_error('email','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback">
			<input type="text" name="phone" class="form-control" required placeholder="Nomor HP">
			<span class="glyphicon glyphicon-phone form-control-feedback"></span>
			<?php echo form_error('phone','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="password" class="form-control" required placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo form_error('password','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="konfirmasi_password" class="form-control" required placeholder="Konfirmasi Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo form_error('konfirmasi_password','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="row">
			<div class="col-xs-4">
		      <button type="submit" class="btn btn-primary btn-block btn-flat">DAFTAR</button>
		      <?php echo form_close() ;?>
			</div>
		</div><br>
		<a href="<?php echo base_url('auth/login') ;?>" class="text-center">Saya sudah punya akun</a>
	</div>
</div>
