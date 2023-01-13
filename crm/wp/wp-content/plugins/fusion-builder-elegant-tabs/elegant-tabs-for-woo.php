<?php
/**
 * Elegant tabs for WooCommerce
 */

if ( ! class_exists( 'ElegantWooTabs' ) ) {
	class ElegantWooTabs {

		/**
		 * The constructor
		 */
		function __construct() {

			add_filter( 'woocommerce_product_tabs', array( $this, 'infi_elegant_tabs' ), 100, 2 );
			add_filter( 'woocommerce_product_tab_panels', array( $this, 'infi_elegant_tabs' ), 100 );
			add_action( 'woocommerce_product_write_panel_tabs', array( $this, 'create_admin_tab' ) );
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.6', '<=' ) ) {
				add_action( 'woocommerce_product_write_panels', array( $this, 'woo_add_custom_general_fields' ) );
			} else {
				add_action( 'woocommerce_product_data_panels', array( $this, 'woo_add_custom_general_fields' ) );
			}
			add_action( 'woocommerce_process_product_meta', array( $this, 'woo_tabs_meta_update' ) );

			// Enqueue CSS and JS on backend.
			add_action( 'admin_print_scripts', array( $this, 'print_css_js' ) );
		}

		/**
		 * Render tabs for woocommerce.
		 *
		 * @param array $tabs Holds the attributes for the tabs.
		 * @param bool  $return Checks whether the function echo or return the tabs.
		 */
		function infi_elegant_tabs( $tabs, $return = false ) {
			global $post;
			$tab_style         = $color_act_txt = $color_act_bg = $el_class = $style = $color_content_bg = $color_content_txt = $tab_animation = '';
			$elegant_tabs_meta = get_post_meta( $post->ID, 'elegant_woo_tabs_meta', true );

			$tab_style         = isset( $elegant_tabs_meta['tab_style'] ) ? $elegant_tabs_meta['tab_style'] : elegant_tabs()->get_option( 'tab_style' );
			$tab_animation     = isset( $elegant_tabs_meta['tab_animation'] ) ? $elegant_tabs_meta['tab_animation'] : elegant_tabs()->get_option( 'tab_animation' );
			$tab_type          = isset( $elegant_tabs_meta['tab_type'] ) ? $elegant_tabs_meta['tab_type'] : elegant_tabs()->get_option( 'tab_type' );
			$mobile_tab        = isset( $elegant_tabs_meta['mobile_tab'] ) ? $elegant_tabs_meta['mobile_tab'] : elegant_tabs()->get_option( 'mobile_tab' );
			$justified_tabs    = isset( $elegant_tabs_meta['justified_tabs'] ) ? $elegant_tabs_meta['justified_tabs'] : elegant_tabs()->get_option( 'justified_tabs' );
			$color_tab_txt     = isset( $elegant_tabs_meta['color_tab_txt'] ) ? $elegant_tabs_meta['color_tab_txt'] : elegant_tabs()->get_option( 'color_tab_txt' );
			$color_tab_bg      = isset( $elegant_tabs_meta['color_tab_bg'] ) ? $elegant_tabs_meta['color_tab_bg'] : elegant_tabs()->get_option( 'color_tab_bg' );
			$color_act_txt     = isset( $elegant_tabs_meta['color_act_txt'] ) ? $elegant_tabs_meta['color_act_txt'] : elegant_tabs()->get_option( 'color_act_txt' );
			$color_act_bg      = isset( $elegant_tabs_meta['color_act_bg'] ) ? $elegant_tabs_meta['color_act_bg'] : elegant_tabs()->get_option( 'color_act_bg' );
			$color_content_bg  = isset( $elegant_tabs_meta['color_content_bg'] ) ? $elegant_tabs_meta['color_content_bg'] : elegant_tabs()->get_option( 'color_content_bg' );
			$color_content_txt = isset( $elegant_tabs_meta['color_content_txt'] ) ? $elegant_tabs_meta['color_content_txt'] : '#383838';
			$title_font_size   = elegant_tabs()->get_option( 'tab_title_font' );

			// Set default tab if nothing is set.
			$tab_style = ( '' == $tab_style ) ? 'bars' : $tab_style;
			$tab_type  = ( '' == $tab_type ) ? 'horizontal' : $tab_type;

			$rand = uniqid();

			if ( 'line' !== $tab_style ) {
				$style .= 'background:' . $color_tab_bg . ';';
			}

			if ( '' !== $title_font_size ) {
				$style .= 'font-size:' . $title_font_size . 'px;';
			}

			$style .= 'color:' . $color_tab_txt . ';';

			if ( ! in_array( $tab_style, array( 'bars', 'iconbox', 'underline', 'topline', 'iconfall', 'linebox', 'flip', 'fillup' ), true ) ) {
				$tab_type = 'horizontal';
			}

			$mobile_class = ( 'select' === $mobile_tab ) ? 'et-mobile-enabled ' : 'et-mobile-disabled ';
			$justified    = ( 'yes' === $justified_tabs && 'horizontal' === $tab_type ) ? 'justified-tabs ' : 'non-justified ';

			if ( class_exists( 'YikesWooCommerceCustomProductTabs' ) ) {
				$product_tabs = get_post_meta( $post->ID, 'yikes_woo_products_tabs', true );

				if ( ! empty( $product_tabs ) ) {
					$i = 25; // setup priorty to loop over, and render tabs in proper order.
					foreach ( $product_tabs as $tab ) {

						// Do not show tabs with empty titles on the front end.
						if ( empty( $tab['title'] ) ) {
							continue;
						}

						$tab_key = $tab['id'];

						$tabs[ $tab_key ] = array(
							'title'    => $tab['title'],
							'priority' => $i++,
							'content'  => $tab['content'],
							'callback' => array( 'YikesWooCommerceCustomProductTabs', 'custom_product_tabs_panel_content' ),
						);
					}
				}
			}

			if ( ! $return && ! empty( $tabs ) ) {
				?>
				<section class="elegant-tabs-container et-<?php echo esc_attr( $tab_type ); ?>">
					<div class="et-tabs et-<?php echo esc_attr( $tab_type ); ?> <?php echo esc_attr( $mobile_class ); ?><?php echo esc_attr( $justified ); ?>et-tabs-style-<?php echo esc_attr( $tab_style ); ?> tab-class-<?php echo esc_attr( $rand ); ?>" data-tab_style="<?php echo esc_attr( $tab_style ); ?>" data-active-bg="<?php echo esc_attr( $color_act_bg ); ?>" data-active-text="<?php echo esc_attr( $color_act_txt ); ?>">
						<nav>
							<ul>
							<?php foreach ( $tabs as $key => $tab ) : ?>
								<?php
								$tab_icon = '';
								$has_icon = '';
								$icon     = isset( $elegant_tabs_meta[ 'tab-key-' . $key ] ) ? $elegant_tabs_meta[ 'tab-key-' . $key ] : elegant_tabs()->get_option( 'tab-key-' . $key );
								if ( '' !== $icon ) {
									$tab_icon = '<i class="iw-icons ' . $icon . '" style="color:' . $color_tab_txt . ';"></i>';
									$has_icon = 'has-icon';
								}
								?>
								<li class="<?php echo esc_attr( $key ); ?>_tab" style="<?php echo esc_attr( $style ); ?>" data-tab-id="#tab-<?php echo esc_attr( $key ); ?>">
									<a href="javascript:void(0)" class="et-anchor-tag" data-href="#tab-<?php echo esc_attr( $key ); ?>" style="color:<?php echo esc_attr( $color_tab_txt ); ?>;">
										<?php
										if ( '' !== $icon ) {
											echo $tab_icon;
										}
										?>
										<?php echo '<span class="' . $has_icon . '">' . esc_attr( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ) . '</span>'; ?>
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
						</nav>
						<div class="et-content-wrap">
						<?php
						$n = 1;
						?>
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<?php
							if ( 'accordion' === $mobile_tab ) :
								$active_class = '';
								if ( 1 == $n ) {
									$active_class = ' infi-active-tab';
									$n++;
								}
								?>
								<div class="infi-responsive-tabs" data-tab_style="<?php echo esc_attr( $tab_style ); ?>" data-active-bg="<?php echo esc_attr( $color_act_bg ); ?>" data-active-text="<?php echo esc_attr( $color_act_txt ); ?>">
									<div class="infi-tab-accordion<?php echo esc_attr( $active_class ); ?>">
											<?php
											$tab_icon = $has_icon = '';
											$icon     = isset( $elegant_tabs_meta[ 'tab-key-' . $key ] ) ? $elegant_tabs_meta[ 'tab-key-' . $key ] : elegant_tabs()->get_option( 'tab-key-' . $key );
											if ( '' !== $icon ) {
												$tab_icon = '<i class="iw-icons ' . $icon . '" style="color:' . $color_tab_txt . ';"></i>';
												$has_icon = 'has-icon';
											}
											?>
											<div class="<?php echo esc_attr( $key ); ?>_tab infi_accordion_item" style="<?php echo esc_attr( $style ); ?>">
												<div class="infi-accordion-item-heading" data-href="#tab-<?php echo esc_attr( $key ); ?>" style="color:<?php echo esc_attr( $color_tab_txt ); ?>;">
													<?php
													if ( '' !== $icon ) {
														echo $tab_icon;
													}
													?>
													<?php echo '<span class="' . $has_icon . '">' . esc_attr( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ) . '</span>'; ?>
												</div>
											</div>
										</div>
								</div>
							<?php endif; ?>
							<section class="panel entry-content" id="tab-<?php echo esc_attr( $key ); ?>" data-animation="<?php echo esc_attr( $tab_animation ); ?>" style="background:<?php echo esc_attr( $color_content_bg ); ?>; color:<?php echo esc_attr( $color_content_txt ); ?>;">
								<div class="infi-content-wrapper">
									<?php call_user_func( $tab['callback'], $key, $tab ); ?>
								</div>
							</section>
						<?php endforeach; ?>
						</div><!-- /et-content-wrap -->
					</div><!-- /et-tabs -->
				</section>
				<?php
			} else {
				return $tabs;
			}
		}

		/**
		 * Add settings page for elegant tabs under products menu.
		 */
		function woo_add_custom_general_fields() {
			global $woocommerce, $post;
			$tabs = array(
				'description'            => array(
			'title'    => 'Description',
			'priority' => 0,
			),
				'reviews'                => array(
			'title'    => 'Reviews',
			'priority' => 1,
			),
				'additional_information' => array(
			'title'    => 'Additional Information',
			'priority' => 2,
			),
			);
			$tabs = apply_filters( 'woocommerce_product_tabs', $tabs, true );
			?>
			<div id="infi_elegant_tabs" class="panel woocommerce_options_panel">
				<p class="toolbar" style=" margin-top: 0; ">
					<strong><?php esc_html_e( 'Choose different style and colors for the tabs being displayed on this product page.', 'woocommerce' ); ?></strong>
				</p>
				<div class="options_group">
					<?php
					$elegant_tabs_meta = get_post_meta( $post->ID, 'elegant_woo_tabs_meta', true );

					if ( ! isset( $elegant_tabs_meta['color_tab_txt'] ) && class_exists( 'FusionBuilder' ) ) {
						$elegant_tabs_meta['tab_style']         = elegant_tabs()->get_option( 'tab_style' );
						$elegant_tabs_meta['tab_animation']     = elegant_tabs()->get_option( 'tab_animation' );
						$elegant_tabs_meta['tab_type']          = elegant_tabs()->get_option( 'tab_type' );
						$elegant_tabs_meta['mobile_tab']        = elegant_tabs()->get_option( 'mobile_tab' );
						$elegant_tabs_meta['justified_tabs']    = elegant_tabs()->get_option( 'justified_tabs' );
						$elegant_tabs_meta['color_tab_txt']     = elegant_tabs()->get_option( 'color_tab_txt' );
						$elegant_tabs_meta['color_tab_bg']      = elegant_tabs()->get_option( 'color_tab_bg' );
						$elegant_tabs_meta['color_act_txt']     = elegant_tabs()->get_option( 'color_act_txt' );
						$elegant_tabs_meta['color_act_bg']      = elegant_tabs()->get_option( 'color_act_bg' );
						$elegant_tabs_meta['color_content_bg']  = elegant_tabs()->get_option( 'color_content_bg' );
						$elegant_tabs_meta['color_content_txt'] = '#383838';
					}

					$mobile_tab_designs = array(
						'Dropdown Select Box' => 'select',
						'Tabs to Accordion'   => 'accordion',
					);

					$tab_styles = array(
						'Bar Style'          => 'bars',
						'Icon Box Style'     => 'iconbox',
						'Underline Style'    => 'underline',
						'Top Line Style'     => 'topline',
						'Central Line Style' => 'iconfall',
						'Line Style'         => 'line',
						'Line Box Style'     => 'linebox',
						'Flip Style'         => 'flip',
						'Trapezoid Style'    => 'tzoid',
						'Fillup Style'       => 'fillup',
					);

					$tab_animation = array(
						__( 'No  Animation', 'infiwebs' )  => '',
						__( 'Swing', 'infiwebs' )          => 'swing',
						__( 'Pulse', 'infiwebs' )          => 'pulse',
						__( 'Flash', 'infiwebs' )          => 'flash',
						__( 'Fade In', 'infiwebs' )        => 'fadeIn',
						__( 'Fade In Up', 'infiwebs' )     => 'fadeInUp',
						__( 'Fade In Down', 'infiwebs' )   => 'fadeInDown',
						__( 'Fade In Left', 'infiwebs' )   => 'fadeInLeft',
						__( 'Fade In Right', 'infiwebs' )  => 'fadeInRight',
						__( 'Fade In Up Long', 'infiwebs' ) => 'fadeInUpBig',
						__( 'Fade In Down Long', 'infiwebs' ) => 'fadeInDownBig',
						__( 'Fade In Left Long', 'infiwebs' ) => 'fadeInLeftBig',
						__( 'Fade In Right Long', 'infiwebs' ) => 'fadeInRightBig',
						__( 'Slide In Down', 'infiwebs' )  => 'slideInDown',
						__( 'Slide In Up', 'infiwebs' )    => 'slideInUp',
						__( 'Slide In Left', 'infiwebs' )  => 'slideInLeft',
						__( 'Bounce In', 'infiwebs' )      => 'bounceIn',
						__( 'Bounce In Up', 'infiwebs' )   => 'bounceInUp',
						__( 'Bounce In Down', 'infiwebs' ) => 'bounceInDown',
						__( 'Bounce In Left', 'infiwebs' ) => 'bounceInLeft',
						__( 'Bounce In Right', 'infiwebs' ) => 'bounceInRight',
						__( 'Rotate In', 'infiwebs' )      => 'rotateIn',
						__( 'Light Speed In', 'infiwebs' ) => 'lightSpeedIn',
						__( 'Roll In', 'infiwebs' )        => 'rollIn',
					);
					?>
					<p class="form-field">
						<label for="tab_style"><?php esc_html_e( 'Select Tab Style:', 'infiwebs' ); ?></label>
						<select name="tab_style" id="tab_style">
							<?php
							foreach ( $tab_styles as $label => $value ) {
								$sel = $value === $elegant_tabs_meta['tab_style'] ? 'selected' : '';
									echo '<option value="' . esc_attr( $value ) . '" ' . esc_attr( $sel ) . '>' . esc_attr( $label ) . '</option>';
							}
							?>
						</select>
						<img class="help_tip" data-tip="Select any tab style you would like to use. For visual demo of the tabs, please visit the plugins demo page." src="<?php echo esc_attr( plugins_url( '/assets/images/help.png', WC_PLUGIN_FILE ) ); ?>" height="16" width="16" />
					</p>
					<p class="form-field">
						<label for="tab_animation"><?php esc_html_e( 'Select Tab Animation:', 'infiwebs' ); ?></label>
						<select name="tab_animation" id="tab_animation">
							<?php
							foreach ( $tab_animation as $label => $value ) {
								$sel = $value === $elegant_tabs_meta['tab_animation'] ? 'selected' : '';
								echo '<option value="' . esc_attr( $value ) . '" ' . esc_attr( $sel ) . '>' . esc_attr( $label ) . '</option>';
							}
							?>
						</select>
						<img class="help_tip" data-tip="Select animation type for the tab content area. Animation will be applied when the tab is switched to another." src="<?php echo esc_attr( plugins_url( '/assets/images/help.png', WC_PLUGIN_FILE ) ); ?>" height="16" width="16" />
					</p>
					<p class="form-field">
						<label for="tab_type"><?php esc_html_e( 'Select Tab Type:', 'infiwebs' ); ?></label></th>
						<select name="tab_type" id="tab_type">
							<?php
								$sel = ( 'horizontal' == $elegant_tabs_meta['tab_type'] ) ? 'selected' : '';
								echo '<option value="horizontal" ' . $sel . '>' . __( 'Horizontal', 'infiwebs' ) . '</option>';
								$sel = ( 'vertical' == $elegant_tabs_meta['tab_type'] ) ? 'selected' : '';
								echo '<option value="vertical" ' . $sel . '>' . __( 'Vertical', 'infiwebs' ) . '</option>';
							?>
						</select>
						<img class="help_tip" data-tip="Would you like to display tabs horizontally or vertically." src="<?php echo esc_attr( plugins_url( '/assets/images/help.png', WC_PLUGIN_FILE ) ); ?>" height="16" width="16" />
						<span class="description"><?php esc_html_e( 'Vertical type does not work with line, Trapezoid and Fillup style.', 'infiwebs' ); ?></span>
					</p>
					<p class="form-field">
						<label for="mobile_tab"><?php esc_html_e( 'Tabs to Dropdown on Mobile:', 'infiwebs' ); ?></label></th>
						<td>
							<select name="mobile_tab" id="mobile_tab">
								<?php
								foreach ( $mobile_tab_designs as $label => $value ) {
									$sel = $value === $elegant_tabs_meta['mobile_tab'] ? 'selected' : '';
									echo '<option value="' . esc_attr( $value ) . '" ' . esc_attr( $sel ) . '>' . esc_attr( $label ) . '</option>';
								}
								?>
							</select>
					</p>
					<p class="form-field">
						<label for="justified_tabs"><?php esc_html_e( 'Justified Tabs:', 'infiwebs' ); ?></label></th>
						<td>
							<?php
							$sel = ( $elegant_tabs_meta['justified_tabs'] ) ? 'checked' : '';
							?>
							<input type="checkbox" id="justified_tabs" name="justified_tabs" <?php echo esc_attr( $sel ); ?> value="yes" class="iw-checkbox" />
							<?php esc_html_e( 'Enable Tabs to be spread with equal width as justified.', 'infiwebs' ); ?>
					</p>
				</div>
				<div class="options_group">
					<p class="toolbar" style=" margin-top: 0; ">
						<?php
						$yikes_product_tabs_support = ( class_exists( 'YikesWooCommerceCustomProductTabs' ) ) ? '<br/>You are using custom product tabs plugin. Please update the product and re-visit this section to see custom tabs.' : '';
						?>
						<strong><?php esc_html_e( 'Choose different icons for each of the tabs on this product page.', 'woocommerce' ); ?></strong>
						<strong><?php echo $yikes_product_tabs_support; ?>
					</p>
					<?php
					$html = '';
					foreach ( $tabs as $key => $tab ) :
						$icon  = isset( $elegant_tabs_meta[ 'tab-key-' . $key ] ) ? $elegant_tabs_meta[ 'tab-key-' . $key ] : elegant_tabs()->get_option( 'tab-key-' . $key );
						$html .= '<p class="form-field">';
						$html .= '<label for="tab-key-' . $key . '">';
						$html .= esc_attr( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) );
						$html .= '</label>';
						$html .= '<input type="text" id="tab-key-' . $key . '" class="infi-icon-picker" name="tab-key-' . $key . '" value="' . esc_attr( $icon ) . '" />';
						$html .= '</p>';
					endforeach;
					echo $html;
					?>
			</div>
				<div class="options_group">
					<p class="form-field">
						<label for="color_tab_txt"><?php esc_html_e( 'Tab Text Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_tab_txt" name="color_tab_txt" value="<?php echo esc_attr( $elegant_tabs_meta['color_tab_txt'] ); ?>" class="iw-color-field" />
					</p>
					<p class="form-field">
						<label for="color_tab_bg"><?php esc_html_e( 'Tab Background / Border Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_tab_bg" name="color_tab_bg" value="<?php echo esc_attr( $elegant_tabs_meta['color_tab_bg'] ); ?>" class="iw-color-field" />
					</p>
					<p class="form-field">
						<label for="color_act_txt"><?php esc_html_e( 'Active Tab Text Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_act_txt" name="color_act_txt" value="<?php echo esc_attr( $elegant_tabs_meta['color_act_txt'] ); ?>" class="iw-color-field" />
					</p>
					<p class="form-field">
						<label for="color_act_bg"><?php esc_html_e( 'Active Tab Background / Border Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_act_bg" name="color_act_bg" value="<?php echo esc_attr( $elegant_tabs_meta['color_act_bg'] ); ?>" class="iw-color-field" />
					</p>
					<p class="form-field">
						<label for="color_content_bg"><?php esc_html_e( 'Tab Content Background Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_content_bg" name="color_content_bg" value="<?php echo esc_attr( $elegant_tabs_meta['color_content_bg'] ); ?>" class="iw-color-field" />
					</p>
					<p class="form-field">
						<label for="color_content_txt"><?php esc_html_e( 'Tab Content Text Color:', 'infiwebs' ); ?></label>
						<input type="text" id="color_content_txt" name="color_content_txt" value="<?php echo esc_attr( $elegant_tabs_meta['color_content_txt'] ); ?>" class="iw-color-field" />
					</p>
				</div>
		</div>
			<?php
		}
		/**
		 * Update tabs meta values.
		 */
		function woo_tabs_meta_update() {
			global $post;

			$tabs = array(
				'description'            => array(
			'title'    => 'Description',
			'priority' => 0,
			),
				'reviews'                => array(
			'title'    => 'Reviews',
			'priority' => 1,
			),
				'additional_information' => array(
			'title'    => 'Additional Information',
			'priority' => 2,
			),
			);
			$tabs = apply_filters( 'woocommerce_product_tabs', $tabs, true );

			// @codingStandardsIgnoreLine
			$data = ( ! empty( $_POST ) ) ? $_POST : '';
			$elegant_woo_tabs = array();
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return $post->ID;
			}
			if ( isset( $data['tab_style'] ) ) {
				$elegant_woo_tabs['tab_style'] = $data['tab_style'];
			}
			if ( isset( $data['tab_type'] ) ) {
				$elegant_woo_tabs['tab_type'] = $data['tab_type'];
			}
			if ( isset( $data['mobile_tab'] ) ) {
				$elegant_woo_tabs['mobile_tab'] = $data['mobile_tab'];
			}
			if ( isset( $data['justified_tabs'] ) ) {
				$elegant_woo_tabs['justified_tabs'] = $data['justified_tabs'];
			}
			if ( isset( $data['tab_animation'] ) ) {
				$elegant_woo_tabs['tab_animation'] = $data['tab_animation'];
			}
			if ( isset( $data['color_tab_txt'] ) ) {
				$elegant_woo_tabs['color_tab_txt'] = $data['color_tab_txt'];
			}
			if ( isset( $data['color_tab_bg'] ) ) {
				$elegant_woo_tabs['color_tab_bg'] = $data['color_tab_bg'];
			}
			if ( isset( $data['color_act_txt'] ) ) {
				$elegant_woo_tabs['color_act_txt'] = $data['color_act_txt'];
			}
			if ( isset( $data['color_act_bg'] ) ) {
				$elegant_woo_tabs['color_act_bg'] = $data['color_act_bg'];
			}
			if ( isset( $data['color_content_bg'] ) ) {
				$elegant_woo_tabs['color_content_bg'] = $data['color_content_bg'];
			}
			if ( isset( $data['color_content_txt'] ) ) {
				$elegant_woo_tabs['color_content_txt'] = $data['color_content_txt'];
			}

			foreach ( $tabs as $key => $tab ) :
				$elegant_woo_tabs[ 'tab-key-' . $key ] = $data[ 'tab-key-' . $key ];
			endforeach;

			update_post_meta( $post->ID, 'elegant_woo_tabs_meta', $elegant_woo_tabs );
		}

		/**
		 * This creates the tab in the products section in the admin panel
		 */
		function create_admin_tab() {
			echo '<style type="text/css">#woocommerce-product-data ul.wc-tabs li.infi_elegant_tab a:before { content: "" !important; }</style>';
			echo '<li class="infi_elegant_tab"><a href="#infi_elegant_tabs"><span>' . __( 'Elegant Tabs', 'woocommerce' ) . '</span></a></li>';
		}

		/**
		 * Load plugin css and javascript files which you may need on backend of your site.
		 */
		public function print_css_js() {
			global $post;
			$screen     = get_current_screen();
			$admin_page = isset( $post->post_type ) ? $post->post_type : '';

			if ( 'product' == $admin_page || 'appearance_page_avada_options' == $screen->id ) {
				wp_enqueue_style( 'infi-icon-icomoon', plugins_url( 'css/icon-picker/icomoon.css', __FILE__ ) );
				wp_enqueue_style( 'infi-icon-fonticonpicker', plugins_url( 'css/icon-picker/jquery.fonticonpicker.min.css', __FILE__ ) );
				wp_enqueue_style( 'infi-icon-fonticonpicker-bootstrap', plugins_url( 'css/icon-picker/jquery.fonticonpicker.bootstrap.min.css', __FILE__ ) );
				wp_enqueue_script( 'infi-icon-picker', plugins_url( 'js/icon-picker/jquery.fonticonpicker.min.js', __FILE__ ), array( 'jquery' ), '', true );
				wp_enqueue_script( 'iw_meta_script', plugins_url( 'js/meta-tabs.js', __FILE__ ), array( 'jquery', 'wp-color-picker', 'infi-icon-picker' ), '', true );
			}
		}
	}
	// Finally initialize code.
	new ElegantWooTabs();
}
