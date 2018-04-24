<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('offer');
		$this->load->helper('helper1');

    }
	
	public function index()
	{
		$hotels = $this->offer->get_offers(array_filter($_GET));
		
		//sort hotels based on their star rating

		if(isset($hotels)){
			if (!empty($_GET['order'])){
				if($_GET['order']=='price')
					usort($hotels, "cmp_price");
				else
					usort($hotels, "cmp");
			}else
					usort($hotels, "cmp");	
		}
			
			
		
			
  
	

		$data = array(
			'hotels' => $hotels
		);
		
		//var_dump($hotels);
		$this->load->view('home',$data );
	}
}
