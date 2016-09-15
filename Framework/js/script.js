$(document).ready(function(){
	
ob_saas.init();

});
var ob_saas = {

	    init:function(){
	
        $("#buildForm").hide(); 
        
		$("#backboneForm").submit(function(){
		
		
			$.tzPOST($("#op").val(),$(this).serialize(),function(r){
				
					    if(r.error)
						
						{
						ob_saas.displayMsg(r.error);
						}else{
						ob_saas.displayMsg(r.msg);
						$("#buildForm").show(); 
					    $("#backboneForm").remove(); }
					    
	                      });
			

			return false;
		});//end submit form build	
///////////////////////////////////////////////////////////////////////////		
var next = 1;	
$("#add").click(function (e) {
 
  next = next + 1;
 $("#buildForm").append('<div><input   id="field' + next + '" name="field' + next + '" type="text"><button class="delete">Delete</button></div>'); });
 $("body").on("click", ".delete", function (e) {
    $(this).parent("div").remove();
});
 
/////////////////////////////////////////////		
$('#buildForm').submit(function(){

			$.tzPOST($('#op').val(),$(this).serialize(),function(r){
				if(r.error)
				ob_saas.displayMsg(r.error);
				else
				$("#buildForm").append(r.msg);
			});

return false;
});	//end submit form build	
		

	},
	

	displayMsg: function(data){
		var elem = $('<div>', {id:'msg1',html:data}  );
		elem.click(function(){
			$(this).fadeOut(function(){$(this).remove();});
		});
		setTimeout(function(){
			elem.click();
		},5000);
		elem.hide().appendTo('body').slideDown();
	}

};

$.tzPOST = function(action,data,callback){
	$.post('Framework/core.php?action='+action,data,callback,'json');
}

$.tzGET = function(action,data,callback){
	$.get('Framework/core.php?action='+action,data,callback,'json');
}
