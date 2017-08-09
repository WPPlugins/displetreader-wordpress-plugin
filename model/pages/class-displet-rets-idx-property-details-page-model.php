<?php

class DispletRetsIdxPropertyDetailsPageModel extends DispletRetsIdxPagesModel {
	public static function build() {
		self::_replace_disclaimer();
	}

	public static function get_similar_properties() {
		if ( !empty( self::$_model['listings'][0] ) && !empty( self::$_model['listings'][0]->zip ) ) {
			self::$_model['similar_listings'] = DispletRetsIdxResidentialsController::get_similar_properties( array(
				'id' => self::$_model['listings'][0]->id,
				'price' => self::$_model['listings'][0]->list_price,
				'square_feet' => self::$_model['listings'][0]->square_feet,
				'subdivision' => self::$_model['listings'][0]->subdivision,
				'zip' => self::$_model['listings'][0]->zip,
			) );
		}
	}

	public static function get_similar_properties_search_criteria( $narrow = false, $include_subdivision = false ) {
		if ( self::$_model['is_property_details_page'] && !empty( self::$_model['listings'][0] ) ) {
			$min_decimal = $narrow ? .85 : .75;
			$max_decimal = $narrow ? 1.15 : 1.25;
			$criteria = array(
				'min_list_price' => !empty( self::$_model['listings'][0]->list_price ) ? intval( self::$_model['listings'][0]->list_price * $min_decimal / 1000 ) : false,
				'max_list_price' => !empty( self::$_model['listings'][0]->list_price ) ? intval( self::$_model['listings'][0]->list_price * $max_decimal / 1000 ) : false,
				'min_square_feet' => !empty( self::$_model['listings'][0]->square_feet ) ? intval( self::$_model['listings'][0]->square_feet * $min_decimal ) : false,
				'max_square_feet' => !empty( self::$_model['listings'][0]->square_feet ) ? intval( self::$_model['listings'][0]->square_feet * $max_decimal ) : false,
				'zip' => !empty( self::$_model['listings'][0]->zip ) ? self::$_model['listings'][0]->zip : false,
			);
			if ( $include_subdivision ) {
				$criteria['subdivision'] = !empty( self::$_model['listings'][0]->subdivision ) ? self::$_model['listings'][0]->subdivision : false;
			}
			return array_filter( $criteria );
		}
	}

	public static function get_similar_properties_search_url() {
		if ( self::$_model['is_property_details_page'] && !empty( self::$_model['listings'][0] ) ) {
			$criteria = self::get_similar_properties_search_criteria();
			return self::$_model['search_results_page_url'] . '#' . DispletRetsIdxUtilities::double_implode( '/', '=', $criteria );
		}
	}

	public static function set_user_property_rating() {
		if ( !empty( self::$_model['listings'][0] ) && !empty( self::$_model['property_id'] ) ) {
			$saved_properties = DispletRetsIdxLeadsModel::get_saved_properties( self::$_model['current_user_id'] );
			if ( !empty( $saved_properties ) && is_array( $saved_properties ) ) {
				foreach ( $saved_properties as $saved_property ) {
					if ( !empty( $saved_property['sysid'] ) && $saved_property['sysid'] === self::$_model['property_id'] ) {
						self::$_model['listings'][0]->user_rating = intval( $saved_property['rating'] );
					}
				}
			}
		}
	}

	private static function _replace_disclaimer() {
		if ( self::$_model['is_mobile_page'] ) {
			self::$_options['disclaimer'] = str_replace( '%%date_last_updated%%', date( 'Y-m-d', strtotime( '-12 hours' ) ), self::$_options['disclaimer'] );
		}
	}
}

?>