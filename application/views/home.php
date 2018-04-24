<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hotels: Search, Reservation | Expedia</title>
		
		<link rel="stylesheet" href="<?php echo base_url();?>resources/css/w3.css">
		<link rel="stylesheet" href="<?php echo base_url();?>resources/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>resources/css/style_table.css">
		<!-- STAR-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>resources/css/fontawesome-stars.css">
		<!-- Calendar -->
		<link rel="stylesheet" href="<?php echo base_url();?>resources/css/jquery-ui.css" />

		<script src="<?php echo base_url();?>resources/js/jquery.min.js"> </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="<?php echo base_url();?>resources/js/jquery.barrating.min.js"></script>
		<script type="text/javascript">
			jQuery(function() {
				$('#StarRating').barrating({
					theme: 'fontawesome-stars',
					initialRating: <?php if (!empty($_GET['maxStarRating']))  echo $_GET['maxStarRating']; else echo -1;?>,
					onSelect: function (value, text) {
						console.log(value);
						$('#maxStarRating').val(value).trigger('change');
						$('#searchForm').trigger('submit');
					}
				});
	  
				$('#GuestRating').barrating({
					theme: 'fontawesome-stars',
					initialRating: <?php  if (!empty($_GET['maxGuestRating'])) echo $_GET['maxGuestRating']; else echo -1;?>,
					onSelect: function (value, text) {
						console.log(value);
						$('#maxGuestRating').val(value).trigger('change');
						$('#searchForm').trigger('submit');
					}
				});
				
				
				$('img.wish').on({
    'click': function() {
         var src = ($(this).attr('src') === '<?php echo base_url();?>/resources/images/heart0.png')
            ? '<?php echo base_url();?>/resources/images/heart1.png'
            : '<?php echo base_url();?>/resources/images/heart0.png';
         $(this).attr('src', src);
    }
});

			});
		</script>
		<script src="<?php echo base_url();?>resources/js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>resources/js/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>resources/js/funs.js"></script>

	</head>
	<body>
		<div class="main-agileinfo">
			<div class="sap_tabs">			
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<img id="logo" src="<?php echo base_url();?>resources/images/expedia.png"  >
						<li class="resp-tab-item">
							<img id="logo2" src="<?php echo base_url();?>resources/images/hotel-icon.png" >
							<span>Enjoy the search for your hotel </span>
						</li>			
					</ul>
					<div class="clearfix"> </div>
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content roundtrip">
							<form id="searchForm" action="<?php echo base_url();?>" method="get">
								<table class="table-resp">
									<thead>
										<tr>
											<th style="width: 35%;" scope="col">To</th>
											<th style="width: 17%;" scope="col">Check in Date</th>
											<th style="width: 17%;" scope="col">Check out Date</th>
											<th style="width: 15%;" scope="col">length Of Stay</th>
											<th style="width: 15%;" scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td data-label="To"> <input type="text" id="city" name="destinationName" tag="input" placeholder="Type Destination City"   value="<?php echo $this->input->get('destinationName'); ?>" required=""></td>
											<td data-label="Check in Date"> <input class="datepicker calendar" tag="input"id="startDatePicker" name="minTripStartDate" type="text" placeholder="Check In Date"   value="<?php echo  $this->input->get('minTripStartDate'); ?>" onfocus="this.value = '';" required="" ></td>
											<td data-label="Check out Date"> <input class="datepicker calendar" tag="input"   id="endDatePicker" name="maxTripStartDate" type="text" placeholder="Check out Date" value="<?php echo  $this->input->get('maxTripStartDate'); ?>" onfocus="this.value = '';"  ></td>
											<td data-label="length Of Stay"> <input type="number"  tag="input" name="lengthOfStay"  placeholder="Length of Stay"  min="0" 	value="<?php echo  $this->input->get('lengthOfStay'); ?>">	</td>						
											<td data-label=""><input type="submit" value="Search"></td>
										</tr>
									</tbody>
								</table>
								<input type="hidden" id="maxStarRating" name="maxStarRating" value="<?php if (!empty($_GET['maxStarRating'])) echo $_GET['maxStarRating']; ?>">
								<input type="hidden" id="maxGuestRating" name="maxGuestRating" value="<?php if (!empty($_GET['maxGuestRating'])) echo $_GET['maxGuestRating']; ?>">
								<input type="hidden" id="order" name="order" value="<?php if (!empty($_GET['order'])) echo $_GET['order']; ?>">
							</form>						
						</div>		
					</div>						
				</div>
			</div>
		</div>
		
		<div class="main-agileinfo">
			<div class="sap_tabs">			
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li class="order_price" >
							<span> <b> Order </b> </span>
							<img id="order_price"  class="result_tool" src="<?php echo base_url();?>/resources/images/price_order.png"  title="Order by price from low to high">
						</li>	
						<li class="order_star" >
							<img id="order_star"  class="result_tool" src="<?php echo base_url();?>/resources/images/star_order.png" title="Order by star rating from high to low">
						</li>
						<li class="resp-tab-item"><span>Result</span></li>
						<li class="clear1" >
							<img id="clear"  class="result_tool" src="<?php echo base_url();?>/resources/images/clear.png" title="Clear Rating">
						</li>
						<li class="StarRating">
							<span> <b> Star Rating </b> </span>
							<select id="StarRating">
								<option value="1" id="1">1</option>
								<option value="2"  id="2" >2</option>
								<option value="3"  id="3">3</option>
								<option value="4"  id="4">4</option>
								<option value="5"  id="5">5</option>
							</select> 
						</li>	
						<li class="GuestRating" >
							<span> <b> Guest Rating </b> </span>
							<select id="GuestRating">
								<option value="1" id="1">1</option>
								<option value="2"  id="2" >2</option>
								<option value="3"  id="3">3</option>
								<option value="4"  id="4">4</option>
								<option value="5"  id="5">5</option>
							</select> 
						</li>											
					</ul>	
					<div class="clearfix"> </div>	
					<div class="w3-container">
						<ul class="w3-ul w3-card-4">
							<?php
							if(isset($hotels )){
								foreach($hotels as $hotel) {?>
									<li class="w3-bar">
										<span  class="w3-bar-item w3-white w3-xlarge w3-right" >
											<?php 
											$save =  $hotel->{'hotelPricingInfo'}->{'crossOutPriceValue'};
											$av_price= $hotel->{'hotelPricingInfo'}->{'averagePriceValue'};
											$currency= $hotel->{'hotelPricingInfo'}->{'currency'};

											if($save!='0'){										
											?>
											<span class="cross_price">
												<?php echo $save  . $currency;?>
											</span>
											<?php } ?>
											
											<span class="price">
												<?php echo ' '. $av_price  . $currency; ?>
											</span>
											
											</br> </br> <center> Per Night</center>  
											</br>
										
											<span class="review" >
												<a href="#" >(<?php echo $hotel->{'hotelInfo'}->{'hotelReviewTotal'}; ?> reviews)</a>
											</span>
										</span> </br>
										<img   class="wish" src="<?php echo base_url();?>/resources/images/heart0.png" title="Save it to your wish list" >
										<img src="<?php echo urldecode($hotel->{'hotelInfo'}->{'hotelImageUrl'});?>" class="w3-bar-item w3-circle w3-hide-small" style="width:15%">
										<div class="w3-bar-item">
											<span class="w3-large">
												<a href="<?php echo urldecode($hotel->{'hotelUrls'}->{'hotelInfositeUrl'});?>" target="_blank">
													
														<?php echo $hotel->{'hotelInfo'}->{'hotelName'} .' '; ?>
													
													<span class="hotel_stars" >
														<?php echo $hotel->{'hotelInfo'}->{'hotelStarRating'}; ?>★
													</span>
												</a>
													</span></br></br>
											<p><img  src="<?php echo base_url();?>/resources/images/location.png" class="hotel_icons" > <?php echo $hotel->{'hotelInfo'}->{'hotelCountryCode'} . ' - '
											. $hotel->{'hotelInfo'}->{'hotelCity'}  . ' - ' 
											. $hotel->{'hotelInfo'}->{'hotelStreetAddress'}  ; ?>   </p> </br>
											<p>
												<img src="<?php echo base_url();?>/resources/images/calendar.png" class="hotel_icons" >
											Check In  <?php echo implode('/', $hotel->{'offerDateRange'}->{'travelStartDate'}); ?> </p>
										
											<p> 
												<img src="<?php echo base_url();?>/resources/images/calendar.png" class="hotel_icons" >
											Check Out <?php echo implode('/', $hotel->{'offerDateRange'}->{'travelEndDate'}); ?> </p>
											<span class="hotel_guest_rating" >
												Guest Rating	:	<?php echo $hotel->{'hotelInfo'}->{'hotelGuestReviewRating'}; ?>★
											</span>
										</div>
									</li>
							<?php }
							} else { ?>
									<li class="w3-bar" >
										<h2> </br>No result, please try serach again :)</br></h2>
									</li>
							<?php  }?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>		
			</div>
		</div>
		
		<div class="footer-w3l">
			<p class="agileinfo"> &copy; 2018 Expedia . Global Travel Company . All Rights Reserved </a></p>
		</div>
	</body>
</html>