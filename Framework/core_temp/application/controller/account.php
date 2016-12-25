<?php
	class Account extends Application
	{
		function __construct()
		{
			$this->loadModel('model_account');
		}
		
		function index()//defult load
		{
			$this->loadView('account/view_account_login');
		}

		 function login()//login user
		 {
		 
		 $msg ="not login";
				if(isset($_POST['log']))
				{
				$msg = $this->model_account->check($_POST);
				}	
				
				if($msg="yes")
		       header('Location:'.PATH.'home');////////////////////
			   else
			    header('Location:'.PATH.'account');
		 }
		 
		 function reg()//Register user interface
		 {
		 $this->loadView('account/view_account_register');
		 }
		 function register()//Register user Store
		 {
		  $msg ="not registered";
				if(isset($_POST['reg']))
				{
				$msg = $this->model_account->store($_POST);
				}
			header('Location:'.PATH.'account');
		 
		 }
		  function logout()//logout
		 {
		  
			 unset($_SESSION['conf']['user']);
             session_destroy();	
			 header('Location:'.PATH.'account');
		 
		 }

		 function log()
		 {
		 $this->loadView('account/view_account_login');
		 }
	}
?>