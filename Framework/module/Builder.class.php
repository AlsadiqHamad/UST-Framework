<?php


class Builder{



public static function create_app_basic($arr){

$res=DB::query("select * from coretable ");
$dbn= "db".mysqli_num_rows($res);
$appn=$arr['appname'];
$defs=$arr['desc'];
$dev_name=$arr['devname'];

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



/*


*/
    $src="core_temp";
    $dst="../Apps/$appn";
    
    Builder::create_app_folder($appn);//
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

//get form field and extraxt
    foreach($arr as $keys => $values){
     $fields[]=$values;
      }
 
foreach($fields as $field){

    if($field!='build')
       {
     $data .= '<label for="'.$field.'">'.$field.'</label>';
     $data .= '<input type="text" name="'.$field.'"> <br />'; 
      }
 }//end extrat field


//add form==========================================================================
$form='<form name="form1" method="post" action="rbdb.php">';
$form .=$data;
$form.='<input type="hidden" value="add" name="add">';
$form.='<br /><input type="submit" value="send" class="btn btn-primary" /></form>';


$myfile = fopen("../Apps/$paths/form.php", "w") or die("Unable to open file!");
fwrite($myfile, $form);
fclose($myfile);
//===============================================================================
///generate Form

$form1="<!DOCTYPE html>
<html lang\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">


    <title>UST_framework</title>

    <!-- Bootstrap core CSS -->
	<link rel=\"stylesheet\" type=\"text/css\" href=\"system/asset/css/bootstrap.min.css\">
    
    <link rel=\"stylesheet\" type=\"text/css\" href=\"system/asset/css/style.css\">
    <!-- Custom styles for this template -->
    
  </head>

  <body>

    <nav class=\"nav navbar navbar-fixed-top navbar-inverse\">
     <a class=\"navbar-brand\" href=\"#\">UST_Framework</a>
    </nav>
<div class=\"container\">
<div class=\"row\" align=\"center\">
<h1>UST Framework</h1>
<h3> Adding Master Data</h3>
";

$form1.='<form name="form1" method="post" action="../../Framework/make_form.php">';
$form1 .=$data;
$form1.='<br /><input type="submit" value="Save" class="btn btn-primary" /></form>';

$myfile1 = fopen("../Apps/$paths/generateForm.php", "w") or die("Unable to open file!");
fwrite($myfile1, $form1);
fclose($myfile1);


//////////////////write Config class------

$conf="<?php \n class conf {\n \t";

$conf.="const DB_NAME =\"$dbs\";\n\t";

$conf.="const APP_NAME =\"$paths\";\n\t";

$conf.="}\n".'?>';

//craeate config file
$hndf = fopen("../Apps/$paths/conf.php", "w") or die("Unable to open file!");
fwrite($hndf, $conf);
fclose($hndf);

///create .htaccess


$myht = fopen("../Apps/$paths/.htaccess", "w") or die("Unable to open file!");
$txt = "RewriteEngine On

RewriteBase  /UST-Framework-master/Apps/$paths/

RewriteCond %{REQUEST_FILENAME} !-f

RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php/$1 [L]";

fwrite($myht, $txt);
fclose($myht);



return array("msg"=>"<a href='Apps/$paths/generateForm.php'>Click here to add master data</a>");

}










}//class end

?>
