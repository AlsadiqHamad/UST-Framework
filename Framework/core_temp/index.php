<?php 
session_name('App');
session_start();


        require 'system/rb.php';
        include 'conf.php';
        $db=conf::DB_NAME;
		R::setup( "mysql:host=localhost;dbname=$db","root","");  
     
        define("BASE_PATH","http://localhost/");
       
        $path = "www/saas/Apps/".Conf::APP_NAME."/";
        
        define("PATH",BASE_PATH.$path);


        $url = $_SERVER['REQUEST_URI']; 
		
		
        $url = str_replace($path,"",$url);
		
		
 
         $array_tmp_uri= preg_split('[\\/]', $url, -1, PREG_SPLIT_NO_EMPTY);
		 
	
        
        @$array_uri['controller']         = $array_tmp_uri[0]; 
        @$array_uri['method']                = $array_tmp_uri[1]; 
        @$array_uri['var']                        = $array_tmp_uri[2]; 

        
        is_null($array_uri['controller']) ? $array_uri['controller']='home':'Do nothing';

        
        
        require_once("application/base.php");
        
        $application = new Application($array_uri);
        $application->loadController($array_uri['controller']);
        

?>
