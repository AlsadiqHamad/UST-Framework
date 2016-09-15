<?php
session_name('SaaS_App');
session_start();

$db= $_SESSION['step1']['dbn'];

require 'module/rb.php';
  R::setup( "mysql:host=localhost;dbname=$db","root",""); 

  $main = R::dispense('main');
  
  foreach($_POST as $key=>$value){
  $main->$key=$value;
       } 

  $id = R::store( $main );
  

 header('Location:add_admin.php' );
 die();



?>