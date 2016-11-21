<form action ="" id="form1">
<input type="hidden"  value="<?php echo $id;?>" name="id">
<input name="otp" required="required"  id="otp" class="form-control name"  title="otp checker" placeholder="Please enter the otp" type="number" value="">
  <input type="hidden" name="htime" value="<?php echo $time ?>" />
<input type="submit" class="btn btn-info" id="validate">

</form>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" style="width:283px">
    <div class="modal-content" style="text-align:center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title" id="myModalLabel" style="color:red;"> <i class="fa fa-user fa-3x" aria-hidden="true"></i> Customer details</h4>
      </div>
      <div class="modal-body" style="background-color:yellowgreen">
     <form role="form" id ="myform" method="post">
     <div class="form-group">
        
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
            <p id="name1"></p>
                      </div>
          <div class="form-group">
          <input type="hidden" name="hemail" value="<?php echo $email ?>"  />
        
            <input type="number" class="form-control" name="contact" id="cont" maxlength="10" pattern="[0-9]{10}" placeholder="Contact number">
             <p id="cont1"></p>
                      </div>
          <div class="form-group">
            <input type="text" class="form-control" name="add" id="add" placeholder="Address">
             <p id="add1"></p>
                      </div>
          
          
          <div class="form-group">
            <button type="submit"  id="btn1" class="btn btn-success" >Submit</button>
      
                      </div>
                      
     </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function()
{
	$("#validate").click(function(){
	var  data1 = $("#form1").serialize();
		
		$.ajax({
			 url:'<?php echo base_url().'Booking/otpchecker'?>',
			 async:true,
			 type:'POST',
			 cache:false,
			 data:data1,
			 success: function(result)
			 {
				 if(result == 'Valid'){
			    $("#myModal").modal();
				
				 }
				 else if(result  == 'otpexpires')
				 {
					 swal({
                              title: "Problem",   
                              text: "Your one time password is expired please generate new one !",   
                             type: "info" 
                               });	
				 }
				 else {
					 
					 swal({
                              title: "Problem",   
                              text: "Invalid otp please check it!",   
                             type: "error" 
                               });	
					 
					 
				 }
			 }
			 
			
			
			
			
		});
		
	
	 return false;
	});
});

</script>
<script>
$(document).ready(function()
{
	
	$("#btn1").click(function()
	{
		
	var name = $("#name").val();
    var mobile = $("#cont").val();
	var address =$("#add").val();
	if(name =="")
	{
	  $("#name1").html('Name feild is empty');	
	}
	else if(mobile =="")
	{
      $("#cont1").html('Mobile feild is empty');			
	}
	else if(address =="")
	{
      $("#add1").html('Address feild is empty');			
	}
	
	else{
var  form = $("#myform").serialize();
$.ajax({
			 url:'<?php echo base_url().'Booking/forminput'?>',
			 async:true,
			 type:'POST',
			 cache:false,
			 data:form,
			 success: function(result)
			 {
				 
				 if(result == 'Enter')
				 {
					 $("#myform")[0].reset();
					 $("#form1")[0].reset();
					 
					 $("#myModal").hide();
					  swal({
                              title: "Order placed",   
                              text: "All set. Please wait we will get back you !",   
                             type: "success" 
                               });
				 	 
				 window.location='<?php echo base_url().'Booking/success' ?>';	 
				 }
				 else
				 {
				        swal({
                              title:"Problem",   
                              text: "Problem processing request !",   
                              type: "error" 
                               });	 
				 }
			 }
			 
			
			
			
			
		});
		
	}
	
	return false; 
	})
	 
	 
});

</script>