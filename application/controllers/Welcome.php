<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    public function dealcalculation()
    {
        $this->load->model('Driver_model');	
        
        $vehicle = $this->input->post('vehicle');
        $dealhour = $this->input->post('dealhour');
        
        if($vehicle=='' OR $dealhour =='' )
        {
            return '0';
        }
        else
        {
            $sdata['hours'] = $dealhour.'hourdeal';
            $sdata['vehicle'] = $vehicle;
                                    
            $data['data']  = $this->Driver_model->get_deal($sdata);
            echo $data['data'][0][$dealhour.'hourdeal'];
        }
    }
}
