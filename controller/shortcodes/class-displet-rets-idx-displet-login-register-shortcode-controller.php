<?php

class DispletRetsIdxDispletLoginRegisterShortcodeController extends DispletRetsIdxPlugin {
	public function render_shortcode( $attributes ) {
		return DispletRetsIdxTemplatesController::get_template( 'displet-login-register-form.php', DispletRetsIdxPagesModel::get_model() );
	}
}

?>