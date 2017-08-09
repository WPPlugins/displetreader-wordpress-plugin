<?php

/**
 * Functions below permitted for use in displet-property-details-page-content.php template
 *
 * All function names, parameters, and return types/values are to remain unchanged
 */

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_previous_result_class() {
	echo 'displet-previous-result displet-none';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_next_result_class() {
	echo 'displet-next-result displet-none';
}

/**
 * @return: boolean
 */
function displetretsidx_use_planwise_affordability() {
	return false;
}

/**
 * @return: boolean
 */
function displetretsidx_use_walk_score( $id = false ) {
	global $displetretsidx_template;
	if ( !empty( $id ) || !empty( $displetretsidx_template['options']['walk_score_widget_id'] ) ) {
		return true;
	}
	return false;
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_walk_score( $id = false ) {
	global $displetretsidx_template;
	global $displetretsidx_listing;
	$walkscore_id = !empty( $id ) ? $id : $displetretsidx_template['options']['walk_score_widget_id'];
	if ( !empty( $walkscore_id ) ) :
	?>
		<script type='text/javascript'>
		var ws_wsid = '<?php echo $walkscore_id; ?>';
		var ws_address = '<?php echo $displetretsidx_listing->address; ?>, <?php echo $displetretsidx_listing->city; ?>, <?php echo $displetretsidx_listing->state; ?> <?php echo $displetretsidx_listing->zip; ?>';
		var ws_width = '700';
		var ws_height = '502';
		var ws_layout = 'horizontal';
		var ws_commute = 'true';
		var ws_transit_score = 'true';
		var ws_map_modules = 'all';
		</script><style type='text/css'>#ws-walkscore-tile{position:relative;text-align:left}#ws-walkscore-tile *{float:none;}#ws-footer a,#ws-footer a:link{font:11px/14px Verdana,Arial,Helvetica,sans-serif;margin-right:6px;white-space:nowrap;padding:0;color:#000;font-weight:bold;text-decoration:none}#ws-footer a:hover{color:#777;text-decoration:none}#ws-footer a:active{color:#b14900}</style><div id='ws-walkscore-tile'><div id='ws-footer' style='position:absolute;top:464px;left:8px;width:688px'><form id='ws-form'><a id='ws-a' href='http://www.walkscore.com/' target='_blank'>What's Your Walk Score?</a><input type='text' id='ws-street' style='position:absolute;top:0px;left:170px;width:486px' /><input type='image' id='ws-go' src='//cdn2.walk.sc/2/images/tile/go-button.gif' height='15' width='22' border='0' alt='get my Walk Score' style='position:absolute;top:0px;right:0px' /></form></div></div><script type='text/javascript' src='http://www.walkscore.com/tile/show-walkscore-tile.php'></script>
	<?php
	endif;
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_request_showing_class() {
	echo 'displet-show-request-showing-dialog displet-request-showing';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_save_property_class() {
	echo 'displet-save-property';
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_rate_property_auto_submit_html() {
	?>
	<div class="<?php displetretsidx_the_rate_property_auto_submit_container_class(); ?>" data-attr="<?php displetretsidx_the_rate_property_data_attributes(); ?>">
		<span class="<?php displetretsidx_the_rate_property_1_star_class(); ?>" rating="<?php displetretsidx_the_rate_property_1_star_rating(); ?>">
			1 Star
		</span>
		<span class="<?php displetretsidx_the_rate_property_2_star_class(); ?>" rating="<?php displetretsidx_the_rate_property_2_star_rating(); ?>">
			2 Stars
		</span>
		<span class="<?php displetretsidx_the_rate_property_3_star_class(); ?>" rating="<?php displetretsidx_the_rate_property_3_star_rating(); ?>">
			3 Stars
		</span>
		<span class="<?php displetretsidx_the_rate_property_4_star_class(); ?>" rating="<?php displetretsidx_the_rate_property_4_star_rating(); ?>">
			4 Stars
		</span>
		<span class="<?php displetretsidx_the_rate_property_5_star_class(); ?>" rating="<?php displetretsidx_the_rate_property_5_star_rating(); ?>">
			5 Stars
		</span>
		<?php displetretsidx_the_loading_element(); ?>
	</div>
	<?php
}

/**
 * @return: print: HTML attribute
 */
function displetretsidx_the_rate_property_data_attributes() {
	echo displetretsidx_get_rate_property_data_attributes();
}

/**
 * @return: HTML attribute
 */
function displetretsidx_get_rate_property_data_attributes() {
	return DispletRetsIdxSavedPropertiesController::get_rate_property_data_attributes();
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_rate_property_auto_submit_container_class() {
	global $displetretsidx_listing;
	$class = 'displet-rate-property-auto-submit';
	if ( !empty( $displetretsidx_listing->user_rating ) ) {
		$class .= ' displet-user-rated';
	}
	echo $class;
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_email_friend_class() {
	echo 'displet-email-friend';
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_planwise_container() {
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_photo_urls() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->image_urls->all_big ) || !empty( $displetretsidx_listing->image_urls->all_thumb ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: array: url
 */
function displetretsidx_get_photo_urls() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->image_urls->all_big ) ) {
		return $displetretsidx_listing->image_urls->all_big;
	}
	elseif ( !empty( $displetretsidx_listing->image_urls->all_thumb ) ) {
		return $displetretsidx_listing->image_urls->all_thumb;
	}
}

/**
 * @return: print: CSS style attribute
 */
function displetretsidx_the_photos_container_style() {
	global $displetretsidx_template;
	if ( !empty( $displetretsidx_template['options']['pdp_force_full_width_photos'] ) ) {
		echo 'max-width: none !important;';
	}
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_photos_slideshow_class() {
	echo 'displet-photo-slideshow';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_previous_photo_class() {
	echo 'displet-previous-photo';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_next_photo_class() {
	echo 'displet-next-photo';
}

/**
 * @deprecated: since 2.0.36
 * @return: print: CSS classname
 */
function displetretsidx_the_photos_thumbnails_class() {
	displetretsidx_the_slideshow_thumbnails_class();
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_slideshow_thumbnails_class() {
	echo 'displet-thumbnails';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_thumbnails_class() {
	echo 'displet-photos-thumbs-value';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_thumbnail_class() {
	echo 'displet-image';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_photos_class() {
	echo 'displet-photos-large-value';
}

/**
 * @return: boolean
 */
function displetretsidx_has_basic_property_details_html() {
	$html = displetretsidx_get_basic_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_basic_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_property_type() ) {
		$html[] =
		'<div class="displet-property-type displet-tr">
			<div class="displet-detail-title displet-td">Property Type:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_property_type() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bedrooms() ) {
		$html[] =
		'<div class="displet-bedrooms displet-tr">
			<div class="displet-detail-title displet-td">Bedrooms:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bedrooms() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bathrooms() ) {
		$html[] =
		'<div class="displet-bathrooms displet-tr">
			<div class="displet-detail-title displet-td">Bathrooms:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bathrooms() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet() ) {
		$html[] =
		'<div class="displet-square-feet displet-tr">
			<div class="displet-detail-title displet-td">Square Feet:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet() . '</div>
		</div>';
	}
	if ( displetretsidx_has_mls_number() ) {
		$bold = displetretsidx_is_mls_number_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-mls displet-tr">
			<div class="displet-detail-title displet-td">MLS&reg; #:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_mls_number() . '</div>
		</div>';
	}
	if ( displetretsidx_has_year_built() ) {
		$html[] =
		'<div class="displet-year-built displet-tr">
			<div class="displet-detail-title displet-td">Year Built:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_year_built() . '</div>
		</div>';
	}
	if ( displetretsidx_has_area_amenities() ) {
		$html[] =
		'<div class="displet-amenities displet-tr">
			<div class="displet-detail-title displet-td">Amenities:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_area_amenities() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_basic_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_basic_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_basic_property_details_html_first_half() {
	$html = displetretsidx_get_basic_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_basic_property_details_html_second_half() {
	$html = displetretsidx_get_basic_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_basic_property_details_html() {
	echo displetretsidx_get_basic_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_basic_property_details_html_first_half() {
	echo displetretsidx_get_basic_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_basic_property_details_html_second_half() {
	echo displetretsidx_get_basic_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_interior_property_details_html() {
	$html = displetretsidx_get_interior_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_interior_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_ac() ) {
		$html[] =
		'<div class="displet-air-conditioning displet-tr">
			<div class="displet-detail-title displet-td">Air Conditioning:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_ac() . '</div>
		</div>';
	}
	if ( displetretsidx_has_appliances_equipment() ) {
		$html[] =
		'<div class="displet-appliances displet-tr">
			<div class="displet-detail-title displet-td">Appliances:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_appliances_equipment() . '</div>
		</div>';
	}
	if ( displetretsidx_has_basement() ) {
		$html[] =
		'<div class="displet-basement displet-tr">
			<div class="displet-detail-title displet-td">Basement:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_basement() . '</div>
		</div>';
	}
	if ( displetretsidx_has_basement_description() ) {
		$html[] =
		'<div class="displet-basement-description displet-tr">
			<div class="displet-detail-title displet-td">Basement Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_basement_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_basement_sq_feet() ) {
		$html[] =
		'<div class="displet-basement-sq-ft displet-tr">
			<div class="displet-detail-title displet-td">Basement Sq Ft:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_basement_sq_feet() . '</div>
		</div>';
	}
	if ( displetretsidx_has_full_baths() ) {
		$html[] =
		'<div class="displet-bathrooms-full displet-tr">
			<div class="displet-detail-title displet-td">Bathrooms ( full ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_full_baths() . '</div>
		</div>';
	}
	if ( displetretsidx_has_half_baths() ) {
		$html[] =
		'<div class="displet-bathrooms-half displet-tr">
			<div class="displet-detail-title displet-td">Bathrooms ( half ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_half_baths() . '</div>
		</div>';
	}
	if ( displetretsidx_has_three_quarter_baths() ) {
		$html[] =
		'<div class="displet-bathrooms-three-quarter displet-tr">
			<div class="displet-detail-title displet-td">Bathrooms ( three-quarter ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_three_quarter_baths() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bedrooms() ) {
		$html[] =
		'<div class="displet-bedrooms displet-tr">
			<div class="displet-detail-title displet-td">Bedrooms:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bedrooms() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bed2_dimensions() ) {
		$html[] =
		'<div class="displet-bedroom-2-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Bedroom( 2 ) Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bed2_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bed3_dimensions() ) {
		$html[] =
		'<div class="displet-bedroom-3-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Bedroom( 3 ) Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bed3_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_bed4_dimensions() ) {
		$html[] =
		'<div class="displet-bedroom-4-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Bedroom( 4 ) Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_bed4_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_den_description() ) {
		$html[] =
		'<div class="displet-den-description displet-tr">
			<div class="displet-detail-title displet-td">Den Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_den_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_den_dimensions() ) {
		$html[] =
		'<div class="displet-den-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Den Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_den_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_dining() ) {
		$html[] =
		'<div class="displet-dining displet-tr">
			<div class="displet-detail-title displet-td">Dining:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_dining() . '</div>
		</div>';
	}
	if ( displetretsidx_has_dining_description() ) {
		$html[] =
		'<div class="displet-dining-description displet-tr">
			<div class="displet-detail-title displet-td">Dining Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_dining_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_dining_dimensions() ) {
		$html[] =
		'<div class="displet-dining-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Dining Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_dining_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_disability_features() ) {
		$html[] =
		'<div class="displet-disability-features displet-tr">
			<div class="displet-detail-title displet-td">Disability Features:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_disability_features() . '</div>
		</div>';
	}
	if ( displetretsidx_has_family_room_description() ) {
		$html[] =
		'<div class="displet-family-room-description displet-tr">
			<div class="displet-detail-title displet-td">Family Room Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_family_room_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_family_room_dimensions() ) {
		$html[] =
		'<div class="displet-family-room-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Family Room Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_family_room_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_fireplace_description() ) {
		$html[] =
		'<div class="displet-fireplace-description displet-tr">
			<div class="displet-detail-title displet-td">Fireplace Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_fireplace_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_fireplaces() ) {
		$html[] =
		'<div class="displet-fireplaces displet-tr">
			<div class="displet-detail-title displet-td">Fireplaces:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_fireplaces() . '</div>
		</div>';
	}
	if ( displetretsidx_has_floor() ) {
		$html[] =
		'<div class="displet-floor displet-tr">
			<div class="displet-detail-title displet-td">Floor:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_floor() . '</div>
		</div>';
	}
	if ( displetretsidx_has_foundation() ) {
		$html[] =
		'<div class="displet-foundation displet-tr">
			<div class="displet-detail-title displet-td">Foundation:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_foundation() . '</div>
		</div>';
	}
	if ( displetretsidx_has_garage_description() ) {
		$html[] =
		'<div class="displet-garage-description displet-tr">
			<div class="displet-detail-title displet-td">Garage Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_garage_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_garage_spaces() ) {
		$html[] =
		'<div class="displet-garage-spaces displet-tr">
			<div class="displet-detail-title displet-td">Garage Spaces:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_garage_spaces() . '</div>
		</div>';
	}
	if ( displetretsidx_has_guest_accommodations() ) {
		$html[] =
		'<div class="displet-guest-accommodations displet-tr">
			<div class="displet-detail-title displet-td">Guest Accommodations:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_guest_accommodations() . '</div>
		</div>';
	}
	if ( displetretsidx_has_heat() ) {
		$html[] =
		'<div class="displet-heat displet-tr">
			<div class="displet-detail-title displet-td">Heat:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_heat() . '</div>
		</div>';
	}
	if ( displetretsidx_has_interior_features() ) {
		$html[] =
		'<div class="displet-interior-features displet-tr">
			<div class="displet-detail-title displet-td">Interior Features:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_interior_features() . '</div>
		</div>';
	}
	if ( displetretsidx_has_kitchen() ) {
		$html[] =
		'<div class="displet-kitchen displet-tr">
			<div class="displet-detail-title displet-td">Kitchen:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_kitchen() . '</div>
		</div>';
	}
	if ( displetretsidx_has_kitchen_dimensions() ) {
		$html[] =
		'<div class="displet-kitchen-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Kitchen Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_kitchen_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_laundry_location() ) {
		$html[] =
		'<div class="displet-laundry-location displet-tr">
			<div class="displet-detail-title displet-td">Laundry Location:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_laundry_location() . '</div>
		</div>';
	}
	if ( displetretsidx_has_living() ) {
		$html[] =
		'<div class="displet-living displet-tr">
			<div class="displet-detail-title displet-td">Living:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_living() . '</div>
		</div>';
	}
	if ( displetretsidx_has_living_description() ) {
		$html[] =
		'<div class="displet-living-description displet-tr">
			<div class="displet-detail-title displet-td">Living Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_living_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_living_dimensions() ) {
		$html[] =
		'<div class="displet-living-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Living Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_living_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_main_level_beds() ) {
		$html[] =
		'<div class="displet-main-level-beds displet-tr">
			<div class="displet-detail-title displet-td">Main Level Beds:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_main_level_beds() . '</div>
		</div>';
	}
	if ( displetretsidx_has_main_level_sq_feet() ) {
		$html[] =
		'<div class="displet-main-level-sq-ft displet-tr">
			<div class="displet-detail-title displet-td">Main Level Sq Ft:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_main_level_sq_feet() . '</div>
		</div>';
	}
	if ( displetretsidx_has_master_dimensions() ) {
		$html[] =
		'<div class="displet-master-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Master Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_master_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_master_on_main() ) {
		$html[] =
		'<div class="displet-master-on-main displet-tr">
			<div class="displet-detail-title displet-td">Master On Main:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_master_on_main() . '</div>
		</div>';
	}
	if ( displetretsidx_has_num_beds_above_grade() ) {
		$html[] =
		'<div class="displet-num-beds-above-grade displet-tr">
			<div class="displet-detail-title displet-td">Num Beds Above Grade:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_num_beds_above_grade() . '</div>
		</div>';
	}
	if ( displetretsidx_has_other_level_beds() ) {
		$html[] =
		'<div class="displet-other-level-beds displet-tr">
			<div class="displet-detail-title displet-td">Other Level Beds:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_other_level_beds() . '</div>
		</div>';
	}
	if ( displetretsidx_has_rooms() ) {
		$html[] =
		'<div class="displet-rooms displet-tr">
			<div class="displet-detail-title displet-td">Rooms:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_rooms() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet() ) {
		$html[] =
		'<div class="displet-square-feet displet-tr">
			<div class="displet-detail-title displet-td">Square Feet:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet2() ) {
		$html[] =
		'<div class="displet-square-feet-2 displet-tr">
			<div class="displet-detail-title displet-td">Square Feet( 2 ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet2() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet2_source() ) {
		$html[] =
		'<div class="displet-square-feet-2-source displet-tr">
			<div class="displet-detail-title displet-td">Square Feet( 2 ) Source:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet2_source() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet_available() ) {
		$html[] =
		'<div class="displet-square-feet-available displet-tr">
			<div class="displet-detail-title displet-td">Square Feet Available:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet_available() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_feet_source() ) {
		$html[] =
		'<div class="displet-square-feet-source displet-tr">
			<div class="displet-detail-title displet-td">Square Feet Source:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_feet_source() . '</div>
		</div>';
	}
	if ( displetretsidx_has_square_foot_source() ) {
		$html[] =
		'<div class="displet-square-foot-source displet-tr">
			<div class="displet-detail-title displet-td">Square Foot Source:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_square_foot_source() . '</div>
		</div>';
	}
	if ( displetretsidx_has_stories() ) {
		$html[] =
		'<div class="displet-stories displet-tr">
			<div class="displet-detail-title displet-td">Stories:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_stories() . '</div>
		</div>';
	}
	if ( displetretsidx_has_upper_level_sq_feet() ) {
		$html[] =
		'<div class="displet-upper-level-sq-feet displet-tr">
			<div class="displet-detail-title displet-td">Upper Level Sq Ft:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_upper_level_sq_feet() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_interior_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_interior_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_interior_property_details_html_first_half() {
	$html = displetretsidx_get_interior_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_interior_property_details_html_second_half() {
	$html = displetretsidx_get_interior_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_interior_property_details_html() {
	echo displetretsidx_get_interior_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_interior_property_details_html_first_half() {
	echo displetretsidx_get_interior_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_interior_property_details_html_second_half() {
	echo displetretsidx_get_interior_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_exterior_property_details_html() {
	$html = displetretsidx_get_exterior_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_exterior_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_acres() ) {
		$html[] =
		'<div class="displet-acres displet-tr">
			<div class="displet-detail-title displet-td">Acres:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_acres() . '</div>
		</div>';
	}
	if ( displetretsidx_has_building_name() ) {
		$html[] =
		'<div class="displet-building-name displet-tr">
			<div class="displet-detail-title displet-td">Building Name:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_building_name() . '</div>
		</div>';
	}
	if ( displetretsidx_has_condo_parking() ) {
		$html[] =
		'<div class="displet-condo-parking displet-tr">
			<div class="displet-detail-title displet-td">Condo Parking:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_condo_parking() . '</div>
		</div>';
	}
	if ( displetretsidx_has_construction() ) {
		$html[] =
		'<div class="displet-construction displet-tr">
			<div class="displet-detail-title displet-td">Construction:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_construction() . '</div>
		</div>';
	}
	if ( displetretsidx_has_exterior_features() ) {
		$html[] =
		'<div class="displet-exterior-features displet-tr">
			<div class="displet-detail-title displet-td">Exterior Features:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_exterior_features() . '</div>
		</div>';
	}
	if ( displetretsidx_has_fence() ) {
		$html[] =
		'<div class="displet-fence displet-tr">
			<div class="displet-detail-title displet-td">Fence:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_fence() . '</div>
		</div>';
	}
	if ( displetretsidx_has_fence_description() ) {
		$html[] =
		'<div class="displet-fence-description displet-tr">
			<div class="displet-detail-title displet-td">Fence Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_fence_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_lot_description() ) {
		$html[] =
		'<div class="displet-lot-description displet-tr">
			<div class="displet-detail-title displet-td">Lot Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_lot_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_lot_dimensions() ) {
		$html[] =
		'<div class="displet-lot-dimensions displet-tr">
			<div class="displet-detail-title displet-td">Lot Dimensions:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_lot_dimensions() . '</div>
		</div>';
	}
	if ( displetretsidx_has_lot_size() ) {
		$html[] =
		'<div class="displet-lot-size displet-tr">
			<div class="displet-detail-title displet-td">Lot Size:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_lot_size() . '</div>
		</div>';
	}
	if ( displetretsidx_has_has_parking() ) {
		$html[] =
		'<div class="displet-parking displet-tr">
			<div class="displet-detail-title displet-td">Parking:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_has_parking() . '</div>
		</div>';
	}
	if ( displetretsidx_has_parking_description() ) {
		$html[] =
		'<div class="displet-parking-description displet-tr">
			<div class="displet-detail-title displet-td">Parking Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_parking_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_parking_spaces() ) {
		$html[] =
		'<div class="displet-parking-spaces displet-tr">
			<div class="displet-detail-title displet-td">Parking Spaces:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_parking_spaces() . '</div>
		</div>';
	}
	if ( displetretsidx_has_pool_description() ) {
		$html[] =
		'<div class="displet-pool-description displet-tr">
			<div class="displet-detail-title displet-td">Pool Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_pool_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_pool_on_property() ) {
		$html[] =
		'<div class="displet-pool-on-property displet-tr">
			<div class="displet-detail-title displet-td">Pool On Property:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_pool_on_property() . '</div>
		</div>';
	}
	if ( displetretsidx_has_roof() ) {
		$html[] =
		'<div class="displet-roof displet-tr">
			<div class="displet-detail-title displet-td">Roof:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_roof() . '</div>
		</div>';
	}
	if ( displetretsidx_has_sewer() ) {
		$html[] =
		'<div class="displet-sewer displet-tr">
			<div class="displet-detail-title displet-td">Sewer:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_sewer() . '</div>
		</div>';
	}
	if ( displetretsidx_has_trees() ) {
		$html[] =
		'<div class="displet-trees displet-tr">
			<div class="displet-detail-title displet-td">Trees:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_trees() . '</div>
		</div>';
	}
	if ( displetretsidx_has_view() ) {
		$html[] =
		'<div class="displet-view displet-tr">
			<div class="displet-detail-title displet-td">View:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_view() . '</div>
		</div>';
	}
	if ( displetretsidx_has_utilities() ) {
		$html[] =
		'<div class="displet-utilities displet-tr">
			<div class="displet-detail-title displet-td">Utilities:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_utilities() . '</div>
		</div>';
	}
	if ( displetretsidx_has_water() ) {
		$html[] =
		'<div class="displet-water displet-tr">
			<div class="displet-detail-title displet-td">Water:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_water() . '</div>
		</div>';
	}
	if ( displetretsidx_has_water_access() ) {
		$html[] =
		'<div class="displet-water-access displet-tr">
			<div class="displet-detail-title displet-td">Water Access:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_water_access() . '</div>
		</div>';
	}
	if ( displetretsidx_has_waterfront() ) {
		$html[] =
		'<div class="displet-waterfront displet-tr">
			<div class="displet-detail-title displet-td">Waterfront:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_waterfront() . '</div>
		</div>';
	}
	if ( displetretsidx_has_waterfront_description() ) {
		$html[] =
		'<div class="displet-waterfront-description displet-tr">
			<div class="displet-detail-title displet-td">Waterfront Description:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_waterfront_description() . '</div>
		</div>';
	}
	if ( displetretsidx_has_zoning() ) {
		$html[] =
		'<div class="displet-zoning displet-tr">
			<div class="displet-detail-title displet-td">Zoning:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_zoning() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_exterior_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_exterior_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_exterior_property_details_html_first_half() {
	$html = displetretsidx_get_exterior_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_exterior_property_details_html_second_half() {
	$html = displetretsidx_get_exterior_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_exterior_property_details_html() {
	echo displetretsidx_get_exterior_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_exterior_property_details_html_first_half() {
	echo displetretsidx_get_exterior_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_exterior_property_details_html_second_half() {
	echo displetretsidx_get_exterior_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_area_property_details_html() {
	$html = displetretsidx_get_area_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_area_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_area_amenities() ) {
		$html[] =
		'<div class="displet-amenities displet-tr">
			<div class="displet-detail-title displet-td">Amenities:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_area_amenities() . '</div>
		</div>';
	}
	if ( displetretsidx_has_area_mls_defined() ) {
		$html[] =
		'<div class="displet-area displet-tr">
			<div class="displet-detail-title displet-td">Area:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_area_mls_defined() . '</div>
		</div>';
	}
	if ( displetretsidx_has_city() ) {
		$html[] =
		'<div class="displet-city displet-tr">
			<div class="displet-detail-title displet-td">City:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_city() . '</div>
		</div>';
	}
	if ( displetretsidx_has_county() ) {
		$html[] =
		'<div class="displet-county displet-tr">
			<div class="displet-detail-title displet-td">County:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_county() . '</div>
		</div>';
	}
	if ( displetretsidx_has_is_gated_community() ) {
		$html[] =
		'<div class="displet-gated-community displet-tr">
			<div class="displet-detail-title displet-td">Gated Community:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_is_gated_community() . '</div>
		</div>';
	}
	if ( displetretsidx_has_state() ) {
		$html[] =
		'<div class="displet-state displet-tr">
			<div class="displet-detail-title displet-td">State:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_state() . '</div>
		</div>';
	}
	if ( displetretsidx_has_street_name() ) {
		$html[] =
		'<div class="displet-street-name displet-tr">
			<div class="displet-detail-title displet-td">Street Name:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_street_name() . '</div>
		</div>';
	}
	if ( displetretsidx_has_street_number() ) {
		$html[] =
		'<div class="displet-street-number displet-tr">
			<div class="displet-detail-title displet-td">Street Number:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_street_number() . '</div>
		</div>';
	}
	if ( displetretsidx_has_street_post_dir() ) {
		$html[] =
		'<div class="displet-street-post-dir displet-tr">
			<div class="displet-detail-title displet-td">Street Post Dir:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_street_post_dir() . '</div>
		</div>';
	}
	if ( displetretsidx_has_street_pre_direction() ) {
		$html[] =
		'<div class="displet-street-pre-direction displet-tr">
			<div class="displet-detail-title displet-td">Street Pre Direction:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_street_pre_direction() . '</div>
		</div>';
	}
	if ( displetretsidx_has_subdivision() ) {
		$html[] =
		'<div class="displet-subdivision displet-tr">
			<div class="displet-detail-title displet-td">Subdivision:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_subdivision() . '</div>
		</div>';
	}
	if ( displetretsidx_has_unit() ) {
		$html[] =
		'<div class="displet-unit displet-tr">
			<div class="displet-detail-title displet-td">Unit:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_unit() . '</div>
		</div>';
	}
	if ( displetretsidx_has_zip() ) {
		$html[] =
		'<div class="displet-zip displet-tr">
			<div class="displet-detail-title displet-td">' . displetretsidx_get_zip_label() . ':</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_zip() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_area_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_area_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_area_property_details_html_first_half() {
	$html = displetretsidx_get_area_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_area_property_details_html_second_half() {
	$html = displetretsidx_get_area_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_area_property_details_html() {
	echo displetretsidx_get_area_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_area_property_details_html_first_half() {
	echo displetretsidx_get_area_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_area_property_details_html_second_half() {
	echo displetretsidx_get_area_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_school_property_details_html() {
	$html = displetretsidx_get_school_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_school_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_elementary_a() ) {
		$html[] =
		'<div class="displet-elementary-a displet-tr">
			<div class="displet-detail-title displet-td">Elementary:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_elementary_a() . '</div>
		</div>';
	}
	if ( displetretsidx_has_high_school() ) {
		$html[] =
		'<div class="displet-high-school displet-tr">
			<div class="displet-detail-title displet-td">High School:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_high_school() . '</div>
		</div>';
	}
	if ( displetretsidx_has_junior_high_school() ) {
		$html[] =
		'<div class="displet-junior-high-school displet-tr">
			<div class="displet-detail-title displet-td">Junior High School:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_junior_high_school() . '</div>
		</div>';
	}
	if ( displetretsidx_has_middle_school() ) {
		$html[] =
		'<div class="displet-middle-school displet-tr">
			<div class="displet-detail-title displet-td">Middle School:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_middle_school() . '</div>
		</div>';
	}
	if ( displetretsidx_has_other_school() ) {
		$html[] =
		'<div class="displet-other-school displet-tr">
			<div class="displet-detail-title displet-td">Other School:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_other_school() . '</div>
		</div>';
	}
	if ( displetretsidx_has_school_district() ) {
		$html[] =
		'<div class="displet-school-district displet-tr">
			<div class="displet-detail-title displet-td">School District:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_school_district() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_school_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_school_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_school_property_details_html_first_half() {
	$html = displetretsidx_get_school_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_school_property_details_html_second_half() {
	$html = displetretsidx_get_school_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_school_property_details_html() {
	echo displetretsidx_get_school_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_school_property_details_html_first_half() {
	echo displetretsidx_get_school_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_school_property_details_html_second_half() {
	echo displetretsidx_get_school_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_tax_and_hoa_property_details_html() {
	$html = displetretsidx_get_tax_and_hoa_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_tax_and_hoa_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_condo_fee() ) {
		$html[] =
		'<div class="displet-condo-fee displet-tr">
			<div class="displet-detail-title displet-td">Condo Fee:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_condo_fee() . '</div>
		</div>';
	}
	if ( displetretsidx_has_condo_fee_frequency() ) {
		$html[] =
		'<div class="displet-condo-fee-frequency displet-tr">
			<div class="displet-detail-title displet-td">Condo Fee Frequency:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_condo_fee_frequency() . '</div>
		</div>';
	}
	if ( displetretsidx_has_condo_fee_includes() ) {
		$html[] =
		'<div class="displet-condo-fee-includes displet-tr">
			<div class="displet-detail-title displet-td">Condo Fee Includes:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_condo_fee_includes() . '</div>
		</div>';
	}
	if ( displetretsidx_has_estimated_taxes() ) {
		$html[] =
		'<div class="displet-estimated-taxes displet-tr">
			<div class="displet-detail-title displet-td">Estimated Taxes:</div>
			<div class="displet-detail-value displet-td">$' . displetretsidx_get_estimated_taxes() . '</div>
		</div>';
	}
	if ( displetretsidx_has_hoa() ) {
		$html[] =
		'<div class="displet-hoa displet-tr">
			<div class="displet-detail-title displet-td">HOA:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_hoa() . '</div>
		</div>';
	}
	if ( displetretsidx_has_hoa_fee() ) {
		$html[] =
		'<div class="displet-hoa-fee displet-tr">
			<div class="displet-detail-title displet-td">HOA Fee:</div>
			<div class="displet-detail-value displet-td">$' . displetretsidx_get_hoa_fee() . '</div>
		</div>';
	}
	if ( displetretsidx_has_hoa_fee_includes() ) {
		$html[] =
		'<div class="displet-hoa-fee-includes displet-tr">
			<div class="displet-detail-title displet-td">HOA Fee Includes:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_hoa_fee_includes() . '</div>
		</div>';
	}
	if ( displetretsidx_has_hoa_frequency() ) {
		$html[] =
		'<div class="displet-hoa-frequency displet-tr">
			<div class="displet-detail-title displet-td">HOA Frequency:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_hoa_frequency() . '</div>
		</div>';
	}
	if ( displetretsidx_has_hoa_requirement() ) {
		$html[] =
		'<div class="displet-hoa-requirement displet-tr">
			<div class="displet-detail-title displet-td">HOA Requirement:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_hoa_requirement() . '</div>
		</div>';
	}
	if ( displetretsidx_has_mainteinance_fee() ) {
		$html[] =
		'<div class="displet-mainteinance-fee displet-tr">
			<div class="displet-detail-title displet-td">Mainteinance Fee:</div>
			<div class="displet-detail-value displet-td">$' . displetretsidx_get_mainteinance_fee() . '</div>
		</div>';
	}
	if ( displetretsidx_has_tax_year() ) {
		$html[] =
		'<div class="displet-tax-year displet-tr">
			<div class="displet-detail-title displet-td">Tax Year:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_tax_year() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_tax_and_hoa_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_tax_and_hoa_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_tax_and_hoa_property_details_html_first_half() {
	$html = displetretsidx_get_tax_and_hoa_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_tax_and_hoa_property_details_html_second_half() {
	$html = displetretsidx_get_tax_and_hoa_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_tax_and_hoa_property_details_html() {
	echo displetretsidx_get_tax_and_hoa_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_tax_and_hoa_property_details_html_first_half() {
	echo displetretsidx_get_tax_and_hoa_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_tax_and_hoa_property_details_html_second_half() {
	echo displetretsidx_get_tax_and_hoa_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_has_additional_property_details_html() {
	$html = displetretsidx_get_additional_property_details_html_array();
	if ( !empty( $html ) ) {
		return true;
	}
	return false;
}

/**
 * @return: HTML markup array
 */
function displetretsidx_get_additional_property_details_html_array() {
	$html = array();
	if ( displetretsidx_has_builder_name() ) {
		$html[] =
		'<div class="displet-builder-name displet-tr">
			<div class="displet-detail-title displet-td">Builder Name:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_builder_name() . '</div>
		</div>';
	}
	if ( displetretsidx_has_cdom() ) {
		$html[] =
		'<div class="displet-days-on-market displet-tr">
			<div class="displet-detail-title displet-td">Days On Market ( contiguous ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_cdom() . '</div>
		</div>';
	}
	if ( displetretsidx_has_contract_date() ) {
		$html[] =
		'<div class="displet-contract-date displet-tr">
			<div class="displet-detail-title displet-td">Contract Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_contract_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_is_foreclosure() ) {
		$html[] =
		'<div class="displet-foreclosure displet-tr">
			<div class="displet-detail-title displet-td">Foreclosure:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_is_foreclosure() . '</div>
		</div>';
	}
	if ( displetretsidx_has_feed_image_trans_date() ) {
		$html[] =
		'<div class="displet-feed-image-trans-date displet-tr">
			<div class="displet-detail-title displet-td">Feed Image Trans Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_feed_image_trans_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_foreclosure_type() ) {
		$html[] =
		'<div class="displet-foreclosure-type displet-tr">
			<div class="displet-detail-title displet-td">Foreclosure Type:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_foreclosure_type() . '</div>
		</div>';
	}
	if ( displetretsidx_has_green_features() ) {
		$html[] =
		'<div class="displet-green-features displet-tr">
			<div class="displet-detail-title displet-td">Green Features:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_green_features() . '</div>
		</div>';
	}
	if ( displetretsidx_has_modified() ) {
		$html[] =
		'<div class="displet-last-modified displet-tr">
			<div class="displet-detail-title displet-td">Last Modified:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_modified() . '</div>
		</div>';
	}
	if ( displetretsidx_has_latitude_display() ) {
		$html[] =
		'<div class="displet-latitude displet-tr">
			<div class="displet-detail-title displet-td">Latitude:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_latitude_display() . '</div>
		</div>';
	}
	if ( displetretsidx_has_list_date() ) {
		$html[] =
		'<div class="displet-list-date displet-tr">
			<div class="displet-detail-title displet-td">List Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_list_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_price() ) {
		$html[] =
		'<div class="displet-list-price displet-tr">
			<div class="displet-detail-title displet-td">List Price:</div>
			<div class="displet-detail-value displet-td">$' . number_format( displetretsidx_get_price() ) . '</div>
		</div>';
	}
	if ( displetretsidx_has_listing_agent_name() ) {
		$bold = displetretsidx_is_listing_agent_name_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-listing-agent-name displet-tr">
			<div class="displet-detail-title displet-td">Listing Agent:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_listing_agent_name() . '</div>
		</div>';
	}
	if ( displetretsidx_has_listing_agent_id() ) {
		$bold = displetretsidx_is_listing_agent_id_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-listing-agent-id displet-tr">
			<div class="displet-detail-title displet-td">Listing Agent ID:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_listing_agent_id() . '</div>
		</div>';
	}
	if ( displetretsidx_has_listing_office_name() ) {
		$bold = displetretsidx_is_listing_office_name_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-listing-office-name displet-tr">
			<div class="displet-detail-title displet-td">Listing Office:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_listing_office_name() . '</div>
		</div>';
	}
	if ( displetretsidx_has_listing_office_id() ) {
		$bold = displetretsidx_is_listing_office_id_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-listing-office-id displet-tr">
			<div class="displet-detail-title displet-td">Listing Office ID:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_listing_office_id() . '</div>
		</div>';
	}
	if ( displetretsidx_has_longitude_display() ) {
		$html[] =
		'<div class="displet-longitude displet-tr">
			<div class="displet-detail-title displet-td">Longitude:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_longitude_display() . '</div>
		</div>';
	}
	if ( displetretsidx_has_mls_number() ) {
		$bold = displetretsidx_is_mls_number_emphasized() ? 'displet-emphasize displet-font-color' : '';
		$html[] =
		'<div class="displet-mls-number displet-tr">
			<div class="displet-detail-title displet-td">MLS&reg; #:</div>
			<div class="displet-detail-value displet-td ' . $bold . '">' . displetretsidx_get_mls_number() . '</div>
		</div>';
	}
	if ( displetretsidx_has_is_new_construction() ) {
		$html[] =
		'<div class="displet-new-construction displet-tr">
			<div class="displet-detail-title displet-td">New Construction:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_is_new_construction() . '</div>
		</div>';
	}
	if ( displetretsidx_has_number_of_units() ) {
		$html[] =
		'<div class="displet-number-of-units displet-tr">
			<div class="displet-detail-title displet-td">Number Of Units:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_number_of_units() . '</div>
		</div>';
	}
	if ( displetretsidx_has_open_house_begins() ) {
		$html[] =
		'<div class="displet-open-house-begins displet-tr">
			<div class="displet-detail-title displet-td">Open House Begins:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_open_house_begins() . '</div>
		</div>';
	}
	if ( displetretsidx_has_open_house_date() ) {
		$html[] =
		'<div class="displet-open-house-date displet-tr">
			<div class="displet-detail-title displet-td">Open House Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_open_house_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_open_house_ends() ) {
		$html[] =
		'<div class="displet-open-house-ends displet-tr">
			<div class="displet-detail-title displet-td">Open House Ends:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_open_house_ends() . '</div>
		</div>';
	}
	if ( displetretsidx_has_original_list_price() ) {
		$html[] =
		'<div class="displet-original-list-price displet-tr">
			<div class="displet-detail-title displet-td">Original List Price:</div>
			<div class="displet-detail-value displet-td">$' . displetretsidx_get_original_list_price() . '</div>
		</div>';
	}
	if ( displetretsidx_has_possession_date() ) {
		$html[] =
		'<div class="displet-possession-date displet-tr">
			<div class="displet-detail-title displet-td">Possession Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_possession_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_possession_notes() ) {
		$html[] =
		'<div class="displet-possession-notes displet-tr">
			<div class="displet-detail-title displet-td">Possession Notes:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_possession_notes() . '</div>
		</div>';
	}
	if ( displetretsidx_has_price_change_date() ) {
		$html[] =
		'<div class="displet-price-change-date displet-tr">
			<div class="displet-detail-title displet-td">Price Change Date:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_price_change_date() . '</div>
		</div>';
	}
	if ( displetretsidx_has_price_per_sq_feet() ) {
		$html[] =
		'<div class="displet-price-per-sq-ft displet-tr">
			<div class="displet-detail-title displet-td">Price Per Sq Ft:</div>
			<div class="displet-detail-value displet-td">$' . displetretsidx_get_price_per_sq_feet() . '</div>
		</div>';
	}
	if ( displetretsidx_has_property_sub_type() ) {
		$html[] =
		'<div class="displet-property-sub-type displet-tr">
			<div class="displet-detail-title displet-td">Property Sub-Type:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_property_sub_type() . '</div>
		</div>';
	}
	if ( displetretsidx_has_property_sub_type2() ) {
		$html[] =
		'<div class="displet-property-sub-type-2 displet-tr">
			<div class="displet-detail-title displet-td">Property Sub Type( 2 ):</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_property_sub_type2() . '</div>
		</div>';
	}
	if ( displetretsidx_has_property_type() ) {
		$html[] =
		'<div class="displet-property-type displet-tr">
			<div class="displet-detail-title displet-td">Property Type:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_property_type() . '</div>
		</div>';
	}
	if ( displetretsidx_has_short_sale() ) {
		$html[] =
		'<div class="displet-short-sale displet-tr">
			<div class="displet-detail-title displet-td">Short Sale:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_short_sale() . '</div>
		</div>';
	}
	if ( displetretsidx_has_status() ) {
		$html[] =
		'<div class="displet-status displet-tr">
			<div class="displet-detail-title displet-td">Status:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_status() . '</div>
		</div>';
	}
	if ( displetretsidx_has_sysid() ) {
		$html[] =
		'<div class="displet-sysid displet-tr">
			<div class="displet-detail-title displet-td">Sysid:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_sysid() . '</div>
		</div>';
	}
	if ( displetretsidx_has_total_number_of_units() ) {
		$html[] =
		'<div class="displet-total-number-of-units displet-tr">
			<div class="displet-detail-title displet-td">Total Number Of Units:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_total_number_of_units() . '</div>
		</div>';
	}
	if ( displetretsidx_has_virtual_tour_non_branded() ) {
		$html[] =
		'<div class="displet-virtual-tour displet-tr">
			<div class="displet-detail-title displet-td">Virtual Tour:</div>
			<div class="displet-detail-value displet-td"><a href="' . displetretsidx_get_virtual_tour_non_branded() . '" target="_blank">' . displetretsidx_get_virtual_tour_non_branded() . '</a></div>
		</div>';
	}
	if ( displetretsidx_has_year_built() ) {
		$html[] =
		'<div class="displet-year-built displet-tr">
			<div class="displet-detail-title displet-td">Year Built:</div>
			<div class="displet-detail-value displet-td">' . displetretsidx_get_year_built() . '</div>
		</div>';
	}
	return $html;
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_additional_property_details_html() {
	return implode( PHP_EOL, displetretsidx_get_additional_property_details_html_array() );
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_additional_property_details_html_first_half() {
	$html = displetretsidx_get_additional_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$first_half = array_slice( $html, 0, ceil( count( $html ) / 2 ) );
		if ( !empty( $first_half ) ) {
			echo implode( PHP_EOL, $first_half );
		}
	}
}

/**
 * @return: HTML markup
 */
function displetretsidx_get_additional_property_details_html_second_half() {
	$html = displetretsidx_get_additional_property_details_html_array();
	if ( !empty( $html ) && is_array( $html ) ) {
		$second_half = array_slice( $html, ceil( count( $html ) / 2 ) );
		if ( !empty( $second_half ) ) {
			echo implode( PHP_EOL, $second_half );
		}
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_additional_property_details_html() {
	echo displetretsidx_get_additional_property_details_html();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_additional_property_details_html_first_half() {
	echo displetretsidx_get_additional_property_details_html_first_half();
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_additional_property_details_html_second_half() {
	echo displetretsidx_get_additional_property_details_html_second_half();
}

/**
 * @return: boolean
 */
function displetretsidx_is_disclaimer_above_details() {
	global $displetretsidx_template;
	if ( !empty( $displetretsidx_template['options']['pdp_disclaimer_below_photos'] ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_maps() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->maps ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: HTML markup
 */
function displetretsidx_the_maps( $scroll_wheel = true ) {
	displetretsidx_the_road_map( $scroll_wheel );
	displetretsidx_the_street_view_map( $scroll_wheel );
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: HTML markup
 */
function displetretsidx_the_road_map( $scroll_wheel = true ) {
	global $displetretsidx_listing;
	echo DispletRetsIdxResidentialsController::get_map_markup( $displetretsidx_listing->maps['map'], $scroll_wheel );
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: HTML markup
 */
function displetretsidx_the_birds_eye_map( $scroll_wheel = true ) {
	global $displetretsidx_listing;
	echo DispletRetsIdxResidentialsController::get_map_markup( $displetretsidx_listing->maps['birds_eye'], $scroll_wheel );
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: HTML markup
 */
function displetretsidx_the_street_view_map( $scroll_wheel = true ) {
	global $displetretsidx_listing;
	echo DispletRetsIdxResidentialsController::get_map_markup( $displetretsidx_listing->maps['street_view'], $scroll_wheel );
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_map_tabs_class() {
	echo 'displet-map-tabs';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_map_tab_class() {
	echo 'displet-map-select displet-active';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_street_view_tab_class() {
	echo 'displet-street-view-select';
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_area_amenities() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->area_amenities ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_area_amenities() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->area_amenities;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_area_amenities() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->area_amenities;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_ac() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->ac ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_ac() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->ac;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_ac() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->ac;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_appliances_equipment() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->appliances_equipment ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_appliances_equipment() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->appliances_equipment;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_appliances_equipment() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->appliances_equipment;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_basement() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->basement ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_basement() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->basement;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_basement() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->basement;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_basement_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->basement_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_basement_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->basement_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_basement_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->basement_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_basement_sq_feet() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->basement_sq_feet ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_basement_sq_feet() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->basement_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_basement_sq_feet() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->basement_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_full_baths() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->full_baths ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_full_baths() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->full_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_full_baths() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->full_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_half_baths() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->half_baths ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_half_baths() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->half_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_half_baths() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->half_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_three_quarter_baths() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->three_quarter_baths ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_three_quarter_baths() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->three_quarter_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_three_quarter_baths() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->three_quarter_baths;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_bed2_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->bed2_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_bed2_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->bed2_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_bed2_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->bed2_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_bed3_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->bed3_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_bed3_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->bed3_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_bed3_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->bed3_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_bed4_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->bed4_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_bed4_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->bed4_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_bed4_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->bed4_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_den_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->den_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_den_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->den_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_den_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->den_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_den_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->den_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_den_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->den_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_den_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->den_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_dining() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->dining ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_dining() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->dining;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_dining() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->dining;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_dining_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->dining_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_dining_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->dining_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_dining_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->dining_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_dining_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->dining_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_dining_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->dining_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_dining_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->dining_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_disability_features() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->disability_features ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_disability_features() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->disability_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_disability_features() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->disability_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_family_room_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->family_room_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_family_room_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->family_room_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_family_room_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->family_room_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_family_room_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->family_room_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_family_room_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->family_room_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_family_room_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->family_room_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_fireplace_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->fireplace_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_fireplace_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->fireplace_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_fireplace_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->fireplace_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_fireplaces() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->fireplaces ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_fireplaces() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->fireplaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_fireplaces() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->fireplaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_floor() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->floor ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_floor() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->floor;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_floor() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->floor;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_foundation() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->foundation ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_foundation() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->foundation;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_foundation() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->foundation;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_garage_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->garage_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_garage_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->garage_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_garage_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->garage_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_garage_spaces() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->garage_spaces ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_garage_spaces() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->garage_spaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_garage_spaces() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->garage_spaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_guest_accommodations() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->guest_accommodations ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_guest_accommodations() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->guest_accommodations;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_guest_accommodations() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->guest_accommodations;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_heat() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->heat ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_heat() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->heat;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_heat() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->heat;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_interior_features() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->interior_features ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_interior_features() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->interior_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_interior_features() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->interior_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_kitchen() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->kitchen ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_kitchen() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->kitchen;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_kitchen() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->kitchen;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_kitchen_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->kitchen_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_kitchen_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->kitchen_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_kitchen_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->kitchen_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_laundry_location() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->laundry_location ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_laundry_location() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->laundry_location;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_laundry_location() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->laundry_location;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_living() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->living ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_living() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->living;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_living() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->living;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_living_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->living_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_living_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->living_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_living_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->living_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_living_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->living_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_living_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->living_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_living_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->living_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_main_level_beds() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->main_level_beds ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_main_level_beds() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->main_level_beds;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_main_level_beds() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->main_level_beds;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_main_level_sq_feet() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->main_level_sq_feet ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_main_level_sq_feet() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->main_level_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_main_level_sq_feet() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->main_level_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_master_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->master_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_master_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->master_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_master_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->master_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_master_on_main() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->master_on_main ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_master_on_main() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->master_on_main;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_master_on_main() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->master_on_main;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_num_beds_above_grade() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->num_beds_above_grade ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_num_beds_above_grade() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->num_beds_above_grade;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_num_beds_above_grade() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->num_beds_above_grade;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_other_level_beds() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->other_level_beds ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_other_level_beds() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->other_level_beds;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_other_level_beds() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->other_level_beds;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_rooms() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->rooms ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_rooms() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->rooms;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_rooms() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->rooms;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_square_feet2() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->square_feet2 ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_square_feet2() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->square_feet2;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_square_feet2() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->square_feet2;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_square_feet2_source() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->square_feet2_source ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_square_feet2_source() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->square_feet2_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_square_feet2_source() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->square_feet2_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_square_feet_available() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->square_feet_available ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_square_feet_available() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->square_feet_available;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_square_feet_available() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->square_feet_available;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_square_feet_source() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->square_feet_source ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_square_feet_source() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->square_feet_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_square_feet_source() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->square_feet_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_square_foot_source() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->square_foot_source ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_square_foot_source() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->square_foot_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_square_foot_source() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->square_foot_source;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_stories() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->stories ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_stories() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->stories;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_stories() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->stories;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_upper_level_sq_feet() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->upper_level_sq_feet ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_upper_level_sq_feet() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->upper_level_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_upper_level_sq_feet() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->upper_level_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_acres() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->acres ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_acres() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->acres;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_acres() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->acres;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_building_name() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->building_name ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_building_name() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->building_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_building_name() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->building_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_condo_parking() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->condo_parking ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_condo_parking() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->condo_parking;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_condo_parking() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->condo_parking;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_construction() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->construction ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_construction() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->construction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_construction() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->construction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_exterior_features() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->exterior_features ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_exterior_features() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->exterior_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_exterior_features() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->exterior_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_fence() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->fence ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_fence() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->fence;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_fence() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->fence;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_fence_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->fence_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_fence_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->fence_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_fence_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->fence_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_lot_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->lot_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_lot_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->lot_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_lot_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->lot_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_lot_dimensions() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->lot_dimensions ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_lot_dimensions() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->lot_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_lot_dimensions() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->lot_dimensions;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_lot_size() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->lot_size ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_lot_size() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->lot_size;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_lot_size() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->lot_size;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_has_parking() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->has_parking ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_has_parking() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->has_parking;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_has_parking() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->has_parking;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_parking_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->parking_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_parking_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->parking_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_parking_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->parking_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_parking_spaces() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->parking_spaces ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_parking_spaces() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->parking_spaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_parking_spaces() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->parking_spaces;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_pool_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->pool_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_pool_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->pool_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_pool_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->pool_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_pool_on_property() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->pool_on_property ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_pool_on_property() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->pool_on_property;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_pool_on_property() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->pool_on_property;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_roof() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->roof ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_roof() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->roof;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_roof() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->roof;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_sewer() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->sewer ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_sewer() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->sewer;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_sewer() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->sewer;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_trees() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->trees ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_trees() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->trees;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_trees() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->trees;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_view() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->view ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_view() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->view;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_view() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->view;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_utilities() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->utilities ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_utilities() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->utilities;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_utilities() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->utilities;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_water() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->water ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_water() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->water;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_water() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->water;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_water_access() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->water_access ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_water_access() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->water_access;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_water_access() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->water_access;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_waterfront() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->waterfront ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_waterfront() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->waterfront;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_waterfront() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->waterfront;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_waterfront_description() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->waterfront_description ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_waterfront_description() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->waterfront_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_waterfront_description() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->waterfront_description;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_zoning() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->zoning ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_zoning() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->zoning;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_zoning() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->zoning;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_area_mls_defined() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->area_mls_defined ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_area_mls_defined() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->area_mls_defined;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_area_mls_defined() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->area_mls_defined;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_county() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->county ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_county() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->county;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_county() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->county;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_is_gated_community() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->is_gated_community ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_is_gated_community() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->is_gated_community;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_is_gated_community() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->is_gated_community;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_street_name() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->street_name ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_street_name() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->street_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_street_name() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->street_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_street_number() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->street_number ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_street_number() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->street_number;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_street_number() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->street_number;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_street_post_dir() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->street_post_dir ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_street_post_dir() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->street_post_dir;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_street_post_dir() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->street_post_dir;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_street_pre_direction() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->street_pre_direction ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_street_pre_direction() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->street_pre_direction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_street_pre_direction() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->street_pre_direction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_unit() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->unit ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_unit() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->unit;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_unit() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->unit;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_elementary_a() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->elementary_a ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_elementary_a() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->elementary_a;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_elementary_a() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->elementary_a;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_high_school() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->high_school ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_high_school() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->high_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_high_school() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->high_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_junior_high_school() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->junior_high_school ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_junior_high_school() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->junior_high_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_junior_high_school() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->junior_high_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_middle_school() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->middle_school ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_middle_school() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->middle_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_middle_school() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->middle_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_other_school() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->other_school ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_other_school() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->other_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_other_school() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->other_school;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_school_district() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->school_district ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_school_district() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->school_district;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_school_district() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->school_district;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_condo_fee() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->condo_fee ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_condo_fee() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->condo_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_condo_fee() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->condo_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_condo_fee_frequency() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->condo_fee_frequency ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_condo_fee_frequency() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->condo_fee_frequency;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_condo_fee_frequency() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->condo_fee_frequency;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_condo_fee_includes() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->condo_fee_includes ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_condo_fee_includes() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->condo_fee_includes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_condo_fee_includes() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->condo_fee_includes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_estimated_taxes() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->estimated_taxes ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_estimated_taxes() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->estimated_taxes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_estimated_taxes() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->estimated_taxes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_hoa() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->hoa ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_hoa() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->hoa;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_hoa() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->hoa;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_hoa_fee() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->hoa_fee ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_hoa_fee() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->hoa_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_hoa_fee() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->hoa_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_hoa_fee_includes() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->hoa_fee_includes ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_hoa_fee_includes() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->hoa_fee_includes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_hoa_fee_includes() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->hoa_fee_includes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_hoa_frequency() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->hoa_frequency ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_hoa_frequency() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->hoa_frequency;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_hoa_frequency() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->hoa_frequency;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_hoa_requirement() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->hoa_requirement ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_hoa_requirement() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->hoa_requirement;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_hoa_requirement() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->hoa_requirement;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_mainteinance_fee() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->mainteinance_fee ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_mainteinance_fee() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->mainteinance_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_mainteinance_fee() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->mainteinance_fee;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_tax_year() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->tax_year ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_tax_year() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->tax_year;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_tax_year() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->tax_year;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_contingency_type() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->contingency_type ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_contingency_type() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->contingency_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_contingency_type() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->contingency_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_builder_name() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->builder_name ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_builder_name() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->builder_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_builder_name() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->builder_name;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_cdom() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->cdom ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_cdom() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->cdom;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_cdom() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->cdom;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_contract_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->contract_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_contract_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->contract_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_contract_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->contract_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_is_foreclosure() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->is_foreclosure ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_is_foreclosure() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->is_foreclosure;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_is_foreclosure() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->is_foreclosure;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_feed_image_trans_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->feed_image_trans_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_feed_image_trans_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->feed_image_trans_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_feed_image_trans_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->feed_image_trans_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_foreclosure_type() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->foreclosure_type ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_foreclosure_type() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->foreclosure_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_foreclosure_type() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->foreclosure_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_green_features() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->green_features ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_green_features() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->green_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_green_features() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->green_features;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_modified() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->modified ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_modified() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->modified;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_modified() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->modified;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_latitude_display() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->latitude_display ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_latitude_display() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->latitude_display;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_latitude_display() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->latitude_display;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_list_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->list_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_list_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->list_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_list_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->list_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_listing_agent_id() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->listing_agent_id ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_listing_agent_id() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->listing_agent_id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_listing_agent_id() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->listing_agent_id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_listing_office_id() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->listing_office_id ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_listing_office_id() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->listing_office_id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_listing_office_id() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->listing_office_id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_longitude_display() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->longitude_display ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_longitude_display() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->longitude_display;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_longitude_display() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->longitude_display;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_is_new_construction() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->is_new_construction ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_is_new_construction() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->is_new_construction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_is_new_construction() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->is_new_construction;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_number_of_units() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->number_of_units ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_number_of_units() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->number_of_units;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_number_of_units() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->number_of_units;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_open_house_begins() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->open_house_begins ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_open_house_begins() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->open_house_begins;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_open_house_begins() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->open_house_begins;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_open_house_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->open_house_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_open_house_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->open_house_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_open_house_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->open_house_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_open_house_ends() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->open_house_ends ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_open_house_ends() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->open_house_ends;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_open_house_ends() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->open_house_ends;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_original_list_price() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->original_list_price ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_original_list_price() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->original_list_price;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_original_list_price() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->original_list_price;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_possession_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->possession_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_possession_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->possession_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_possession_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->possession_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_possession_notes() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->possession_notes ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_possession_notes() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->possession_notes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_possession_notes() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->possession_notes;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_price_change_date() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->price_change_date ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_price_change_date() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->price_change_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_price_change_date() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->price_change_date;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_price_per_sq_feet() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->price_per_sq_feet ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_price_per_sq_feet() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->price_per_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_price_per_sq_feet() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->price_per_sq_feet;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_property_sub_type() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->property_sub_type ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_property_sub_type() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->property_sub_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_property_sub_type() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->property_sub_type;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_property_sub_type2() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->property_sub_type2 ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_property_sub_type2() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->property_sub_type2;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_property_sub_type2() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->property_sub_type2;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_short_sale() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->short_sale ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_short_sale() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->short_sale;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_short_sale() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->short_sale;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_status() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->status ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_status() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->status;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_status() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->status;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_sysid() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->sysid ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_sysid() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->sysid;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_id() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_id() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->id ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_id() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->id;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_sysid() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->sysid;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_total_number_of_units() {
	global $displetretsidx_listing;
	if ( !DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_listing->total_number_of_units ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_total_number_of_units() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->total_number_of_units;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_total_number_of_units() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->total_number_of_units;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: boolean
 */
function displetretsidx_has_virtual_tour_non_branded() {
	global $displetretsidx_listing;
	if ( !empty( $displetretsidx_listing->virtual_tour_non_branded ) ) {
		return true;
	}
	return false;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: text
 */
function displetretsidx_get_virtual_tour_non_branded() {
	global $displetretsidx_listing;
	return $displetretsidx_listing->virtual_tour_non_branded;
}

/**
 * @package: displetretsidx_the_listing() or displetretsidx_setup_listing_data( $listing )
 * @return: print: text
 */
function displetretsidx_the_virtual_tour_non_branded() {
	global $displetretsidx_listing;
	echo $displetretsidx_listing->virtual_tour_non_branded;
}

/**
 * @return: print: text
 */
function displetretsidx_the_user_name() {
	global $displetretsidx_template;
	echo $displetretsidx_template['current_user_name'];
}

/**
 * @return: print: text
 */
function displetretsidx_the_user_email() {
	global $displetretsidx_template;
	echo $displetretsidx_template['current_user_email'];
}

/**
 * @return: print: text
 */
function displetretsidx_the_user_phone() {
	global $displetretsidx_template;
	echo $displetretsidx_template['current_user_phone'];
}

/**
 * @return: print: text
 */
function displetretsidx_get_similar_listings_count() {
	global $displetretsidx_template;
	return count( $displetretsidx_template['similar_listings'] );
}

/**
 * @return: boolean
 */
function displetretsidx_have_similar_listings() {
	global $displetretsidx_template;
	global $displetretsidx_listing;
	global $displetretsidx_original_listing;
	if ( DispletRetsIdxUtilities::empty_excluding_zero( $displetretsidx_template['similar_listings_index'] ) ) {
		$displetretsidx_original_listing = $displetretsidx_listing;
		$displetretsidx_template['similar_listings_index'] = 0;
	}
	if ( !empty( $displetretsidx_template['similar_listings'][ $displetretsidx_template['similar_listings_index'] ] ) ) {
		return true;
	}
	else if ( $displetretsidx_template['similar_listings_index'] === count( $displetretsidx_template['similar_listings'] ) ) {
		$displetretsidx_listing = $displetretsidx_original_listing;
		$displetretsidx_template['similar_listings_index'] = 0;
	}
	return false;
}

/**
 * @return: none
 */
function displetretsidx_the_similar_listing() {
	global $displetretsidx_template;
	global $displetretsidx_listing;
	$displetretsidx_listing = $displetretsidx_template['similar_listings'][ $displetretsidx_template['similar_listings_index'] ];
	$displetretsidx_template['similar_listings_index']++;
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_similar_listings_slideshow_class() {
	echo 'displet-similar-listings-slideshow';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_previous_similar_listings_class() {
	echo 'displet-similar-listings-previous';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_next_similar_listings_class() {
	echo 'displet-similar-listings-next';
}

/**
 * @return: text
 */
function displetretsidx_get_similar_listings_search_url() {
	return DispletRetsIdxPropertyDetailsPageModel::get_similar_properties_search_url();
}

/**
 * @return: print: text
 */
function displetretsidx_the_similar_listings_search_url() {
	echo DispletRetsIdxPropertyDetailsPageModel::get_similar_properties_search_url();
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_the_prepopulate_showing_request_date_class() {
	echo 'displet-prepopulated-showing-request-date';
}

?>