<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
    }

    public function get_offers($request_params)
    {
		$default_params=array(
			'scenario' => 'deal-finder',
			'page' => 'foo',
			'uid' => 'foo',
			'productType' => 'Hotel'
		);
		
		
			$params = array_merge($default_params,$request_params );
		
			$params =  http_build_query($params);
		
			$result= file_get_contents(API_URL . $params );
		
			$result = json_decode($result);
			
			if (count((array)$result->{'offers'}))
				return $result->{'offers'}->{'Hotel'};
			else
				return null;
				
		
		
		
    }
}

?>