<div id="displet-login-register-popup" class="<?php displetretsidx_the_default_styles_class(); ?> <?php displetretsidx_the_color_scheme_class(); ?>">
	<div class="displet-shadow"></div>
	<div class="displet-user-registration-popup">
		<table>
			<tr>
				<td>
					<div class="displet-popup-back"></div>
					<div class="displet-popup">
						<div class="displet-content">

						<?php displetretsidx_get_template_part( 'displet-login-register-form' ); ?>

						</div>
						<a class="<?php displetretsidx_the_login_register_close_class(); ?>" href="#close">
							Close
						</a>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>