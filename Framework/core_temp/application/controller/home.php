<?php
	class Home extends Application
	{
		function __construct()
		{
			//$this->loadModel('model_admin');
			//$this->loadLib('test');
			
		}
		
		function index()
		{
		
		$arr= R::findAll('main');
		$data['data']=$arr ;
		$this->loadView('home',$data);
		}
           function save()
		{
		
		$main = R::dispense('main');
  
        foreach($_POST as $key=>$value){
             $main->$key=$value;
             } 

           $id = R::store( $main );
		   echo'<script Language="javascript">alert("Recod Saved");</script>';
		   header('Location:'.PATH.'home');
		}
		
       function show()
		{
	    $arr= R::findAll('main');
		$data['data']=$arr ;
		$this->loadView('home',$data);
		}
		 function update($id)
		 {
		 
		 $se= R::load('main', $id );
		 $data['data']=$se ;
		$this->loadView('update',$data);
		 }

		  function delete($id)
		 {
		 
		  //R::exec("delete from main WHERE id=$id");
		 
		  $se= R::load('main', $id );
		   R::trash($se);
		   
		   header('Location:'.PATH.'home/show');
		 }

		function add()
		{
	   
		$this->loadView('add');
		}
		function updates($id)
		 {
		 
		 
		 $se= R::load('main', $id );
		 
        foreach($_POST as $key=>$value){
             $se->$key=$value;
             } 

           $id = R::store($se);
		   echo'<script Language="javascript">alert("Recod Saved");</script>';
		   header('Location:'.PATH.'home');
		 }
		
	}
?>