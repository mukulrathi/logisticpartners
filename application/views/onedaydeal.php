<style>
.otp {
    display: inline-block;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    letter-spacing: 1px;
    color: #fff;
    padding: 7px;
	margin-left:-2px;
    font-size: 12px;
    background: #213C73;
    line-height: 1.35;
    border-radius: 0;
    border: 2px solid #213C73; !important;
    transition-duration: 100ms;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
    width: 30%;
	border-top-right-radius:4px; 
	border-bottom-right-radius:4px; 
}
</style>

<p>
  <p>  
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>  
    <style>	.deal_color 	{ 		color:#d15d5d; 		font-weight:400; 	}     .pincode_btn {     display: inline-block;     font-weight: 600;     line-height: 1.42857143;     text-align: center;     white-space: nowrap;     vertical-align: middle;     cursor: pointer;     text-transform: uppercase;     letter-spacing: 1px;     color: #fff;     padding: 13px;     font-size: 15px;     background: #d15d5d;     line-height: 1.35;     border-radius: 0;     border: 2px solid #d15d5d !important;     transition-duration: 100ms;     transition-property: all;     transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);     width: 100%; }     
    </style>
    <div class="container" id="one_day_hire">  
      <div class="row">    
        <center>      <h2>Hire For One Day</h2>    
        </center>  
      </div>  
      <br/>  
      <div class="row">    
        <div class="col-md-4">      
          <div id="vehicle_holder"> 
            <img id="autoImage" class="img-responsive" src="<?php echo base_url().'assets/images/mahindra-maxximo.jpg' ?>"/> 
          </div>    
        </div>    
        <div class="col-md-8">      
          <form id="onedaydeal" action="<?php echo base_url().'home/save_hireforday'; ?>" method="post">        
            <div class="form-group">          
              <input type="text" class="form-control" name="name" placeholder="Name" />        
            </div>        
            <div class="form-group">          
<textarea type="text" class="form-control" name="address" placeholder="Address" ></textarea>        
            </div>        
            <div class="form-group">          
              <input type="text" class="form-control" name="contact" placeholder="Contact No" />        
            </div>        
            <div class="form-group">          
              <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" />        
            </div>        
            <div class="form-group">          
              <select id="dealhour" name="dealhour" class="form-control" >            
                <option selected="selected">Select Hour
                </option>            
                <option value="4">4-Hr
                </option>            
                <option value="8">8-Hr
                </option>            
                <option value="10">10-Hr
                </option>          
              </select>        
            </div>        
            <div class="form-group">          
              <select id="vehicle" name="vehicle" class="form-control" >            
                <option selected="selected">Select Vehicle
                </option>            
                <?php foreach($vehile_details->result() as $output):?>            
                <option value="<?php echo $output->id;?>">
                <?php echo $output->vehicle_name;?>
                </option>            
                <?php endforeach;?>          
              </select>        
            </div>        
            <div class="form-group">          
              <select id="labour" name="labour" class="form-control" >            
                <option value="0">0 (none)
                </option>            
                <option value="1">1 (one)
                </option>            
                <option value="2"> 2 (two)
                </option>            
                <option value="3"> 3 (three)
                </option>            
                <option value="4"> 4 (Four)
                </option>            
                <option value="5"> 5 (Five)
                </option>            
                <option value="6"> 6 (Six)
                </option>          
              </select>        
            </div>        
            <div class="panel" style="border-color:#d15d5d;">          
              <div class="panel-body">            
                <div class="row text-center">              
                  <div class="col-md-3"> Deal Amount 
                    <span id="deal_amt" class="deal_color">
                      <br/>                
                      <i class="fa fa-thumbs-up" aria-hidden="true"> </i> ...
                    </span> 
                  </div>              
                  <div class="col-md-3"> Labour Charges 
                    <span id="lab_charges" class="deal_color">
                      <br/>                
                      <i class="fa fa-male" aria-hidden="true"> </i> ...
                    </span> 
                  </div>              
                  <div class="col-md-3"> Fule Additonal 
                    <span id="fule_add" class="deal_color">
                      <br/>                
                      <i class="fa fa-tint" aria-hidden="true"> </i> Additioal
                    </span> 
                  </div>              
                  <div class="col-md-3">Aprox Amount 
                    <span id="total" class="deal_color">
                      <br/>                
                      <i class="fa fa-inr" aria-hidden="true"> </i> 0 + Fule Extra
                    </span> 
                  </div>            
                </div>          
              </div>        
            </div>        
            <div class="form-group">          
              <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" style="width:70%; float:left; border-top-right-radius:0px; border-bottom-right-radius:0px; "/>
              <button type="button" class="otp" id="otpbtn" ><i class="fa fa-barcode" aria-hidden="true"></i> Generate OTP </button>
            </div>        
            
            <div class="form-group">          
              <input type="checkbox">          I agree terms and condition 
            </div>        
            <center>          
              <button type="submit" class="pincode_btn">Submit
              </button>        
            </center>        
            <input type="hidden" name="labourcost" id="labourcost" />        
            <input type="hidden" name="dealvalue" id="dealvalue" />        
            <input type="hidden" name="totaldeal" id="totaldeal" />      
          </form>    
        </div>  
      </div>
    </div>
    <br/>
    <br/>
    <br/>
    
  
<script type="text/javascript">
$(document).ready(function() {
    $('#onedaydeal').formValidation({
        message: 'This value is not valid',
/*
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
*/       
        fields: {
               dname: {
                validators: {
					 notEmpty: {},
                    emailAddress: {}
                }
            },
               name: {
                validators: {
                    notEmpty: {},
                     stringLength: {
                        min: 3,
                        max: 20
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z ]+$/ ,
                         message: 'Enter only alplabets '
                    }
                }
            },
			
               address: {
                validators: {
                    notEmpty: {},
                     stringLength: {
                        min: 3,
                        max: 200
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 -]+$/ ,
                         message: 'Enter only alplabets '
                    }
                }
            },			
            contact: {
                validators: {
                    notEmpty: {},
                     stringLength: {
                        min: 10,
                        max: 10
                    },
                    regexp: {
                        regexp: /^[ 0-9 ]+$/ ,
                         message: 'Enter only numbers only '
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
               dealhour: {
                validators: {
                     stringLength: {
                        min: 1,
                        max: 10,
						message: 'Select Deal Hours',
                    },
                }
            },	
            			
               vehicle: {
                validators: {
                     stringLength: {
                        min: 1,
                        max: 10,
						message: 'Select Vehical',
                    },
                }
            },				
               labour: {
                validators: {
                     stringLength: {
                        min: 1,
                        max: 10,
						message: 'Select Labour',
                    },
                }
            },	
            }
    });
});
</script>  
<script>
		
/*For Vehicle change in select box */
	$('#vehicle').change( function(){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url().'home/selected_vehicle'; ?>",
			data: {id:$('#vehicle').val()},
			success: function(msg)
			{			 
				$("#autoImage").fadeOut();
				$("#autoImage").attr("src", msg);
				$("#autoImage").fadeIn();				
			}
		}); 
	})
	
/*For Vehicle change in select box */
	$('#vehicle').change( function(){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url().'home/selected_vehicle'; ?>",
			data: {id:$('#vehicle').val()},
			success: function(msg)
			{
				getdealvalue();			
			}
		}); 
	})
    $('#dealhour').change(function(){
        getdealvalue();                    
    });    
/*for caluculation of deal hour */
   
    function getdealvalue()
    {
        var jvehicle = $('#vehicle').val();
        var jdealhour = $('#dealhour').val(); 
        
		$.ajax({
			type: "POST",
			url: "<?php echo base_url().'welcome/dealcalculation'; ?>",
			data: {vehicle: jvehicle, dealhour: jdealhour },
			success: function(msg)
			{
				$("#deal_amt").html('<br/><i class="fa fa-thumbs-up" aria-hidden="true"> </i>' + msg); 
                 $('#dealvalue').val(msg);  
                 $('#totaldeal').val(Number($('#labourcost').val())+Number($('#dealvalue').val()));
                 $('#total').html('<br/><i class="fa fa-inr" aria-hidden="true"> </i> ' +  $("#totaldeal").val()+' + Fule Extra</span>');             		
			}
		});         
    }   
    
    $('#labour').change(function(){
        getlabourcost();                    
    });
            
    function getlabourcost()
    {
        var jlabour = $('#labour').val();        
        $("#lab_charges").html('<br/><i class="fa fa-male" aria-hidden="true"> </i> ' + jlabour + '* 500 = ' + jlabour*500);
        $('#labourcost').val( jlabour*500);
        $('#totaldeal').val(Number($('#labourcost').val())+Number($('#dealvalue').val()));
        $('#total').html('<br/><i class="fa fa-inr" aria-hidden="true"> </i> ' +  $("#totaldeal").val()+' + Fule Extra</span>');
    }  
	
   	 $('#otpbtn').click(function(){
		 var email = $('#email').val();
		 $.ajax({
	            url:'<?php echo  base_url().'home/otphireforday' ?>',
				type:'POST',
				cache:false,
				async:true,
				data: 'emailid='+email,
				success: function(result)
				{
					alert(result);				
				}
			 
			 })
		
	 })
</script>   
  </p>
  
  <div id="results">
  
  </div>
  
  
  