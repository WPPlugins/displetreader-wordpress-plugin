<?php if ( displetretsidx_have_listings() ) : while ( displetretsidx_have_listings() ) : displetretsidx_the_listing(); ?>
<div id="displet-property-details" class="<?php displetretsidx_the_default_styles_class(); ?> <?php displetretsidx_the_color_scheme_class(); ?> displet-selectively-styled">
	<div class="displet-styles">
		<div class="displet-pagination displet-group">
			<a class="<?php displetretsidx_the_previous_result_class(); ?> displet-left" href="javascript:;">
				Previous Result
			</a>
			<a class="<?php displetretsidx_the_next_result_class(); ?> displet-right" href="javascript:;">
				Next Result
			</a>
		</div>
		<div class="displet-columns">
			<div class="displet-header displet-table">
				<div class="displet-tr">
					<div class="displet-address displet-td">
						<h2 class="<?php displetretsidx_the_address_class(); ?>">
							<?php displetretsidx_the_address(); ?>
						</h2>
						<h3>
							<?php if ( displetretsidx_has_city() ) : ?>
								<?php displetretsidx_the_city(); ?>,
							<?php endif; ?>
							<?php if ( displetretsidx_has_state() ) : ?>
								<?php displetretsidx_the_state(); ?>
							<?php endif; ?>
							<?php if ( displetretsidx_has_zip() ) : ?>
								<?php displetretsidx_the_zip(); ?>
							<?php endif; ?>
						</h3>
						<?php if ( displetretsidx_use_subdivision() && displetretsidx_has_subdivision() ) : ?>
							<h3>
								<?php displetretsidx_the_subdivision(); ?>
							</h3>
						<?php endif; ?>
					</div>
					<div class="displet-price displet-td displet-group">
						<h2>
							<?php if ( displetretsidx_has_price() ) : ?>
								$<?php displetretsidx_the_price(); ?>
							<?php endif; ?>
						</h2>
					</div>
				</div>
			</div>
			<div class="displet-action displet-group">
				<a class="<?php displetretsidx_the_request_showing_class(); ?> displet-item" href="javascript:;">
					Request Info/ Showing
				</a>
				<a class="<?php displetretsidx_the_save_property_class(); ?> displet-item" href="javascript:;">
					Save Property
				</a>
				<div class="displet-row displet-group">
					<?php if ( displetretsidx_has_phone() ) : ?>
						<div class="displet-phone displet-item">
							Any Questions? Call Us at <?php displetretsidx_the_phone(); ?>
						</div>
					<?php endif; ?>
					<a class="<?php displetretsidx_the_email_friend_class(); ?> displet-item" href="javascript:;">
						Email to a Friend
					</a>
				</div>
			</div>
			<?php if ( displetretsidx_has_description() ) : ?>
				<div class="displet-description">
					<h4>
						Property Description
					</h4>
					<div>
						<?php displetretsidx_the_description(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( displetretsidx_has_photo_urls() ) : ?>
		<div class="displet-styles">
			<div class="displet-photos" style="<?php displetretsidx_the_photos_container_style(); ?>">
				<ul class="<?php displetretsidx_the_photos_slideshow_class(); ?> displet-group">
					<?php $image_urls = displetretsidx_get_photo_urls(); foreach ( $image_urls as $image_url ) : ?>
						<li>
							<img src="<?php echo $image_url; ?>">
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="<?php displetretsidx_the_previous_photo_class(); ?>"></div>
				<div class="<?php displetretsidx_the_next_photo_class(); ?>"></div>
			</div>
			<?php if ( !displetretsidx_has_api_key() ) : ?>
				<div class="displet-free-disclaimer">
					This site is currently using the FREE version of the Displet plugin. For HIGH RES images &amp; up-to-date RETS data, please upgrade.
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="displet-styles displet-group">
		<?php if ( displetretsidx_has_photo_urls() ) : ?>
			<div class="<?php displetretsidx_the_slideshow_thumbnails_class(); ?> displet-group">
				<?php $i = 0; foreach ( $image_urls as $image_url ) : ?>
					<div>
						<a href="javascript:;" style="background-image: url( <?php echo $image_url; ?> );" data-slide-index="<?php echo $i; ?>"></a>
					</div>
				<?php $i++; endforeach; ?>
			</div>
		<?php endif; ?>
		<?php if ( displetretsidx_has_disclaimer() && displetretsidx_is_disclaimer_above_details() ) : ?>
			<div class="displet-disclaimer displet-group">
				<?php displetretsidx_the_disclaimer(); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="displet-styles">
		<div class="displet-details-section">
			<?php if ( displetretsidx_has_basic_property_details_html() ) : ?>
				<h4>
					Property Details
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_basic_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_basic_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_interior_property_details_html() ) : ?>
				<h4>
					Interior Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_interior_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_interior_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_exterior_property_details_html() ) : ?>
				<h4>
					Lot &amp; Exterior Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_exterior_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_exterior_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_area_property_details_html() ) : ?>
				<h4>
					Area Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_area_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_area_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_school_property_details_html() ) : ?>
				<h4>
					School Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_school_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_school_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_tax_and_hoa_property_details_html() ) : ?>
				<h4>
					Tax &amp; HOA Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_tax_and_hoa_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_tax_and_hoa_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( displetretsidx_has_additional_property_details_html() ) : ?>
				<h4>
					Additional Information
				</h4>
				<div class="displet-details displet-table">
					<div class="displet-tr">
						<div class="displet-details-first displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_additional_property_details_html_first_half(); ?>
							</div>
						</div>
						<div class="displet-details-second displet-td">
							<div class="displet-details-half displet-table">
								<?php displetretsidx_the_additional_property_details_html_second_half(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( displetretsidx_has_maps() ) : ?>
			<div class="<?php displetretsidx_the_map_tabs_class(); ?> displet-group">
				<a class="<?php displetretsidx_the_map_tab_class(); ?>" href="javascript:;">
					Map
				</a>
				<a class="<?php displetretsidx_the_street_view_tab_class(); ?>" href="javascript:;">
					Street View
				</a>
			</div>
			<div class="displet-map">
				<?php displetretsidx_the_maps(); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php if ( displetretsidx_use_walk_score() ) : ?>
		<div class="displet-walk-score">
			<?php displetretsidx_the_walk_score(); ?>
		</div>
	<?php endif; ?>
	<div class="displet-styles">
		<?php if ( displetretsidx_have_similar_listings() ) : ?>
			<div class="displet-similar-listings-title">
				Similar Properties
			</div>
			<div class="displet-similar-listings">
				<ul class="<?php displetretsidx_the_similar_listings_slideshow_class(); ?>">
					<?php while ( displetretsidx_have_similar_listings() ) : displetretsidx_the_similar_listing(); ?>
						<li>
							<a href="<?php displetretsidx_the_permalink(); ?>">
								<div class="displet-image" style="background-image: url('<?php displetretsidx_the_photo_url(); ?>');"></div>
								<?php if ( displetretsidx_has_price() ) : ?>
									<div class="displet-price">
										$<?php displetretsidx_the_price(); ?>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_has_address() ) : ?>
									<div class="displet-address">
										<?php displetretsidx_the_address(); ?>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_use_subdivision() ) : ?>
									<div class="displet-subdivision">
										<?php displetretsidx_the_subdivision(); ?>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_has_bedrooms() || displetretsidx_has_bathrooms() || displetretsidx_has_square_feet() ) : ?>
									<div class="displet-beds-baths-square-feet">
										<?php if ( displetretsidx_has_bedrooms() ) : ?>
											<?php displetretsidx_the_bedrooms(); ?>
											beds
											<?php if ( displetretsidx_has_bathrooms() || displetretsidx_has_square_feet() ) : ?>
												/
											<?php endif; ?>
										<?php endif; ?>
										<?php if ( displetretsidx_has_bathrooms() ) : ?>
											<?php displetretsidx_the_bathrooms(); ?>
											baths
											<?php if ( displetretsidx_has_square_feet() ) : ?>
												/
											<?php endif; ?>
										<?php endif; ?>
										<?php if ( displetretsidx_has_square_feet() ) : ?>
											<?php displetretsidx_the_square_feet(); ?>
											sq. ft.
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_use_mls_number() ) : ?>
									<div class="displet-mls-number">
										MLS&reg; #:
										<span class="<?php echo displetretsidx_is_mls_number_emphasized() ? 'displet-emphasize displet-font-color' : 'displet-font-color-light'; ?>">
											<?php displetretsidx_the_mls_number(); ?>
										</span>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_use_listing_agent() || displetretsidx_use_listing_office() ) : ?>
									<div class="displet-courtesy">
										Courtesy of
										<span class="<?php echo displetretsidx_is_listing_agent_name_emphasized() ? 'displet-emphasize displet-font-color' : 'displet-font-color-light'; ?>">
											<?php displetretsidx_the_listing_agent(); ?>
										</span>
										<span class="<?php echo displetretsidx_is_listing_office_name_emphasized() ? 'displet-emphasize displet-font-color' : 'displet-font-color-light'; ?>">
											<?php displetretsidx_the_listing_office(); ?>
										</span>
									</div>
								<?php endif; ?>
								<?php if ( displetretsidx_use_disclaimer_image() ) : ?>
									<img class="displet-mls-logo" src="<?php displetretsidx_the_disclaimer_image_url(); ?>" />
								<?php endif; ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="<?php displetretsidx_the_next_similar_listings_class(); ?>"></div>
				<div class="<?php displetretsidx_the_previous_similar_listings_class(); ?>"></div>
			</div>
		<?php endif; ?>
		<div class="displet-powered">
			<?php displetretsidx_the_credit(); ?>
		</div>
		<?php if ( !displetretsidx_has_api_key() ) : ?>
			<div class="displet-free-disclaimer">
				This site is currently using the FREE version of the Displet plugin. For HIGH RES images &amp; up-to-date RETS data, please upgrade.
			</div>
		<?php endif; ?>
		<?php if ( displetretsidx_has_disclaimer() && !displetretsidx_is_disclaimer_above_details() ) : ?>
			<div class="displet-disclaimer displet-group">
				<?php displetretsidx_the_disclaimer(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endwhile; endif; ?>