<?php include'head.php'; ?>

<div class="container"> 
<div class="row" align="center">
<h1>Admin Login</h1>
<form id="regform" method="post" action="<?= PATH?>admin/login">
<label for="user">username</label>
<input id="user" name="user"  /> <br />

<label for="pass">password</label>
<input id="pass" name="pass"  /><br />
<input type="hidden" value="log" name="log">

<button type="submit" class="btn btn-lg btn-primary">
   <i class="fa fa-btn fa-sign-in"></i> Login
  </button><a href="<?= PATH?>account"> Back</a>
</form>

</div> 
<!-- end show-->
</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>
</body>
</html>
