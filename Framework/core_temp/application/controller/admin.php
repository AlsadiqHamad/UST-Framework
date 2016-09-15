<?php
	class admin extends Application
	{
		function __construct()
		{
			$this->loadModel('model_admin');
		}
		
		function index()//defult load
		{
		
			$this->loadView('admin/view_admin_login');
		}

		 function login()//login admin
		 {
		        $msg ="not login";
				if(isset($_POST['log']))
				{
				$msg = $this->model_admin->check($_POST);
				
				}

				
	          	header('Location:'.PATH.'admin/show');
		 }

		  function logout()//logout
		 {
		  
			//unset($_SESSION['conf']['user']);
             session_destroy();	
			 header("Location:.");
		 
		 }
		 function show()
		 {
			 if(isset($_SESSION['conf']['admin'])){
			 
			   $users = $this->model_admin->select();
			   $data['data']=$users ;
			   $this->loadView('admin/view_show_users',$data);
			   }else{
		    header('Location:'.PATH.'admin');
			}
		 }
		 function del($id)
		 {
		 
		 $s=R::getrow("select scma from users WHERE id=$id");
		 
		 $tab=$s['scma'];
		  
		  R::exec("delete from users WHERE id=$id");
		 
		  
		   R::exec("DROP TABLE $tab");
		   header('Location:'.PATH.'admin/show');
		 }

		
	}
?>