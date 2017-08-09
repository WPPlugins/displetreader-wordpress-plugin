<?php

class DispletRetsIdxSavedSearchesController extends DispletRetsIdxLeadsController {
	public static function delete_saved_searches() {
		check_ajax_referer( 'displet_delete_searches_nonce' );
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'displet_delete_searches_request' ) {
			if ( !empty( $_POST['api_search_ids'] ) && is_array( $_POST['api_search_ids'] ) ) {
				$user_id = get_current_user_id();
				$saved_searches = get_user_meta( $user_id, 'displet_saved_searches', true );
				$api_user_id = get_user_meta( $user_id, 'displet_api_user_id', true );
				foreach ( $saved_searches as $key => $saved_search ) {
					if ( !empty( $saved_search['api_id'] ) && in_array( $saved_search['api_id'], $_POST['api_search_ids'] ) ) {
						DispletRetsIdxUsersApiController::delete_saved_search( $api_user_id, $saved_search['api_id'] );
						unset( $saved_searches[ $key ] );
					}
				}
				update_user_meta( $user_id, 'displet_saved_searches', array_values( $saved_searches ) );
				echo 'Succesful Deletion';
			}
			else{
				echo 'No property was selected for deletion.';
			}
			die();
		}
		else {
			echo 'There was an error processing your request. Please try again.';
		}
		die();
	}

	private static function _save_search( $args ) {
		extract( $args );
		if ( !empty( $user ) && !empty( $hash ) ) {
			if ( !user_can( $user->ID, self::$_capabilities['save_search'] ) || user_can( $user->ID, self::$_capabilities['view_leads'] ) ) {
				return 'User does not have the capability to save searches.';
			}
			if ( empty( $name_exists ) ) {
				$saved_searches = !empty( $user->{ self::$_meta_keys['lead']['saved_searches'] } ) ? $user->{ self::$_meta_keys['lead']['saved_searches'] } : array();
				$this_search = array(
					'hash' => $hash,
					'name' => $search_name,
					'notify' => $search_notify,
				);
				if ( !empty( $user->{ self::$_meta_keys['api_user_id'] } ) ) {
					$saved_search_criteria = DispletRetsIdxResidentialsModel::get_search_criteria_from_hash( $hash );
					$saved_search_id = DispletRetsIdxUsersApiController::create_saved_search( $user->{ self::$_meta_keys['api_user_id'] }, $search_name, $saved_search_criteria, $search_notify );
					if ( isset( $saved_search_id ) ) {
						$this_search['api_id'] = $saved_search_id;
					}
				}
				$saved_searches[] = $this_search;
				update_user_meta( $user->ID, self::$_meta_keys['lead']['saved_searches'], $saved_searches );
				new DispletRetsIdxEmail( 'saved_search', array(
					'agent_id' => DispletRetsIdxLeadsModel::get_assigned_agent_id( $user->ID ),
					'lender_id' => DispletRetsIdxLeadsModel::get_assigned_lender_id( $user->ID ),
					'search_url' => trailingslashit( get_permalink( self::$_options['search_results_page_id'] ) ) . $hash,
					'user_id' => $user->ID,
				) );
				do_action( 'displetretsidx_post_lead_saved_search', $user->ID, $this_search );
				return 'Saved Search';
			}
		}
	}

	public static function save_search_ajax() {
		check_ajax_referer( 'displet_save_search_nonce' );
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'displet_save_search_request' ) {
			if ( !is_user_logged_in() ) {
				echo 'Not Logged In';
			}
			elseif ( empty( $_POST['hash'] ) ) {
				echo 'Please perform a search to save.';
			}
			elseif ( empty( $_POST['search_name'] ) ) {
				echo 'Please name the search.';
			}
			elseif ( DispletRetsIdxAgentsModel::is_current_user_agent() && ( empty( $_POST['client_id'] ) || $_POST['client_id'] === 'none' ) ) {
				echo 'No User Selected';
			}
			elseif ( DispletRetsIdxAgentsModel::is_current_user_agent() && $_POST['client_id'] === 'new' && ( empty( $_POST['new_client_name'] ) || empty( $_POST['new_client_email'] ) ) ) {
				echo 'Please complete the required fields.';
			}
			else{
				if ( DispletRetsIdxAgentsModel::is_current_user_agent() ) {
					if ( $_POST['client_id'] === 'new' ) {
						$result = DispletRetsIdxLeadsController::create_new_re_search_user( array(
							'assigned_agent_id' => get_current_user_id(),
							'email' => $_POST['new_client_email'],
							'login_user' => false,
							'name' => $_POST['new_client_name'],
							'send_emails' => $_POST['send_emails'],
							'url' => 'User Added via Save Search',
							'use_cron' => false,
						) );
						if ( !is_array( $result ) || empty( $result['success'] ) ) {
							echo $result;
							die();
						}
						else {
							$user_id = $result['user_id'];
						}
					}
					else {
						$user_id = $_POST['client_id'];
					}
					$user = isset( $user_id ) && !empty( $user_id ) ? get_userdata( $user_id ) : false;
				}
				else{
					$user = wp_get_current_user();
				}
				if ( empty( $user ) || empty( $user->ID ) ) {
					echo 'Could Not Locate User';
				}
				else {
					$saved_searches = $user->{ self::$_meta_keys['lead']['saved_searches'] };
					$name_exists = false;
					if ( !empty( $saved_searches ) && is_array( $saved_searches ) ) {
						foreach ( $saved_searches as $saved_search ) {
							if ( $saved_search['name'] == $_POST['search_name'] ) {
								$name_exists = true;
							}
						}
					}
					if ( $name_exists ) {
						echo 'The search "' . $_POST['search_name'] . '" already exists. Please select a different name.';
					}
					else {
						$result = self::_save_search( array(
							'hash' => $_POST['hash'],
							'search_name' => $_POST['search_name'],
							'search_notify' => $_POST['search_notify'],
							'user' => $user,
						) );
						echo $result;
					}
				}
			}
			die();
		}
		echo 'We\'re sorry, there was an error processing your request. Please try again.';
		die();
	}

	private static function _save_search_registration( $args ) {
		extract( wp_parse_args( $args, array(
			'last_hash' => '',
			'search_parameters' => array(),
			'url' => '',
			'upstream_url' => '',
			'user_name' => '',
			'user_email' => '',
			'user_password' => '',
			'user_phone' => '',
		) ) );
		$search_parameters = array_filter( $search_parameters, array( 'DispletRetsIdxUtilities', 'not_empty_excluding_zero' ) );
		if ( !empty( $user_email ) && !empty( $search_parameters ) ) {
			$user_id = DispletRetsIdxUsersModel::get_user_id_by_email( $user_email );
			$response = array();
			if ( !empty( $user_id ) && !is_user_logged_in() ) {
				if ( !DispletRetsIdxUsersModel::is_valid_user_pass( $user_id, $user_password ) ) {
					return 'Incorrect password for provided email';
				}
				wp_set_auth_cookie( $user_id );
				$response[] = 'Logged In User';
			}
			if ( empty( $user_id ) ) {
				$result = DispletRetsIdxLeadsController::create_new_re_search_user( array(
					'email' => $user_email,
					'last_hash' => $last_hash,
					'name' => $user_name,
					'password' => $user_password,
					'phone' => $user_phone,
					'url' => $url,
					'upstream_url' => $upstream_url,
					'use_cron' => false,
				) );
				if ( !is_array( $result ) || empty( $result['success'] ) ) {
					return $result;
				}
				$user_id = $result['user_id'];
				$response[] = 'Created User';
			}
			if ( !empty( $user_id ) ) {
				$response[] = self::_save_search( array(
					'hash' => DispletRetsIdxResidentialsModel::get_hash_from_search_parameters( $search_parameters ),
					'search_name' => current_time( 'Y/m/d g:i:s A' ),
					'user' => get_userdata( $user_id ),
				) );
				return implode( ' & ', $response );
			}
		}
	}

	public static function save_search_registration_ajax() {
		check_ajax_referer( 'displet_save_search_registration_nonce' );
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'displet_save_search_registration_request' ) {
			if ( ( empty( $_POST['user_name'] ) && !is_user_logged_in()) || empty( $_POST['user_email'] ) || ( !is_user_logged_in() && empty( $_POST['user_password'] ) ) ) {
				echo 'Please complete the required fields.';
			}
			elseif ( empty( $_POST['search_criteria'] ) ) {
				echo 'Please complete at least one search criteria.';
			}
			else {
				$search_criteria = array();
				if ( is_array( $_POST['search_criteria'] ) ) {
					foreach ( $_POST['search_criteria'] as $criteria ) {
						if ( isset( $criteria['field'] ) && isset( $criteria['value'] ) ) {
							$search_criteria[ $criteria['field'] ] = $criteria['value'];
						}
					}
				}
				$result = self::_save_search_registration( array(
					'last_hash' => $_POST['last_hash'],
					'search_parameters' => $search_criteria,
					'url' => $_POST['url'],
					'upstream_url' => $_POST['upstream_url'],
					'user_name' => $_POST['user_name'],
					'user_email' => $_POST['user_email'],
					'user_password' => $_POST['user_password'],
					'user_phone' => $_POST['user_phone'],
				) );
				echo $result;
			}
			die();
		}
		echo 'We\'re sorry, there was an error processing your request. Please try again.';
		die();
	}

	public static function send_users_saved_searches_to_api( $user_id, $api_user_id ) {
		if ( !empty( $user_id ) && !empty( $api_user_id ) ) {
			$saved_searches = get_user_meta( $user_id, 'displet_saved_searches', true );
			if ( !empty( $saved_searches ) ) {
				$new_saved_searches = array();
				foreach ( $saved_searches as $saved_search ) {
					if ( is_array( $saved_search ) ) {
						$hash = $saved_search['hash'];
						$name = $saved_search['name'];
					}
					else{
						$hash = $saved_search;
						$name = false;
					}
					if ( empty( $name ) ) {
						$name = wp_generate_password( 12, false );
					}
					$criteria = DispletRetsIdxResidentialsModel::get_search_criteria_from_hash( $hash );
					$saved_search_id = DispletRetsIdxUsersApiController::create_saved_search( $api_user_id, $name, $criteria );
					$new_saved_searches[] = array(
						'hash' => $hash,
						'name' => $name,
						'api_id' => $saved_search_id
					 );
				}
				update_user_meta( $user_id, 'displet_saved_searches', $new_saved_searches );
			}
		}
	}
}

?>