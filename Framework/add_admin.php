<?php
session_name('SaaS_App');
session_start();

@$db= $_SESSION['step1']['dbn'];
@$app= $_SESSION['step1']['path'];

require 'module/rb.php';
require 'db.config.php';



if(isset($_POST['admin']))

{  

R::setup( "mysql:host=".$dbOptions['db_host'].";dbname=$db",$dbOptions['db_user'],$dbOptions['db_pass']); 
  
$admin = R::dispense('admin');

$admin->user=$_POST['user'];
$admin->pass=$_POST['pass'];
R::store($admin);

session_destroy();
unlink("../Apps/$app/generateForm.php");
header("Location:../Apps/$app");
 die();

}

  ?>

<!doctype html>
<html lang="ar">
<head>
<meta charset="utf-8">
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="img/favicon.ico">

<title>Online Platform SaaS FrameWork MltiTeanncy</title>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"  />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>

<body >
 <nav class="nav navbar navbar-fixed-top navbar-inverse ">
      <a class="navbar-brand" href="#">UST-BOX Framework</a>
      
      <ul class="nav navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
       
	  </ul>
	       
 </nav>
<div class="container">




<!--   -->


 <div class="row" align="center">
 

<h1>UST-BOX Framework</h1>
<h3> Crate Application Admin</h3>

                
<form action="add_admin.php" method="post" name="frm">
<label >User Name </label><input type="text" name="user" /><br />
<label >PassWord </label><input type="pass" name="pass"/>
<input type="hidden" name="admin" value="admin"/><br />
<input type="submit" class="btn btn-primary" value="Create Admin"/>
</form>

</div>
</div><!-- end container-->
 <script src="js/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>