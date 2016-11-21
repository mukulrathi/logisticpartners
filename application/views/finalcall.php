<style>
    #map {
        position: relative;
        padding-bottom: 0%; // This is the aspect ratio
        height: 150px;
        overflow: hidden;
    }
 
 #chnage {
	 font-weight: 800;
    border: none #ccc;
    box-shadow: 0px 0px 1px 1px rgba(136, 136, 136, 0.27);
    text-transform: capitalize;
	color:white;
    font-size: 15px;
 }
	 .name {
	border-radius: 0px; height:44px; background-color:cadetblue; width:100%; color:white;
	
}


</style>
<div class="container" style="border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27)">
    <h1 align="center">Route status</h1>
    <hr>
    <div class="col-md-12">
    <div class="col-md-4">Truck selected <p><b><?php  echo $this->session->userdata('name');?></b></p></div>
    <div class="col-md-4">Source point<p><b><?php echo $this->session->userdata('address');?></b></p></div>
    
    <div class="col-md-4">
     <i class="fa fa-arrow-right" aria-hidden="true"></i>
     Destination point<p><b><?php echo $this->session->userdata('address2');?></b></p>
        </div>
    </div>
</div>
<BR>

</div>
<div class="container" style="background-color:cadetblue">
<div class="row">
<div class="col-md-12"  id="chnage" style="border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27)">
    <div class="col-md-6">
 
    <div class="row" style="border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27);padding:10px"><div class="col-md-6">Distance:- <i class="fa fa-road" aria-hidden="true"></i><b><?php echo $this->session->userdata('totalkm');?></b></div>    </div><hr>
    <div class="row" style="border:border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27);padding:10px">
        <div class="col-md-6">Approx. time:-<i class="fa fa-clock-o" aria-hidden="true"></i>
        <b><?php echo $this->session->userdata('esttime');?></b>
        </div>    </div><hr>
    <div class="row" style="border:border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27);padding:10px"><div class="col-md-6">Fare:- <i class="fa fa-inr" aria-hidden="true"></i><b><?php echo $this->session->userdata('Sum');?></b> </div>  
      </div>
        
        
    </div>
    <div class="col-md-6">
   <div class="row" style="border:none #ccc; box-shadow:0px 0px 1px 1px rgba(136, 136, 136, 0.27);padding:10px"><div class="col-md-6"><b>
   <form action="#" method="post"  id="form2">
   <input name="email" required="required"  id="email" class="form-control name"  title="email address" placeholder="Enter email " type="email">
<input type="hidden" value="<?php echo time() ?>"  id="timechecker"/>  
 <button type="submit"  id="btn" class="btn btn-info">Send</button>
 </form>
 <hr />
   <span id="emaildetails">Enter Email address for otp confirmation</span>
</b></div>    </div>
<div class="row">
<div class="col-md-6" id="data" style="padding:25px;"></div>
</div>   
  
       
    
    </div>
    
    
    </div>
    </div>    
    
    
    
    
    
    </div>

</div>
<script type="text/javascript">
$(document).ready(function()


{
	$("#email").focusin(function(){	
	
	 $("#emaildetails").html('Please enter email address');	
	});
	
	$("#btn").click(function(){
		var email = $("#email").val();
		$("#emaildetails").html('');
		var time  = $("#timechecker").val();
$.ajax({
	            url:'<?php echo  base_url().'booking/emailotp' ?>',
				type:'POST',
				cache:false,
				async:true,
				data: 'emailotp='+email+'&timechecker='+time,
				success: function(result)
				{
					if(result =='emailinvalid')
					{
						 swal({
                              title: "Problem",   
                              text: "Enter proper email address !",   
                             type: "error" 
                               });
							   		
													
					}
					else
					{
				$("#data").html(result);	
				$("#form2").hide();
				$("#btnresend").show();
					}
				}
		
		
		
		
		
	});
	
	return false ;

	});
 
})


</script>