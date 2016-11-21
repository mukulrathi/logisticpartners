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
    
}