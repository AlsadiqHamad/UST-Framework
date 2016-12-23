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
		
			$this->loadView('Home');
		}


		
	}
?>