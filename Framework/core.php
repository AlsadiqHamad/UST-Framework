<?php
session_name('SaaS_App');
session_start();





require "module/Builder.class.php";
require "module/DB.class.php";
require "db.config.php";


class core{


public  function run($cmd,$dbs){

try{

    
        DB::init($dbs);

        $response = array();

        

        switch($cmd){

                case 'backbone':
                        $response = Builder::create_app_basic($_POST);
                break;

			        	case 'build':
                        $response = Builder::generate_form($_POST);
                break;

               

                default:
                        throw new Exception('Wrong action');
        }

        echo json_encode($response);
}
catch(Exception $e){
        die(json_encode(array('error' => $e->getMessage())));
}




}//end Function


}//End Class



$pb= new core;

$pb->run($_GET['action'],$dbOptions);




?>
