<!-- Modal HTML -->
<div id="login" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Member Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?= ($BASE.'/user/authenticate') ?>" method="post">
					<div class="form-group">
						<i class="fa fa-at"></i>
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="text" class="hptrap"/>
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<a href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>
