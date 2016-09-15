<?php include'head.php'; ?>

<div class="container"> 
<div class="row" align="center">
<h1 class="fontq">login User</h1>

<form  class="form-signin" method="post" action="<?= PATH?>account/login">
<label for="user" class="sr-only">username</label>
<input id="user" name="user"   placeholder="User Name" required autofocus  /> <br />

<label for="pass" class="sr-only">password</label>

<input id="pass" name="pass"  placeholder="Password" required /><br />
<input type="hidden" value="log" name="log">

<button type="submit" class="btn btn-lg btn-primary ">
   <i class="fa fa-btn fa-sign-in"></i> Login
  </button><a href="<?= PATH?>admin/log"> Admin</a>
</form>

</div> 
<!-- end show-->
</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>

</body>
</html>
