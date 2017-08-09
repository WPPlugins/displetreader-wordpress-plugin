<?php

class DispletRetsIdxDispletSaveSearchRegistrationShortcodeController extends DispletRetsIdxPlugin {
	public function render_shortcode( $attributes ) {
		$model = DispletRetsIdxPagesModel::get_model();
		$model['quick_search_form_id'] = !empty( $attributes['id'] ) ? $attributes['id'] : 1;
		return DispletRetsIdxTemplatesController::get_template( 'displet-save-search-registration-form.php', $model );
	}
}

?>