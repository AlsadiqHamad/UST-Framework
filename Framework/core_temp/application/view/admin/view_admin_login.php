<?php include'head.php'; ?>

<!--sdfasdfas -->
  <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Application Administrator</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="<?= PATH?>admin/login" method="POST">
							<fieldset>
								
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="user" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="pass" type="password" value="">
											</div>
										</div>
										<div class="form-group">
										    <input type="hidden" value="log" name="log">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						 
					</div>
                </div>
			</div>
		</div>
	</div><!--sdfasdfas -->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>
</body>
</html>
