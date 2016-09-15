<?php
	class Home extends Application
	{
		function __construct()
		{
			//$this->loadModel('model_admin');
		}
		
		function index()//defult load
		{
		
			$this->loadView('Home');
		}


		
	}
?>