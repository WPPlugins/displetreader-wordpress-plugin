<?php

/**
 * @return: print: HTML markup
 */
function displetretsidx_save_search_registration_error_element() {
	echo '<div class="displet-save-search-registration-error"></div>';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_save_search_registration_user_name_class() {
	echo 'displet-save-search-registration-user-name';
}

/**
 * @return: print: text
 */
function displetretsidx_save_search_registration_user_name_value() {
	$user = DispletRetsIdxLeadsModel::get_current_user_data();
	if ( !empty( $user['name'] ) ) {
		echo $user['name'];
	}
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_save_search_registration_user_email_class() {
	echo 'displet-save-search-registration-user-email';
}

/**
 * @return: print: text
 */
function displetretsidx_save_search_registration_user_email_value() {
	$user = DispletRetsIdxLeadsModel::get_current_user_data();
	if ( !empty( $user['email'] ) ) {
		echo $user['email'];
	}
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_save_search_registration_user_password_class() {
	echo 'displet-save-search-registration-user-password';
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_save_search_registration_user_phone_class() {
	echo 'displet-save-search-registration-user-phone';
}

/**
 * @return: print: text
 */
function displetretsidx_save_search_registration_user_phone_value() {
	$user = DispletRetsIdxLeadsModel::get_current_user_data();
	if ( !empty( $user['phone'] ) ) {
		echo $user['phone'];
	}
}

/**
 * @return: print: HTML markup
 */
function displetretsidx_the_save_search_registration_form() {
	global $displetretsidx_template;
	$form = !empty( $displetretsidx_template['quick_search_form_id'] ) ? $displetretsidx_template['quick_search_form_id'] : 1;
	if ( DispletRetsIdxSearchFieldsController::has_quick_search_form( $form ) ) {
		$html = '<div class="displet-save-search-registration-form">';
		$column = 1;
		while ( DispletRetsIdxSearchFieldsController::has_quick_search_form( $form, $column ) ) {
			$html .= DispletRetsIdxSearchFieldsController::get_quick_search_form_html( $form, $column );
			$column++;
		}
		$html .= '</div>';
		echo $html;
	}
}

/**
 * @return: print: CSS classname
 */
function displetretsidx_save_search_registration_submit_class() {
	echo 'displet-submit';
}

?>