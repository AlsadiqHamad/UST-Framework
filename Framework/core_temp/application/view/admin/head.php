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

<title>Online Platform SaaS FrameWork MltiTeanncyz</title>

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
 <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="sr-only">القائمة</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <span>UST_BOX</span>
                </a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapse-main">
                <ul class="nav navbar-nav navbar-left">
                        		   
                         

                         
                </ul>
				
				
				<ul class="nav navbar-nav navbar-right">
		 <?php if (!isset($_SESSION['conf']['admin'])):?>
                        
						<li> <a></a>    </li>
                  <?php else: ?>
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Hello  :<?=$_SESSION['conf']['admin']?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= PATH?>account/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
								
                            </ul>
                        </li>
						
                   <?php endif; ?>
			 </ul>
				
				
				
            </div>
		
        </div>
    </nav>
