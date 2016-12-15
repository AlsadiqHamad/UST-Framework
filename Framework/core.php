<?php
session_name('SaaS_App');
session_start();


$dbOptions = array(
        'db_host' => 'localhost',
        'db_user' => 'root',
        'db_pass' => '',
        'db_name' => 'coreDB'
);



require "module/Builder.class.php";
require "module/DB.class.php";
try{

    
        DB::init($dbOptions);

        $response = array();

        

        switch($_GET['action']){

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

?>
