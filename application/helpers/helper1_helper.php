<?php


if ( ! function_exists('cmp'))
{
	function cmp($obj1, $obj2)
	{
		return $obj1->{'hotelInfo'}->{'hotelStarRating'} > $obj2->{'hotelInfo'}->{'hotelStarRating'} ? -1 : 1;
	
	}


}

if ( ! function_exists('cmp_price'))
{
	function cmp_price($obj1, $obj2)
	{
		return $obj1->{'hotelPricingInfo'}->{'averagePriceValue'} < $obj2->{'hotelPricingInfo'}->{'averagePriceValue'} ? -1 : 1;
	
	}


}



		