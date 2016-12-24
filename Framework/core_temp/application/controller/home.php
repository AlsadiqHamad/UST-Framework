<?php
	class Home extends Application
	{
		function __construct()
		{
			//$this->loadModel('model_admin');
			//$this->loadLib('test');
			if (!isset($_SESSION['conf']['user']))
			{
			header('Location:'.PATH.'account');
			}
			
		}
		
		function index()
		{
			$da=$_SESSION['conf']['table'];
			
			$arr= R::findAll("$da");
		   $data['data']=$arr ;
		   $this->loadView('home/home',$data);
			
			
			
		}
           function save()//add process
		{
		$da=$_SESSION['conf']['table'];
		$main = R::dispense("$da");
  
        foreach($_POST as $key=>$value){
             $main->$key=$value;
             } 

           $id = R::store( $main );
		   echo'<script Language="javascript">alert("Recod Saved");</script>';
		   header('Location:'.PATH.'home');
		}
	
		 function update($id)
		 {
		  $da=$_SESSION['conf']['table'];
		 $se= R::load("$da", $id );
		 $data['data']=$se ;
		$this->loadView('home/update',$data);
		 }

		  function delete($id)
		 {
		 
		  //R::exec("delete from main WHERE id=$id");
		 $da=$_SESSION['conf']['table'];
		
		  $se= R::load("$da", $id );
		   R::trash($se);
		   
		   header('Location:'.PATH.'home/show');
		 }

		function add()
		{
	   
		$this->loadView('home/add');
		}
		function updates($id)//update Process
		 {
		 
		  $da=$_SESSION['conf']['table'];
		 $se= R::load("$da", $id );
		 
        foreach($_POST as $key=>$value){
             $se->$key=$value;
             } 

           $id = R::store($se);
		   echo'<script Language="javascript">alert("Recod Saved");</script>';
		   header('Location:'.PATH.'home');
		 }
		
	}
?>