<?php

class DispletRetsIdxPopupsModel extends DispletRetsIdxPagesModel {
	public static function build_login_register() {
		self::_set_google_auth_url();
	}

	public static function build_save_search_registration() {
		self::_set_google_auth_url();
	}

	private static function _set_google_auth_url() {
		self::$_model['google_auth_url'] = DispletRetsIdxGoogleLoginController::get_authorization_url();
	}
}

?>