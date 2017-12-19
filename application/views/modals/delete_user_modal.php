<?=form_open(current_url())?>	
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Delete User</h4>
	</div>
	<div class="modal-body">
		<p>Are you sure you want to delete this user?</p>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="department_id" value="<?=$this->uri->segment(3)?>">
		<input type="submit" class="btn btn-danger" value="Yes">
		<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	</div>
<?=form_close()?>