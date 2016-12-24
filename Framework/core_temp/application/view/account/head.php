<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

<title>Online SaaS FrameWork </title>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="<?= PATH?>system/asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PATH?>system/asset/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?= PATH?>system/asset/css/style.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>    
<body >

<div class="container">

<!-- logo gov-->
 <nav class="nav navbar navbar-fixed-top navbar-inverse ">
      <a class="navbar-brand" href="#">USTBOX_Framework</a>
      
      <ul class="nav navbar-nav">
        <li class="nav-item ">
          <a class="nav-link " href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
		   
       
	  </ul>
	  
	  <ul class="nav navbar-nav navbar-right">
		 <?php if (!isset($_SESSION['conf']['user'])):?>
                        
						<li> <a></a>    </li>
                  <?php else: ?>
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Hello  :<?=$_SESSION['conf']['user']?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= PATH?>account/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
								
                            </ul>
                        </li>
						 <li >sdfdsdf
						 </li >
                   <?php endif; ?>
			 </ul>
     
      
    </nav>
	


</div><!--end container  -->

