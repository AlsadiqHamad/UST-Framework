<?php
	

	class model_admin extends Application
	{
	
		function __construct()
		{
			//initial load
		}
		
function select()
{

$a= R::findAll('users'); 
		
		
return $a;
		
}

		
		function store($post)
		{
				$numr = R::count( 'users' );
				$tbname= "tab".$numr;
				$reg = R::dispense('users');
				$reg->user = $post['user'];
				$reg->pass = $post['pass'];
				$reg->orgniz = $post['org'];
				$reg->scma = $tbname;

				$id = R::store( $reg);
				 
				R::exec("create table $tbname like `main`");
				
				return "yes";
		        
		}
	
		function check($post)
		{
				$user= $post['user'];
				$pass= $post['pass'];
				$s=R::getrow( "select * from admin where user='$user' and pass='$pass'");
				if(is_null($s)){
				echo "No User Account";
				}else{
				$_SESSION['conf']=array(
							'admin'=>$s['user'],
							'table'=>'users');
					}
			return "yes";
			
		}
		

	
	}
?>