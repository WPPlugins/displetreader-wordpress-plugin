<?php

class DispletRetsIdxEmail extends DispletRetsIdxEmailController {
	private static $_types = array(
		'activity_report',
		'address_captured',
		'assigned_lead',
		'emailed_friend',
		'registration',
		'saved_property',
		'saved_search',
		'showing_request',
	);

	public function __construct( $type, $args = array() ) {
		if ( in_array( $type, self::$_types ) ) {
			$this->_parse_args( $type, $args );
			$this->_build_model();
			$this->_send_emails();
		}
	}

	private function _parse_args( $type, $args ) {
		$this->_model = wp_parse_args( $args, array(
			'activity_report' => false,
			'agent_id' => false,
			'friend_email' => false,
			'friend_name' => false,
			'lender_id' => false,
			'listings' => array(),
			'property_address' => false,
			'property_id' => false,
			'property_mls' => false,
			'property_url' => false,
			'registration_url' => false,
			'search_url' => false,
			'user_appointment' => false,
			'user_appointment2' => false,
			'user_has_realtor' => false,
			'user_id' => false,
			'user_email' => '',
			'user_login' => false,
			'user_message' => false,
			'user_name' => '',
			'user_password' => false,
			'user_phone' => '',
			'user_registration_url' => false,
			'user_username' => false,
		) );
		$this->_type = $type;
	}
}

?>