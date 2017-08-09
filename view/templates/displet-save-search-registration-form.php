<div id="displet-save-search-registration-form" class="<?php displetretsidx_the_default_styles_class(); ?> <?php displetretsidx_the_color_scheme_class(); ?>">
	<?php if ( !is_user_logged_in() && ( displetretsidx_use_facebook_login() || displetretsidx_use_google_login() ) ) : ?>
		<?php if ( displetretsidx_use_facebook_login() ) : ?>
			<div id="fb-root"></div>
		<?php endif; ?>
		<div class="displet-social-login">
			<?php if ( displetretsidx_use_facebook_login() ) : ?>
				<a class="<?php displetretsidx_the_facebook_login_class(); ?>" href="javascript:;">
					Sign in with Facebook
				</a>
			<?php endif; ?>
			<?php if ( displetretsidx_use_google_login() ) : ?>
				<a class="<?php displetretsidx_the_google_login_class(); ?>" href="<?php displetretsidx_the_google_login_url(); ?>" target="_blank">
					Sign in with Google
				</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ( !is_user_logged_in() ) : ?>
		<div class="displet-field">
			<input class="<?php displetretsidx_save_search_registration_user_name_class(); ?>" type="text" placeholder="Name*" value="<?php displetretsidx_save_search_registration_user_name_value(); ?>">
		</div>
	<?php endif; ?>
	<div class="displet-field">
		<input class="<?php displetretsidx_save_search_registration_user_email_class(); ?>" type="text" placeholder="Email Address*" value="<?php displetretsidx_save_search_registration_user_email_value(); ?>">
	</div>
	<?php if ( !is_user_logged_in() ) : ?>
		<div class="displet-field">
			<input class="<?php displetretsidx_save_search_registration_user_password_class(); ?>" type="password" placeholder="Password*">
		</div>
		<div class="displet-field">
			<input class="<?php displetretsidx_save_search_registration_user_phone_class(); ?>" type="text" placeholder="Phone" value="<?php displetretsidx_save_search_registration_user_phone_value(); ?>">
		</div>
	<?php endif; ?>
	<?php displetretsidx_the_save_search_registration_form(); ?>
	<?php displetretsidx_save_search_registration_error_element(); ?>
	<div class="displet-action">
		<input class="<?php displetretsidx_save_search_registration_submit_class(); ?> displet-button" type="submit" value="Submit">
		<span class="displet-loading-holder">
			<?php displetretsidx_the_loading_element(); ?>
		</span>
	</div>
</div>