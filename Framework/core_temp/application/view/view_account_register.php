<?php include'head.php'; ?>

<div class="container"> 

 <div class="row" align="center">
 
 <h1>Register User</h1>

 
<form id="regform" method="post" action="<?= PATH?>account/register">
<label for="user">UserName</label>
<input id="user" name="user"  /> <br />

<label for="pass">Password</label>
<input id="pass" name="pass"  /><br />

<label for="org">Orgnization</label>
<input id="org" name="org"  /><br />

<label for="tdate">rent by month</label>
<select name="tdate" id="tdate">
<option value="">month</option>
<option value="">2month</option>
<option value="">3month</option>
</select>
<input type="hidden" value="reg" name="reg">
    <input type="submit" class="btn btn-primary" value="Submit" />
</form>


 
 

</div> 
<!-- end show-->



</div><!-- end container-->

<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>

</body>
</html>
