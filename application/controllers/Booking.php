<?php 
error_reporting(-1); 
class Booking extends CI_controller
{
  function __construct()
  {
  parent::__construct();	
  $this->load->library('session');	
  $this->load->model('Driver_model');
	  
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
	  
$sess= $this->session->set_userdata($data);
// $this->session->userdata('name');
  
$sees_check =	$this->session->userdata();	


 if(!empty($this->session->userdata())){
		 echo 'inserted';
 }
 else
 {
  echo 'not insertred';   
 }
 
 
	}
  
function finalcall1()
{
$this->load->view('header');  
$this->load->view('finalcall');
$this->load->view('footer');
}

function emailotp()
{
  $email = $this->input->post('emailotp');
  $time   = $this->input->post('timechecker');
  
  if (valid_email($email))
{
  $otp   = rand(1000,9999);
  
  $data = array('email'=>$email,'otp'=>$otp);
$query = $this->Driver_model->insert_otp($data); 
  if($query){
  $otpvalue['otp'] = $otp; 
  $this->load->library( 'email' );
  $config['wordwrap'] = TRUE;
  $config['priority'] = '1';
  $config['mailtype'] = 'html';
  $config['charset'] ='utf-8';
  $this->email->initialize($config);
  $this->email->from('support@logisticpartners.in');
  $this->email->to($this->input->post('emailotp'));
  $this->email->subject('OTP');
  $body = $this->load->view('email',$otpvalue,TRUE);
  $this->email->message($body);
   
$mail =   $this->email->send();
echo $mail?'An otp is send to your registered mail id':'Error in processing';
  }
  else
  {
  echo 'Error in processing the request';	
  }
if($mail)
{
   $data['email']= $email;
   $data['otp']  = $otp	;
   $data['id']   = $query;
   $data ['time'] = $time;
  // print_r($data);
$this->load->view('otpchecker',$data);	 
}
else
{
   
}
}
else
{
	  echo 'emailinvalid';
}
	  
}
  function otpchecker()
  {
	  
  $id = $_POST['id'];
  $otp = $_POST['otp'];
  $time = $_POST['htime'];
$time_change = time();
$tr = $time_change-$time;

if($tr/60 < 10){
  
  $query =$this->Driver_model->checkotp($id,$otp);
	  echo $query?'Valid':'Invalid/Enter proper otp';
}
else
{
  echo 'otpexpires';  
}
	  
  }
  
  function forminput()
  {
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $address  = 	$_POST['add'];
  $email   = $_POST['hemail'];
/* session for individual*/
  $sessname = $this->session->set_userdata('seesname',$name);
  $sesscontact = $this->session->set_userdata('sesscontact',$contact);
  $sessaddress = $this->session->set_userdata('sessadd',$address);
  $sessemal = $this->session->set_userdata('sessemail',$email);
 /* session closed*/
  $userform = array('name'=>$name,'contact'=>$contact,'address'=>$address,'email'=>$email);
  $query =$this->Driver_model->insert_userform($userform);
    $reg =  array(   
			   'userid'=>$query,
			  'name' =>$this->session->userdata('name'),
			  'rate'=>$this->session->userdata('rate'),
			  'hour'=>$this->session->userdata('hour'),
			  'km'=>$this->session->userdata('km'),
			  'Sum'=>$this->session->userdata('Sum'),
			  'address'=>$this->session->userdata('address'),
			  'address2'=>$this->session->userdata('address2'),
			  'totalkm'=>$this->session->userdata('totalkm'),
			  'esttime'=>$this->session->userdata('esttime'),
			   'time' =>time()
			  );
 //$sess_tmp =  $this->session->set_userdata($reg); 
  $query1 = $this->Driver_model->insert_vehiledetails($reg);
 
  echo $query1?'Enter':'Error occured';
 
	  
  }
  function success()
  {
 print_r($this->session->userdata());
// $this->session->sess_destroy();
  $this->load->view('header'); 
  $this->load->view('suucess');
  $this->load->view('footer');
  
  //session_destroy();
  }
  

}