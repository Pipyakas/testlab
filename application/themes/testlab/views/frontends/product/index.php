<div class="container page-login">
	<div class="form-wrapper col-md-5">
		<div class="item">
			<h3> <?php echo lang('msg_login') ?></h3>
		</div>
		<form class="form-login" method="post" action="<?php echo base_url() ?>index.php/login">
			<div class="form-group">
				<label><?php echo lang('msg_user_name'); ?></label>
				<input name="user_name" id="user_name" type="text" class="form-control" placeholder="Username">
				<?php echo form_error('user_name') ?>
			</div>
			<div class="form-group">
				<label><?php echo lang('msg_pwd'); ?></label>
				<input name="pwd" id="pwd" type="password" class="form-control" placeholder="Password">
				<?php echo form_error('pwd') ?>
			</div>
			<?php
			if (isset($error_msg)) {
				echo $error_msg;
			}
			?>
			<button class="btn btn-success" type="submit"><?php echo lang('msg_login') ?></button>
		</form>
	</div>
</div>