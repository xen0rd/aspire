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
		<div class="container">
			<br>
			<br>
			<div class="row">
				<fieldset>
					<legend>Registered Users</legend>
					<div class="col-md-12">
						<div class="table">
							<table id="usersTable">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Gender</th>
										<th>Newsletter</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<td>First Name</td>
										<td>Last Name</td>
										<td>Email</td>
										<td>Gender</td>
										<td>Newsletter</td>
										<td>Action</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</fieldset>
			</div>
			<br>
			<br>
			<div class="row">
				<fieldset>
					<legend>User Registration</legend>
					<div class="col-md-6">
						<?=form_open(base_url() . "auth/register")?>
							<div class="form-group">
								<label class="label label-primary" for="fname">First Name</label>
								<input class="form-control" id="fname" type="text" name="first_name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label class="label label-primary" for="lname">Last Name</label>
								<input class="form-control" id="lname" type="text" name="last_name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<label class="label label-primary" for="email">Email</label>
								<input class="form-control" id="email" type="text" name="email_address" placeholder="Email Address" required>
							</div>
							<div class="form-group">
								<label class="label label-primary" for="username">Password</label>
								<input class="form-control" type="password" name="password" placeholder="Password" required>
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
							<div class="form-group">
								<input class="btn btn-success" type="submit">
							</div>
						<?=form_close()?>
					</fieldset>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="delete_user">
			<div class="modal-dialog">
				<div class="modal-content">
				</div>
			</div>
		</div>
		
	<script>
		$(function(){
			$("#delete_user").on('hidden.bs.modal', function () {
			    $(this).data('bs.modal', null);
			});
			
			loadUsers();
			
			function loadUsers() {
		        table = $('#usersTable').DataTable({
		            "ajax": '<?php echo site_url('admin/users'); ?>',
		            "bDestroy": true,
		            "iDisplayLength": 10,
		            "columns": [
						{"data": "first_name"},
		                {"data": "last_name"},
		                {"data": "email_address"},
		                {"data": "gender"},
		                { 
		                    "data": null, 
		                    render: function (row) {
			                    		var action = row.newsletter == 1 ? "Enabled" : "Disabled";
			                    		return action;
		                            }
		                },
		                {"data": null, 
							render: function (row) {
								var details = '<a class="btn btn-danger btn-sm" href="<?=base_url()?>admin/deleteUser/' + row.user_id + '" data-toggle="modal" data-target="#delete_user">Delete</a>';
								return details;
							}
		                }
		            ],
		            "fnInitComplete": function () {
		                
		            }
		        });
		    }
		});
	</script>
	
	<script>
		$(function(){
			<?=$this->session->flashdata("success_message") != null ? 'toastr.success("' . $this->session->flashdata("success_message") . '");' : null?>
			<?=$this->session->flashdata("error_message") != null ? 'toastr.error("' . $this->session->flashdata("error_message") . '");' : null?>
		});
	</script>
	
	</body>
</html>