<?=form_open(current_url())?>	
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Update User</h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label class="label label-primary" for="fname">First Name</label>
			<input class="form-control" id="fname" type="text" name="first_name" placeholder="First Name" value="<?=$userDetails->first_name?>" required>
		</div>
		<div class="form-group">
			<label class="label label-primary" for="lname">Last Name</label>
			<input class="form-control" id="lname" type="text" name="last_name" placeholder="Last Name" value="<?=$userDetails->last_name?>" required>
		</div>
		<div class="form-group">
			<label class="label label-primary" for="email">Email</label>
			<input class="form-control" id="email" type="text" name="email_address" placeholder="Email Address" value="<?=$userDetails->email_address?>" required>
		</div>
		<div class="form-group">
			<label class="label label-primary" for="username">Password</label>
			<input class="form-control" type="password" name="password" placeholder="Password" value="<?=$userDetails->password?>" required>
		</div>
		<div class="form-group">
			<label class="label label-primary" for="gender">Gender</label>
			<select class="form-control" name="gender" placeholder="Gender" required>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
		<div class="form-group">
			<label class="label label-primary" for="news">Newsletter</label>
			<input clsss="form-control" type="checkbox" id="news" name="newsletter">
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="user_id" value="<?=$this->uri->segment(3)?>">
		<input type="submit" class="btn btn-danger" value="Save">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	</div>
	
	<script>
		$(function(){
			$("select").val("<?=$userDetails->gender?>");
			
			if(<?=$userDetails->newsletter?> == 1){
				$("input[type=checkbox]").attr("checked", "checked");
			}
			else{
				$("input[type=checkbox]").attr("checked", false);
			}
		});
	</script>
<?=form_close()?>