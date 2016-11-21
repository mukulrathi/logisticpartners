	<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
  class Home extends CI_controller{
function __construct()
{
    parent:: __construct();
	$this->load->model('Driver_model');	
}

	function index()

	{
		$this->load->view('header');
    	$query['pincode_details'] = $this->Driver_model->getdata();
		$query['vehile_details']  = $this->Driver_model->get_data_vehilename();
 		$this->load->view('main',$query);
		$this->load->view('whychooseus');
		$this->load->view('whatwemove');
		$this->load->view('footer');		
	}    
   function search()
   {
	$this->load->view('header');	
    $query['pickup'] = $_POST['pin_pickup'];
    $query['drop']  = $_POST['pin_drop'];
    $query['vehile_details']  = $this->Driver_model->get_data_vehilename();         
    $query['vehile_data'] =$this->Driver_model->find_vehile($_POST['vehicle']);
     $this->load->view('search',$query);
	$this->load->view('footer'); 
   }
   
   function hireforday()
	{
        $this->load->view('header');
        $data['vehile_details']  = $this->Driver_model->get_data_vehilename(); 
        $this->load->view('onedaydeal',$data);
        $this->load->view('footer');	
	}
	
	function otphireforday()
	{
		$data['emailid'] = $_POST['emailid'];
		$data['randumcode'] =  rand(1000,9999);
		$data['date'] = date('Y-m-d h:i:s', time());


		print_r($data);	
		
		if(valid_email($data['emailid']))
		{
			echo 'valid';
		}
		else
		{
			echo 'invalid';
		}
			
		$config = Array(
					'mailtype'  => 'html', 
					'charset' => 'utf-8',
					'wordwrap' => TRUE
				);
						
		$this->load->library( 'email',$config );
		$this->email->from('support@logisticpartners.in');
		$this->email->to($data['emailid']);
		$this->email->subject( 'OTP' );
		$otpvalue['otp'] = $data['randumcode'];
		$body = $this->load->view('email',$otpvalue,TRUE);
		$this->email->message($body);
		 		
		if(! $this->email->send())
		{
			echo 'not sent';
		}
		else
		{
			$recordid = $this->Driver_model->generateotp($data);
			echo $recordid;			
		}
	}
    
 function save_hireforday()
 {
    echo 'save';
 }
	
	function selected_vehicle()
	{
	  $data['picture'] = $this->Driver_model->get_vehicle_picture($_POST['id']);
        echo base_url().'assets/images/'.$data['picture'];	
	}   
   
   function tmpcall()
   {
		 $data = array('name' =>$this->input->post('name'),
                'rate'=>$this->input->post('rate'),
				'hour'=>$this->input->post('hour'),
				'km'=>$this->input->post('km'),
				'Sum'=>$this->input->post('Sum'),
				'address'=>$this->input->post('address'),
				'address2'=>$this->input->post('address2'),
				'totalkm'=>$this->input->post('totalkm'),
				'esttime'=>$this->input->post('estimatetime'));
//$query = $this->Driver_model->insert_tmpdata($array);
		$this->load->library('session');
$sess= $this->session->set_userdata($data);
	print_r($sess);	
   if(isset($sess)){
	       echo 'inserted';
   }
   else
   {
	echo 'not insertred';   
   }
   
      }
function finalcall1()
{
//$this->load->view('header');  
//$this->load->view('finalcall');
$this->load->view('footer');
}
/*
function emailotp()
{
$email = $this->input->post('emailotp');
echo $email;	
	
}
  */ 
} 	 
?>