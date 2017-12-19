<?=link_tag(base_url() . "_assets/css/bootstrap.css")?>
<?=link_tag(base_url() . "_assets/css/jquery.dataTables.css")?>
<?=link_tag(base_url() . "_assets/css/toastr.css")?>
<html>
	<head>
		<script src="<?=base_url()?>_assets/js/jquery-3.1.1.min.js"></script>	
		<script src="<?=base_url()?>_assets/js/bootstrap.js"></script>
		<script src="<?=base_url()?>_assets/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>_assets/js/toastr.min.js"></script>
	</head>
	<body>
		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php if($this->session->userdata("email") == NULL){?>
						<?=form_open(base_url() . "auth/login")?>
						<div class="form-group">
							<label class="label label-primary" for="email">Username</label>
							<input class="form-control" id="email" type="text" name="email" placeholder="Email Address" required>
						</div>
						<div class="form-group">
							<label class="label label-primary" for="username">Password</label>
							<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input class="btn btn-success" type="submit" value="Login">
						</div>
						<?=form_close()?>
					<?php } else {?>
						<a href="<?=base_url() . 'auth/logout'?>" class="btn btn-success">Logout</a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<script>
		$(function(){
			<?=$this->session->flashdata("success_message") != null ? 'toastr.success("' . $this->session->flashdata("success_message") . '");' : null?>
			<?=$this->session->flashdata("error_message") != null ? 'toastr.error("' . $this->session->flashdata("error_message") . '");' : null?>
		});
		</script>
		
	</body>
</html>