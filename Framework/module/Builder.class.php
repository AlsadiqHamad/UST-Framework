<?php

class Builder{

public static function create_app_basic($arr){

$res=DB::query("select * from coretable ");
$dbn= "db".mysqli_num_rows($res);
$appn=$arr['appname'];
$defs=$arr['desc'];
$dev_name=$arr['devname'];

Builder::create_app_folder($appn);//

		DB::query("
			INSERT INTO `coretable` (`app_name`, `desc`,`dev_name`,`db_name`)
			VALUES ('$appn','$defs','$dev_name','$dbn')
			");

			DB::query("create database $dbn");

$_SESSION['step1']=array(
'dbn'=>$dbn,
'path'=>$appn
 );
										          
DB::query("use $dbn;");
DB::query("CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(11) DEFAULT NULL,
  `pass` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)COLLATE='utf8_general_ci'");

DB::query("CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `scma` varchar(40) DEFAULT NULL,
  `orgniz` varchar(40) DEFAULT NULL,
  `profile` varchar(40) DEFAULT NULL,
  `timeo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)COLLATE='utf8_general_ci' ");


    $src="core_temp";
    $dst="../Apps/$appn";
    
    
    Builder::recurse_copy($src, $dst);//



return  array('msg'=>'application Created');
}


//extended function 

public static function create_app_folder($name){


if (@!mkdir('../Apps/'.$name, 0777, true))throw new Exception('Cant make app Path.');


}

public static function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                Builder::recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 






public static function generate_form($arr){

  $paths=$_SESSION['step1']['path'];
  $dbs=$_SESSION['step1']['dbn'];
  $data ="";
  $udata="";
  $showdata="";
  $showdatah="";
//get form field and extraxt
    foreach($arr as $keys => $values){
     $fields[]=$values;
      }
 
foreach($fields as $field){

    if($field!='build')
       {
     $data .= '<label for="'.$field.'">'.$field.'</label>';
     $data .= '<input type="text" name="'.$field.'"> <br />'; 
	 
	 $udata .= '<label for="'.$field.'">'.$field.'</label>';
     $udata .= '<input type="text" name="'.$field.'" value="<?= $data["'.$field.'"] ?>"> <br />';
	 
	 $showdata .= ' <td><?= $field["'.$field.'"] ?></td>';
     $showdatah .= ' <th>'.$field.'</th>';
      }
 }//end extrat field

//show view form==========================================================================
$formshow="
<?php include'head.php'; ?>
	
<div class=\"container\">
<div class=\"row\" align=\"center\">
<h1>UST-BOX Framework</h1>
<h3> CRUD</h3>
<table class=\"table table-striped\">
  <thead>
    <tr>";
$formshow.=$showdatah;
 $formshow.='   </tr>
     </thead>
     <tbody>
    <?php foreach($data as $field): ?>       		
	 <tr>';
	   $formshow.= $showdata;
      
	   $formshow.='<td><a href=\'<?= PATH?>home/update/<?= $field[\'id\'] ?>\'>
	   <button class=\'btn btn-info glyphicon\'>UPDATE</button></a></td>
	  <td><a href=\'<?= PATH?>home/delete/<?= $field[\'id\'] ?>\'><button class=\' btn btn-danger glyphicon glyphicon-trash\'> DELETE</button></a></td>
	</tr>

<?php endforeach?>



</tbody>
</table>';

$formshow.='</div>
</div>
<!-- end show-->
</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>
</body>
</html>';

$myfile = fopen("../Apps/$paths/application/view/home/home.php", "w") or die("Unable to open file!");
fwrite($myfile, $formshow);
fclose($myfile);

//add view form==========================================================================
$form="
<?php include'head.php'; ?>
	
<div class=\"container\">
<div class=\"row\" align=\"center\">
<h1>UST-BOX Framework</h1>
<h3> CRUD</h3>
";

$form.='<form name="form1" method="post" action="<?= PATH?>home/save">';
$form .=$data;

$form.='<br /><input type="submit" value="Save" class="btn btn-primary" /></form>';
$form.='</div>
</div>
<!-- end show-->
</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>
</body>
</html>';

$myfile = fopen("../Apps/$paths/application/view/home/add.php", "w") or die("Unable to open file!");
fwrite($myfile, $form);
fclose($myfile);

////=======================================================================================
//update view Form 
$formu="
<?php include'head.php'; ?>
	
<div class=\"container\">
<div class=\"row\" align=\"center\">
<h1>UST-BOX Framework</h1>
<h3> CRUD</h3>
";

$formu.='<form name="form1" method="post" action="<?= PATH?>home/updates/<?= $data["id"] ?>">';
$formu .=$udata;

$formu.='<br /><input type="submit" value="Save" class="btn btn-primary" /></form>';
$formu.='</div>
</div>
<!-- end show-->
</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>
</body>
</html>';

$myfile = fopen("../Apps/$paths/application/view/home/update.php", "w") or die("Unable to open file!");
fwrite($myfile, $formu);
fclose($myfile);
//===============================================================================
///generate Form master data

$form1="<!DOCTYPE html>
<html lang\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">


    <title>UST-BOX Framework</title>

    <!-- Bootstrap core CSS -->
	<link rel=\"stylesheet\" type=\"text/css\" href=\"system/asset/css/bootstrap.min.css\">
    
    <link rel=\"stylesheet\" type=\"text/css\" href=\"system/asset/css/style.css\">
    <!-- Custom styles for this template -->
    
  </head>

  <body>

    <nav class=\"nav navbar navbar-fixed-top navbar-inverse\">
     <a class=\"navbar-brand\" href=\"#\">UST-BOX Framework</a>
    </nav>
<div class=\"container\">
<div class=\"row\" align=\"center\">
<h1>UST-BOX Framework</h1>
<h3> Adding Master Data</h3>
";

$form1.='<form name="form1" method="post" action="../../Framework/make_form.php">';
$form1 .=$data;
$form1.='<br /><input type="submit" value="Save" class="btn btn-primary" /></form>';

$myfile1 = fopen("../Apps/$paths/generateForm.php", "w") or die("Unable to open file!");
fwrite($myfile1, $form1);
fclose($myfile1);


//////////////////write Config class------

$conf="<?xml version=\"1.0\" encoding=\"UTF-8\"?>   \n ";
$conf.="<config>\n\t";

$conf.="<DB_NAME>$dbs</DB_NAME>\n\t";

$conf.="<APP_NAME>$paths</APP_NAME> \n";

$conf.="</config>";


//craeate config file
$hndf = fopen("../Apps/$paths/config.xml", "w") or die("Unable to open file!");
fwrite($hndf, $conf);
fclose($hndf);

///create .htaccess


$myht = fopen("../Apps/$paths/.htaccess", "w") or die("Unable to open file!");
$txt = "DirectoryIndex index.php
RewriteEngine On

RewriteBase  /UST-Framework-master/Apps/$paths/

RewriteCond %{REQUEST_FILENAME} !-f

RewriteCond %{REQUEST_FILENAME} !-d

RewriteCond $1 !^(index\.php|robots\.txt)

RewriteRule ^(.*)$ index.php/$1 [L]";

fwrite($myht, $txt);
fclose($myht);



return array("msg"=>"<a href='Apps/$paths/generateForm.php'><b>Click here to add master data</b></a>");

}



}//class end

?>
