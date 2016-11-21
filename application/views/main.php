<style>
.name {
	border-radius: 0px; height:44px;
}
</style>
<header id="head">

<div class="container">
  <div class="row">
    <h1 class="lead">Give Chance to serve you</h1>
    <p><a class="btn btn-default btn-lg" role="button">MORE INFO</a> <a class="btn btn-action btn-lg" role="button" 
    title=" one day hire">One day hire</a></p>
  </div>
</div>
</header>

<!-- /Header --> 

<!-- Intro -->
<div class="col-md-12">
  <div class="row" style="background-color:black; padding:40px;">


    <form action="<?php echo base_url().'home/search'?>" method="post">
      <div class="col-md-1 col-xs-12 text-center" ><i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:white "></i></div>
      <div class="col-md-2">
        <input name="pin_pickup" required="required"  class="form-control name"  title="Source Pincode" placeholder="Pickup Pincode" list="pincodelist" maxlength="6" minlength="6" pattern="[0-9]{6}">
      </div>
      <div class="col-md-2">
        <input name="pin_drop" required="required"  title="Destination Pincode" class="form-control name" placeholder="Drop Pincode" list="pincodelist" maxlength="6" minlength="6">
      </div>
      <div class="col-md-2">
        <select name="vehicle" class="form-control name">
     <?php foreach($vehile_details->result() as $output):?>
	 
          <option  value ="<?php echo $output->id ?>"><?php echo $output->vehicle_name ?></option>
        <?php endforeach;?>
        </select>
      </div>
      <div class="col-md-2 col-xs-12">
        <button type="submit" class="btn btn-danger btn-lg" style="width: 100%; border-radius: 0px;">Hire</button>
      </div>    
    </form>
    
          <div class="col-md-3 col-xs-12 ">
        <a href="<?php echo base_url().'home/hireforday';?>"><input type="button" class="btn btn-info btn-lg" style="width: 100%; border-radius: 0px;" value="One Day Hire" /></a>
      </div>  
  </div>
</div>
<div class="row" style="margin-left:0px; margin-right:0px;">
  <div class="col-md-6">
    <div class="h-caption">
      <h1 class="lead welcome"> <i class="iconcolor fa fa-users fa-5x "></i>WELCOME TO LOGISTICPARTNERS!</h1>
    </div>
    <div class="h-body text-center">
      <h3><i class="fa fa-quote-left blockqoute " aria-hidden="true"></i></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, vitae, perferendis, perspiciatis nobis voluptate quod illum soluta minima ipsam ratione quia numquam eveniet eum reprehenderit dolorem dicta nesciunt corporis?..</p>
      <h3><i class="fa fa-quote-right blockqoute"  aria-hidden="true"></i></h3>
    </div>
  </div>
  <div class="col-md-6" style="background-color:#e1eef3;">
    <div class="h-caption">
      <h1 class="lead welcome" style="color:white ;"><i class="fa fa-calculator fa-4x iconcolor"></i>REQUEST A FREE QUOTE</h1>
    </div>
    <div class="h-body text-center">
      <form class="form-horizontal" action="">
        <fieldset>
          <div class="form-group">
            <label class="col-md-1 control-label" for="textinput"></label>
            <div class="col-md-10">
              <input id="textinput" name="textinput" type="text" placeholder="Name" class="form-control input-lg" required="">
            </div>
          </div>
          
         
          
          <div class="form-group">
            <label class="col-md-1 control-label" for="textinput"></label>
            <div class="col-md-10">
              <input id="textinput" name="textinput" type="text" placeholder="Email address" class="form-control input-lg   " required="">
            </div>
          </div>
          
       
          
          <div class="form-group">
            <label class="col-md-1 control-label" for="appendedtext"></label>
            <div class="col-md-10">
              <div class="input-group">
                <input id="appendedtext"  name="appendedtext" class="form-control input-lg" placeholder="weight" type="text" required="">
                <span class="input-group-addon" >Luggage weight</span> </div>
            </div>
          </div>
          
       
          
          <div class="form-group">
            <label class="col-md-1 control-label" for="selectbasic"> </label>
            <div class="col-md-10">
              <select id="selectbasic" name="selectbasic" class="form-control input-lg">
                <option value="1">Option one</option>
                <option value="2">Option two</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-1 control-label" for="selectbasic"> </label>
            <div class="col-md-10">
              <button id="singlebutton" name="singlebutton" class="btn btn-info">SUBMIT</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<datalist  id="pincodelist">
     <select>
    <?php foreach($pincode_details->result() as $output):?>
    <option value="<?php echo $output->pincode;?>"><?php echo $output->pincode;?></option>
    <?php endforeach;?>
 </select>
</datalist>
<!--<div class="container">
  <div class="row text-center">
    <div class="col-md-8">
        <img src="assets/images/why.png"  class="img_size" alt="Easy Booking"/>
        <h5>Easy Booking</h5>
    </div>
    <div class="col-md-4">
        <img src="assets/images/comp.png"  class="img_size" alt="Easy Booking"/>
        <h5>Easy Booking</h5>
    </div>
  </div>
</div>
-->