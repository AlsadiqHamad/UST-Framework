<?php
	class Account extends Application
	{
		function __construct()
		{
			$this->loadModel('model_account');
		}
		
		function index()//defult load
		{
			$this->loadView('view_account_login');
		}

		 function login()//login user
		 {
		 
		 $msg ="not login";
				if(isset($_POST['log']))
				{
				$msg = $this->model_account->check($_POST);
				}	
		 header('Location:'.PATH.'account');////////////////////
		 }
		 
		 function reg()//login user
		 {
		 $this->loadView('view_account_register');
		 }
		 function register()//register new user
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
		 $this->loadView('view_account_login');
		 }
	}
?>