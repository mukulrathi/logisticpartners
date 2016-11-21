  <style type="text/css">
 .adp-directions{display:none; !important}
		.adp-directions,.adp-legal,.adp-summary{display:none; !important}
     #details{
        background-color: #183650;
        border-left: 6px solid #e24309;
		color:white;
         }		
		  #change{
	     background-color: transparent;
  	     border-color: transparent;
		 color:white;
  	      }
  </style>
  <div class="col-md-12">
  <div class="row"> 
  <div class="col-md-8">
  <div id="map" style="height:360px;"></div>
  <div id="right-panel"></div>
  </div>
  <div class="col-md-4"> 
  <div class="panel panel-default " id="details">
  <div class="panel-body" id="details_body">
  <h3>Location Details</h3>
   <form action ="" id="form1" method="post">
            <?php
    foreach($vehile_data->result() as $output ):
    ?>
    <p>Vehcile Selected:-<span class="fa fa-truck"  id="icon3" ></span><input type="text" id="change" readonly="readonly" name="name" value="<?php echo $output->vehicle_name ;?>"> </p><hr id="line">
  <p>Base rate:-<span class="fa fa-inr"  id="icon3" ></span><input type="text" id="change" readonly="readonly" name="rate" value="<?php echo $output->basefare ;?> "></p><hr id="line"> 
  <p>For:-<span class="fa fa-road" id="icon3"></span><input type="text" id="change" readonly="readonly"  name="hour" value="<?php echo $output->hour ;?>km"></p><hr id="line"> 
   <p>After base kilometer:<span class="fa fa-info-circle errspan"  id="icon3" ></span><input type="text" readonly="readonly" id="change" name="km" value="<?php echo $output->perkm  ;?> /km"></p><hr id="line">
  <?php 
    endforeach;
    ?>
<div id="mukul"></div>
<button class="btn btn-info btn-small" id="process">Process Further &nbsp;&nbsp;<i class="fa fa-fast-forward" aria-hidden="true"></i></button>
  </form>
  </div>
  </div>
  </div>
 </div>
 <div id="bird" style="background-image: url(<?php echo base_url().'assets/images/outdoor.jpg'?>">
 <marquee direction=right style="margin-top:83px"><img src="<?php echo base_url().'assets/images/blue_truck.png'?>"></marquee></div>
 </div>
     <script>
function initMap() {  
 var map = new google.maps.Map(document.getElementById('map'), {
          center:{lat: 21.1458, lng: 79.0882},
          zoom: 13	
         });                                
     
 var directionsService = new google.maps.DirectionsService;
 var directionsDisplay = new google.maps.DirectionsRenderer({
   draggable: true,
   map: map,
   panel: document.getElementById('right-panel')
 });
  
 directionsDisplay.addListener('directions_changed', function() {
   computeTotalDistance(directionsDisplay.getDirections());
  
            
 });

 displayRoute('<?php echo $pickup;?>,Nagpur,India','<?php echo $drop;?>,Nagpur,India', directionsService,
     directionsDisplay);
}
    
function displayRoute(origin, destination, service, display) {
 service.route({                                                 
   origin: origin,
   destination: destination,
   travelMode: 'DRIVING', 
   avoidTolls: true ,
    region:'IN',
 }, function(response, status) {
   if (status === 'OK') {
 display.setDirections(response);
   } else {
     alert('Could not display directions due to: ' + status);
   }
 });
 
}

function computeTotalDistance(result) {
 var total = 0;
 var myroute = result.routes[0]; 

 for (var i = 0; i < myroute.legs.length; i++) {
         
   total += myroute.legs[i].distance.value;
 }
 total = total / 1000;
   //document.getElementById('total').innerHTML= total;
document.getElementById('mukul').innerHTML= '<p>'+'Total kilometer:-'+'<span class="fa fa-road" id="icon3"></span>'+total+'</p>'+'<hr id="line">' ; 
 <?php foreach($vehile_data->result() as $output ):?>
var hour = <?php echo $output->hour ?>;
var perkm = <?php echo $output->perkm ?>;
var basefare = <?php echo $output->basefare ?>;    
$("#mukul").append('<p>Sum Amount Calculated:-'+'<span class="fa fa-inr" id="icon3"></span>'+'<input id="change" readonly="readonly" type="text" name="Sum" value="'+Number((total-hour) * perkm + basefare)+'" />'+'</p>');    

<?php  endforeach;  ?>  

      
    
}

 </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClZSWFPqsOS5LQvFjCYMj2_pF5xGkuWEQ&libraries=places&callback=initMap"
       async defer></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
       <script>
       $(document).ready(function(){
       $("td").removeAttr("class");    
        $("#process").click(function(){
             var id1 = $(".adp-summary").text();
                var dummy = id1.split('About');
                 var div = $("#form1").serialize();
                   var data1 = $(".adp-text").text().split('India');
                   var addA   = data1[0];
                   var addA2  = data1[1];
                   var data2  = data1[0].search('Nagpur');
                   var data3  = data1[1].search('Nagpur');
                   if(data2 == '-1' || data3 == '-1'  )
                   {
                swal("Oops!", "Something went wrong! Area not covered", "error");
                   }
                   else
                   {
                                
                            $.ajax({
						    type: "POST",
                            url:'<?php echo base_url().'booking/tmpcall'?>',
                            
                             data: div+'&address='+addA+'&address2='+addA2+'&totalkm='+dummy[0]+'&estimatetime='+dummy[1],
                              cache:false,
                             success:function(result){
                            
                         //swal("Great!", "All ok", "success");
						      if(result == 'inserted')
							  {
						//	alert(result);
							 window.location.replace('<?php echo base_url().'Booking/finalcall1'?>');		   
							  }
							  else
							  {
								  /*
							 swal({
                              title: "Problem",   
                              text: "Problem processing request !",   
                             type: "error" 
                               });
							   */
							   alert(result);
							  }
							 
							 }
							
						
                             
                            


                    });
 
  
                    
                    
                    }
                    return false;
        });
           
          
          
       });
     </script>
<script>
$(document).ready(function()
{
/*
$("#btn2").on('change',function()
{
alert(data1[0] + data1[1] + dummy[0] + dummy[1] + div);
 $("#form1").fadeOut('2000').attr('disabled',true);   
var data1 = $("option:selected").data();      
var basehour = (data1['basehour']);
var baserate = (data1['baserate']);
var baseperkm = (data1['perkm']); 
var vehcile  = (data1['vehicle']);    
var data2 = (($("#total").text()-basehour)*baseperkm+baserate);
var sum = Math.round(data2);
     $("#total1").html('New Vehicle Selected  '+ "<b>"+vehcile  +"</b> ");
     $("#total1").append('<p> Sum Amount Calculated:-'+sum+ '</p>');
     $("#total1").append('Basefare:-'+ baserate)+"<br>";
     $("#total1").append('<p> Basehour:-'+ basehour+'</p>');
     $("#total1").append('<p> Baseperkm:-'+ baseperkm +'</p>');

        
})


*/
})

</script>