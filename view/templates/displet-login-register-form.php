<div id="displet-login-register-form" class="<?php displetretsidx_the_default_styles_class(); ?> <?php displetretsidx_the_color_scheme_class(); ?>">
	<div class="displet-create displet-title displet-margin">
		Create An Account
	</div>
	<?php displetretsidx_the_login_register_notification_element(); ?>
	<?php if ( displetretsidx_use_facebook_login() || displetretsidx_use_google_login() ) : ?>
		<div class="displet-social-login">
			<?php if ( displetretsidx_use_facebook_login() ) : ?>
				<div id="fb-root"></div>
			<?php endif; ?>
			<div class="displet-margin">
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
		</div>
		<div class="displet-register displet-title displet-margin">
			or Register Below
		</div>
	<?php endif; ?>
	<div class="<?php displetretsidx_the_registration_form_class(); ?>">
		<div class="displet-table">
			<div class="displet-tr">
				<div class="displet-td">
					<input class="<?php displetretsidx_the_registration_name_class(); ?>" type="text" placeholder="Name*">
				</div>
				<div class="displet-td">
					<input class="<?php displetretsidx_the_registration_email_class(); ?>" type="text" placeholder="E-mail*">
				</div>
				<?php if ( displetretsidx_use_registration_phone() ) : ?>
					<div class="displet-td">
						<input class="<?php displetretsidx_the_registration_phone_class(); ?>" type="text" placeholder="Phone<?php if ( displetretsidx_require_registration_phone() ) echo '*'; ?>">
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( displetretsidx_use_registration_realtor() ) : ?>
			<div class="displet-radio displet-margin">
				Are you working with a Realtor?<?php if ( displetretsidx_require_registration_realtor() ) echo '*'; ?>
				<input class="<?php displetretsidx_the_registration_realtor_class(); ?>" type="radio" name="displet_realtor" value="Yes">
				<span class="displet-label">
					Yes
				</span>
				<input class="<?php displetretsidx_the_registration_realtor_class(); ?>" type="radio" name="displet_realtor" value="No">
				<span class="displet-label">
					No
				</span>
			</div>
		<?php endif; ?>
		<div class="displet-custom-title displet-title displet-margin">
			<?php displetretsidx_the_login_register_title(); ?>
		</div>
		<div class="displet-registration-message displet-margin">
			<?php displetretsidx_the_login_register_message(); ?>
		</div>
		<div class="displet-register-login displet-margin displet-group">
			<a class="<?php displetretsidx_the_registration_submit_class(); ?> displet-right" href="#register">
				Register
				<?php displetretsidx_the_loading_element(); ?>
			</a>
			<a class="<?php displetretsidx_the_login_link_class(); ?>" href="javascript:;">
				Already have an account?
			</a>
		</div>
		<div class="displet-margin">
			<?php displetretsidx_the_registration_error_element(); ?>
		</div>
	</div>
	<div class="<?php displetretsidx_the_login_form_class(); ?>">
		<div class="displet-login displet-title">
			Login
		</div>
		<div class="displet-table">
			<div class="displet-tr">
				<div class="displet-td">
					<input class="<?php displetretsidx_the_login_email_class(); ?>" type="text" placeholder="E-mail*">
				</div>
				<?php if ( displetretsidx_use_password() ) : ?>
					<div class="displet-td">
						<input class="<?php displetretsidx_the_login_password_class(); ?>" type="password" placeholder="Password*">
					</div>
				<?php endif; ?>
				<div class="displet-smaller-td displet-td">
					<a class="<?php displetretsidx_the_login_submit_class(); ?>" href="#login">
						Login
						<?php displetretsidx_the_loading_element(); ?>
					</a>
				</div>
			</div>
		</div>
		<div class="displet-margin">
			<?php if ( displetretsidx_use_password() ) : ?>
				<div class="displet-forgot-password">
					<a href="<?php displetretsidx_the_lost_password_url(); ?>" class="displet-font-color">
						Forgot Password?
					</a>
				</div>
			<?php endif; ?>
			<?php displetretsidx_the_login_error_element(); ?>
		</div>
	</div>
	<div class="displet-disclaimer displet-margin">
		<?php displetretsidx_the_login_register_disclaimer(); ?>
	</div>
</div>