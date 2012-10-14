$(document).ready(function() {
    //initialize       
	$(".endContainer, .grid2, .grid3").hide()
    $(".contribute-submit, .contribute1, .contribute1-1, .contribute2, .contribute2-1, .contribute3, .contribute3-1").attr('disabled','disabled')
	$('input[name=know]').change(function(){
    var c = this.checked
   //disable all other fields
   if(c){
   $(".contribute,.contribute-submit, .contribute1, .contribute1-1, .contribute2, .contribute2-1, .contribute3, .contribute3-1").attr('disabled','disabled')
	 $(".grid2,.grid3").show();
	 }
	 else{
    reset_fields();	

	 }
   });

        $(".contribute").change(function(){
		//ger multiple powercut value
		   num = $(".contribute option:selected").val()
			 $(".success-tick").show()
			 $(".contribute1").removeAttr('disabled')
			  $(".contribute1").removeClass("current")
			 $(".contribute1").addClass("current")
			 //detect last div
			 if(num==1)
			  last_div = ".contribute1-1";
			  $(".grid3, .grid2").hide();
		      if(num==2){
			  $(".grid2").show();
			  $(".grid3").hide();
			  last_div = ".contribute2-1";
			  }
			  if(num==3){
			  $(".grid2,.grid3").show();
			  last_div = ".contribute3-1";
			  }
		    });

			//@todo, generalize this process
			 $(".contribute1").change(function(){
			 $(".contribute1-1").removeAttr('disabled')
			  $(".contribute1").removeClass("current")
			 $(".contribute1-1").addClass("current")
			 })
			  $(".contribute1-1").change(function(){
			  selected = $(".contribute1-1 option:selected").val()
			  //fill 2-1,3-1 with values of 1-1
			  $(".contribute2-1,.contribute3-1").val( selected ).attr('selected',true);
			   $(".success-tick1").show()
			  $(".contribute2").removeAttr('disabled')
			  $(".contribute1-1").removeClass("current")
			 $(".contribute2").addClass("current")
			 if(last_div==".contribute1-1")
			 $(".contribute-submit").addClass("btn-primary")
			 $(".contribute-submit").removeAttr('disabled')
			 });
			  $(".contribute2").change(function(){
			   $(".contribute2-1").removeAttr('disabled')
			  $(".contribute2").removeClass("current");
			  $(".contribute3").removeAttr('disabled');
			 $(".contribute2-1").addClass("current")
			 //optionaly make button clickable
			  $(".contribute-submit").addClass("btn-primary")
			 $(".contribute-submit").removeAttr('disabled')
			 });
			   $(".contribute2-1").change(function(){
			   $(".success-tick2").show()
			   $(".contribute3").removeAttr('disabled')
			  $(".contribute2-1").removeClass("current")
			  if(last_div==".contribute2-1")
			 $(".contribute-submit").addClass("btn-primary")
			 $(".contribute-submit").removeAttr('disabled')
			 $(".contribute3").addClass("current")
			 });
			    $(".contribute3").change(function(){
			   $(".contribute3-1").removeAttr('disabled')
			  $(".contribute3").removeClass("current")
			 $(".contribute3-1").addClass("current")
			 //optionaly make button clickable
			  $(".contribute-submit").addClass("btn-primary")
			 $(".contribute-submit").removeAttr('disabled')
			 });
			 $(".contribute3-1").change(function(){
			   $(".success-tick3").show()
			    $(".contribute3-1").removeClass("current")
				 $(".contribute-submit").addClass("btn-primary")
				 if(last_div==".contribute3-1")
			 $(".contribute-submit").addClass("btn-primary")
			 $(".contribute-submit").removeAttr('disabled')
			 });

		 //handle submit
		 $(".contribute-submit").click(function(){
		         var content = new Array();
				 content[0]=$(".contribute option:selected").val()
				 content[1]=$('input[name=know]:checked').val()
                 content[2]=$(".contribute1 option:selected").val()
				 content[3]=$(".contribute1-1 option:selected").val()
				  num_pc = $(".contribute option:selected").val()
				  if(num_pc==2)
				  {
				  content[4]= $(".contribute2 option:selected").val()
				  content[5]= $(".contribute2-1 option:selected").val()
				  }
				   if(num_pc==3)
				  {
				 content[6] = $(".contribute3 option:selected").val()
				 content[7] = $(".contribute3-1 option:selected").val()
				 }
				 url = "contribute/switch?content="+content
	 
			//@todo do inline validation 
				$.get(url, {
			}, 
			function(data){   		 
				//return from server
	          // $(".endContainer").show()
			    $(".endContainer .alert").append(data).show();
			})
            return false;
		 });
				  
			
			 });
			 //reset fields
  function reset_fields()
		 {
$("select").each( function(){
	 $(".grid2,.grid3").hide();
	  $(".contribute").removeAttr('disabled','disabled');
	  $(".success-tick1,.success-tick, .success-tick2").hide();
	// set its value to its first option
	$(this).val( $("#" + $(this).attr("id") + " option:first").val() );
	 $(".contribute-submit, .contribute1, .contribute1-1, .contribute2, .contribute2-1, .contribute3, .contribute3-1").attr('disabled','disabled')
	
	  return false;
});
}