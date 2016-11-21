<?php

Class Driver_model extends CI_model

{

function getdata(){

$this->db->select('pincode');

$this->db->distinct();

$this->db->from('pincode');

$query = $this->db->get();    

return $query;

}

function get_data_vehilename(){

$this->db->select('*');

$this->db->from('vehicle');

$query = $this->db->get();    

return $query;

}

function find_vehile($name)

{

// echo $name;

$this->db->select('*');

$this->db->from('vehicle');

$this->db->where('id',$name);

$query =  $this->db->get();

return $query;

}

function get_vehicle_picture($id)
{
$query = $this->db->query('select * from vehicle WHERE id = '.$id);
return $query->row('image_name');
}	    

function get_deal($sdata)
{    
$query = $this->db->query('select '.$sdata['hours'].' from vehicle WHERE id = '.$sdata['vehicle']);
return $query->result_array();
}

function generateotp($data)
{
	$query = $this->db->query("INSERT INTO otp(email,otp,date_time) VALUES ('".$data['emailid']."', '".$data['randumcode']."', '".$data['date']."')");
	return $this->db->insert_id();
}

function insert_tmpdata($data)
{
$query =   $this->db->insert('tmp_details',$data);	 
return $query;
}
function insert_otp($data)
{
$this->db->insert('otp',$data);	
$id = $this->db->insert_id();

return (isset($id)) ? $id : FALSE;

}

function checkotp($id, $otp)
{
	$this->db->select('*');
	$this->db->where('id',$id);
	$this->db->where('otp',$otp);
	$this->db->from('otp');
$query = $this->db->get();

 if($query->num_rows() ==1)
 {
   return true;	 
 }
	else
	{
	return false ;	
	}
}

function insert_userform($data)
{
 $this->db->insert('userform',$data);
$id = $this->db->insert_id();
return (isset($id)?$id :FALSE);	
}
function insert_vehiledetails($data1)
{
$query =$this->db->insert('tmp_details',$data1);
return $query;	

}
}