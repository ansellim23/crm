<?php
/**
 * Plugin Name: Elegant Tabs for Fusion Builder
 * Plugin URI: https://www.infiwebs.com/elegant-tabs-fb/
 * Description: #1 Selling Tabs Add-on for Fusion Builder. Make your tabs look more beautiful with the number of designs available.
 * Version: 2.6.1
 * Author: InfiWebs
 * Author URI: http://www.infiwebs.com
 */

// Plugin Folder Path.
if ( ! defined( 'ELEGANT_TABS_PLUGIN_DIR' ) ) {
	define( 'ELEGANT_TABS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Version.
if ( ! defined( 'ELEGANT_TABS_FB_VERSION' ) ) {
	define( 'ELEGANT_TABS_FB_VERSION', '2.6.1' );
}

register_activation_hook( __FILE__, array( 'ElegantTabsFB', 'activation' ) );

if ( ! class_exists( 'ElegantTabsFB' ) ) {

	/**
	 *  Main ElegantTabsFB Class.
	 *
	 * @since 1.0
	 */
	class ElegantTabsFB {

		/**
		 * The one, true instance of this object.
		 *
		 * @static
		 * @access private
		 * @since 1.0
		 * @var object
		 */
		private static $instance;

		/**
		 * Creates or returns an instance of this class.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 */
		public static function get_instance() {

			// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
			if ( null === self::$instance ) {
				self::$instance = new ElegantTabsFB();
			}
			return self::$instance;
		}

		/**
		 * The constructor.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'et_tabs_front' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'et_custom_css' ) );

			// Add front-end templates.
			if ( function_exists( 'fusion_is_builder_frame' ) && fusion_is_builder_frame() ) {
				add_action( 'fusion_builder_before_init', array( $this, 'frontend_load_templates' ) );
				add_action( 'wp_enqueue_scripts', array( $this, 'live_scripts' ), 1001 );
			}
		}

		/**
		 * Enqueue styling for info field.
		 *
		 * @since 1.0
		 */
		public function et_custom_css() {
			?>
			<style type="text/css">
				li.fusion-builder-option.info {
					background: #fbfbfb;
					margin-top: -15px;
				}
				li.fusion-builder-option.info .option-field {
					display: none;
				}
				li.fusion-builder-option.info .option-details {
					width: 100%;
					text-align: center;
				}
			</style>
			<?php
		}

		/**
		 * Add templates required for elegant tabs on front-end.
		 *
		 * @since 2.6
		 * @access public
		 * @return void
		 */
		public function frontend_load_templates() {
			include ELEGANT_TABS_PLUGIN_DIR . '/front-end/elegant-tabs.php';
		}

		/**
		 * Add js view templates required for elegant tabs on front-end.
		 *
		 * @since 1.4
		 * @access public
		 * @return void
		 */
		public function live_scripts() {
			wp_enqueue_script( 'elegant_tabs_view', plugins_url( 'front-end/elegant-tabs.js', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION, true );
			wp_enqueue_script( 'elegant_tab_view', plugins_url( 'front-end/elegant-tab.js', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION, true );
		}

		/**
		 * Enqueue scripts on frontend.
		 *
		 * @since 1.0
		 */
		public function et_tabs_front() {
			wp_register_style( 'iw_tab_style', plugins_url( 'css/tabstyles.css', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION );
			wp_register_style( 'iw_tab_aminate', plugins_url( 'css/animate.min.css', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION );
			wp_register_style( 'iw_tabs', plugins_url( 'css/tabs.css', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION );
			wp_register_style( 'infi-icon-icomoon', plugins_url( 'css/icon-picker/icomoon.css', __FILE__ ), array(), ELEGANT_TABS_FB_VERSION );

			wp_enqueue_style( 'iw_tab_style' );
			wp_enqueue_style( 'iw_tab_aminate' );
			wp_enqueue_style( 'iw_tabs' );

			if ( class_exists( 'WooCommerce' ) ) {
				wp_enqueue_style( 'infi-icon-icomoon' );
			}

			wp_enqueue_script( 'iw_tabs', plugins_url( 'js/eTabs.js', __FILE__ ), array( 'jquery' ), ELEGANT_TABS_FB_VERSION, true );
		}

		/**
		 * Render function for single tab shortcode.
		 *
		 * @since 1.0
		 * @param array  $atts Attributes array.
		 * @param string $content Content inside shortcode tags.
		 */
		public static function render_child_tab( $atts, $content = null ) {
			global $shortcode_tabs;
			$atts['content'] = trim( do_shortcode( $content ) );
			if ( ! isset( $atts['tab_id'] ) || '' === $atts['tab_id'] ) {
				$atts['tab_id'] = time() + wp_rand( 4, 100 );
			}
			if ( ! isset( $atts['icon_type'] ) ) {
				$atts['icon_type'] = 'icon';
			}
			$shortcode_tabs[] = $atts;
		}

		/**
		 * Render function for tabs shortcode.
		 *
		 * @since 1.0
		 * @param array  $atts Attributes array.
		 * @param string $content Content inside shortcode tags.
		 */
		public static function render_parent_tab( $atts, $content ) {
			$tab_style         = '';
			$tab_type          = '';
			$justified_tabs    = '';
			$active_tab_index  = '';
			$custom_hovers     = '';
			$color_act_txt     = '';
			$color_act_bg      = '';
			$el_class          = '';
			$style             = '';
			$color_content_bg  = '';
			$color_content_txt = '';
			$tab_animation     = '';
			$tab_align         = '';
			$title_font_size   = '';
			$tab_to_mobile     = '';
			$auto_switch       = '';
			$switch_interval   = '';
			$title_wrap        = '';

			extract( // @codingStandardsIgnoreLine
				shortcode_atts(
					array(
						'tab_style'         => 'bars',
						'tab_type'          => 'horizontal',
						'tab_align'         => 'left',
						'justified_tabs'    => 'no',
						'custom_hovers'     => 'no',
						'color_tab_txt'     => elegant_tabs()->get_option( 'color_tab_txt', '#2a90da' ),
						'color_tab_bg'      => elegant_tabs()->get_option( 'color_tab_bg', '#eff4ff' ),
						'color_act_txt'     => elegant_tabs()->get_option( 'color_act_txt', '#ffffff' ),
						'color_act_bg'      => elegant_tabs()->get_option( 'color_act_bg', '#2a90da' ),
						'color_hover_txt'   => elegant_tabs()->get_option( 'color_hover_txt', '#ffffff' ),
						'color_hover_bg'    => elegant_tabs()->get_option( 'color_hover_bg', '#2a90da' ),
						'color_content_bg'  => elegant_tabs()->get_option( 'color_content_bg', 'rgb(254, 254, 254)' ),
						'color_content_txt' => '',
						'tab_animation'     => '',
						'title_font_size'   => elegant_tabs()->get_option( 'tab_title_font', 16 ),
						'el_class'          => '',
						'tab_to_mobile'     => 'no',
						'active_tab_index'  => 0,
						'auto_switch'       => 'no',
						'title_wrap'        => 'truncate',
						'switch_interval'   => 5,
					), $atts
				)
			);

			global $shortcode_tabs;

			$shortcode_tabs = array(); // clear the array.

			do_shortcode( $content ); // execute the '[fusion_et_tab]' shortcode first to get the title and content.

			$tabs_content = '';
			$anchor_style = '';

			$tabs_count = count( $shortcode_tabs );

			$i = 0;
			$n = 0;

			$title_font_size = str_replace( 'px', '', $title_font_size );

			if ( 'line' !== $tab_style && '' !== $color_tab_bg ) {
				$style .= 'background:' . $color_tab_bg . ';';
			}
			if ( '' !== $color_tab_txt ) {
				$style .= 'color:' . $color_tab_txt . ';';
			}
			if ( '' !== $color_tab_txt ) {
				$anchor_style = 'color:' . $color_tab_txt . ';';
			}

			if ( '' !== $title_font_size ) {
				$anchor_style .= 'font-size:' . $title_font_size . 'px;';
			}

			if ( ! in_array( $tab_style, array( 'bars', 'iconbox', 'underline', 'topline', 'iconfall', 'linebox', 'flip' ), true ) ) {
				$tab_type = 'horizontal';
			}

			$tabs_nav      = '<ul class="elegant-tabs-list-container tab-title-' . $title_wrap . '" style="color:' . $color_tab_txt . '">';
			$dropdown_tabs = '<select class="et-mobile-tabs">';

			if ( '-1' == $active_tab_index ) {
				$mobile_dropdown_title = apply_filters( 'elegant_tabs_dropdown_title', __( 'Choose Tab', 'elegat-tabs' ) );
				$dropdown_tabs        .= '<option value="#" disabled selected>' . $mobile_dropdown_title . '</option>';
			}

			foreach ( $shortcode_tabs as $tab ) {
				$i ++;
				$custom_colors_attr  = ( isset( $tab['color_tab_txt'] ) && '' !== $tab['color_tab_txt'] && $color_tab_txt !== $tab['color_tab_txt'] ) ? ' data-tab-text-color="' . $tab['color_tab_txt'] . '"' : '';
				$custom_colors_attr .= ( isset( $tab['color_tab_bg'] ) && '' !== $tab['color_tab_bg'] && $color_tab_bg !== $tab['color_tab_bg'] ) ? ' data-tab-bg-color="' . $tab['color_tab_bg'] . '"' : '';

				$tab_icon   = '';
				$has_icon   = '';
				$data_hover = '';

				if ( 'icon' === $tab['icon_type'] && '' !== $tab['icon'] ) {
					$icon_size  = ( isset( $atts['icon_font_size'] ) && '' !== $atts['icon_font_size'] ) ? 'font-size:' . $atts['icon_font_size'] . 'px; line-height: 1.5em;' : '';
					$icon_class = ( function_exists( 'fusion_font_awesome_name_handler' ) ) ? fusion_font_awesome_name_handler( $tab['icon'] ) : FusionBuilder::font_awesome_name_handler( $tab['icon'] );
					$tab_icon   = '<i class="iw-icons ' . $icon_class . '" style="color:' . $color_tab_txt . '; ' . $icon_size . '"></i>';
					$has_icon   = 'has-icon';
				} elseif ( 'icon' !== $tab['icon_type'] && isset( $tab['icon_img'] ) && '' !== $tab['icon_img'] ) {
					$image_icon_attr = '';
					if ( '' !== $tab['icon_img_hover'] ) {
						$image_icon_attr .= ' data-hover-src="' . $tab['icon_img_hover'] . '"';
						$image_icon_attr .= ' data-original-src=" ' . $tab['icon_img'] . '" ';
					}
					$img_icon = $tab['icon_img'];
					$img_css  = 'width: ' . $tab['icon_img_width'] . ';';
					$img_css .= 'height: ' . $tab['icon_img_height'];
					$tab_icon = '<img class="elegant-tabs-image-icon" src="' . $img_icon . '"' . $image_icon_attr . ' style="' . $img_css . '" />';
					$has_icon = 'has-icon';
				} else {
					$has_icon = 'no-icon';
				}

				$tabs_nav .= '<li style="' . $style . '"' . $custom_colors_attr . '>';
				$tabs_nav .= '<a class="et-anchor-tag" style="' . $anchor_style . '" href="javascript:void(0)" data-href="#section-' . $tab['tab_id'] . '">';
				$tabs_nav .= $tab_icon;
				$tabs_nav .= '<span class="' . $has_icon . '">' . $tab['title'] . '</span></a></li>';

				if ( isset( $custom_hovers ) && 'yes' == $custom_hovers ) {
					$data_hover .= ' data-hover-bg="' . $color_hover_bg . '"';
					$data_hover .= ' data-hover-text="' . $color_hover_txt . '" ';
				}

				if ( 'accordion' === $tab_to_mobile ) :
					ob_start();
					$active_class = '';
					if ( 1 == $n ) {
						$active_class = ' infi-active-tab';
						$n++;
					}
					?>
					<div class="infi-responsive-tabs"
					data-tab_style="<?php echo esc_attr( $tab_style ); ?>"
					data-active-bg="<?php echo esc_attr( $color_act_bg ); ?>"
					data-active-text="<?php echo esc_attr( $color_act_txt ); ?>"
					<?php echo $data_hover; // @codingStandardsIgnoreLine ?>>
						<div class="infi-tab-accordion<?php echo esc_attr( $active_class ); ?>">
								<div class="<?php echo esc_attr( $tab['tab_id'] ); ?>_tab infi_accordion_item" style="<?php echo esc_attr( $style ); ?>">
									<div class="infi-accordion-item-heading" data-href="#section-<?php echo esc_attr( $tab['tab_id'] ); ?>" style="color:<?php echo esc_attr( $color_tab_txt ); ?>;">
										<?php
										if ( '' !== $tab['icon'] ) {
											echo $tab_icon; // @codingStandardsIgnoreLine
										}
										?>
										<?php echo '<span class="' . $has_icon . '">' . $tab['title'] . '</span>'; // @codingStandardsIgnoreLine ?>
									</div>
								</div>
							</div>
					</div>
					<?php
					$tabs_content .= ob_get_clean();
				else :
					$dropdown_tabs .= '<option value="#section-' . $tab['tab_id'] . '">' . $tab['title'] . '</option>';
				endif;

				$tabs_content .= '<section id="section-' . $tab['tab_id'] . '" class="tab" data-animation="' . $tab_animation . '">';
				$tabs_content .= '<div class="infi-content-wrapper">';
				$tabs_content .= $tab['content'];
				$tabs_content .= '</div></section>';

			}

			$dropdown_tabs .= '</select>';
			$tabs_nav      .= '</ul>';

			$shortcode_tabs = array();

			if ( 'accordion' !== $tab_to_mobile ) {
				$tabs_nav = $tabs_nav . $dropdown_tabs;
			}

			$rand          = wp_rand();
			$mobile_class  = ( 'select' === $tab_to_mobile ) ? 'et-mobile-enabled ' : '';
			$justified     = ( 'yes' === $justified_tabs && 'horizontal' === $tab_type ) ? ' justified-tabs' : '';
			$tab_nav_width = ''; // ( '' === $justified && 'vertical' !== $tab_type ) ? 'style=" width: calc( 200px * ' . $tabs_count . ' );"' : '';

			$content = '<section class="elegant-tabs-container">
					<div class="' . trim( 'et-tabs et-' . $tab_type . $justified . ' ' . $mobile_class . 'et-tabs-style-' . $tab_style . ' tab-class-' . $rand . ' et-align-' . $tab_align . ' ' . $el_class ) . '"
										data-tab_style="' . $tab_style . '"
										data-active-bg="' . $color_act_bg . '"
										data-active-text="' . $color_act_txt . '"
										data-active-tab-index="' . $active_tab_index . '"
										data-auto-switch-tab="' . esc_attr( $auto_switch ) . '"
										data-switch-interval="' . esc_attr( $switch_interval ) . '"
										' . $data_hover . '>
						<nav ' . $tab_nav_width . '>
							' . $tabs_nav . '
						</nav>
						<div class="et-content-wrap" style="background:' . $color_content_bg . '; color:' . $color_content_txt . ';">
								' . $tabs_content . '
						</div> <!-- /et-content-wrap -->
					</div> <!-- /et-tabs -->
				 </section>';

			return $content;
		}

		/**
		 * Add tab settings to Theme options or element options.
		 *
		 * @since 1.0
		 * @param array $sections Options panel sections array.
		 * @return array $sections Options panel sections array with elegant tabs options.
		 */
		public static function add_tabs_options( $sections = array() ) {
			global $fusion_builder_elements;
			$fusion_builder_elements['fusion_et_tabs'] = 'Elegant Tabs';
			$option_name                               = 'fusion_builder_options';
			$sections['shortcode_styling']['fields']['elegant_tabs'] = array(
				'label'       => esc_html__( 'Elegant Tabs', 'infiwebs' ),
				'description' => '',
				'id'          => 'shortcode_elegant_tabs',
				'default'     => '',
				'type'        => 'sub-section',
				'fields'      => array(
					'elegant_tabs_important_note_info' => array(
						'label'       => '',
						'description' => '<div class="avada-avadaredux-important-notice">' . __( '<strong>IMPORTANT NOTE:</strong> The styling options for the elegant tabs are used for only new tabs. Existing tabs need to change the settings from where they are added.', 'infiwebs' ) . '</div>',
						'id'          => 'elegant_tabs_important_note_info',
						'type'        => 'custom',
						'option_name' => $option_name,
					),
					'tab_style'                        => array(
						'label'       => esc_html__( 'Tab Style', 'infiwebs' ),
						'description' => esc_html__( 'Select which tab style would you like to set as default.', 'infiwebs' ),
						'id'          => 'tab_style',
						'default'     => 'bars',
						'choices'     => array(
							'bars'      => esc_html__( 'Bar Style' ),
							'iconbox'   => esc_html__( 'Icon Box Style' ),
							'underline' => esc_html__( 'Underline Style' ),
							'topline'   => esc_html__( 'Top Line Style' ),
							'iconfall'  => esc_html__( 'Falling Icon Style' ),
							'line'      => esc_html__( 'Line Style' ),
							'linebox'   => esc_html__( 'Line Box Style' ),
							'flip'      => esc_html__( 'Flip Style' ),
							'tzoid'     => esc_html__( 'Trapezoid Style' ),
							'fillup'    => esc_html__( 'Fillup Style' ),
						),
						'type'        => 'select',
						'option_name' => $option_name,
					),
					'tab_animation'                    => array(
						'label'       => esc_html__( 'Tab Content Animation', 'infiwebs' ),
						'description' => esc_html__( 'Animation is applied to tab content on switching tabs.', 'infiwebs' ),
						'id'          => 'tab_animation',
						'default'     => 'fadeIn',
						'choices'     => array(
							'none'           => esc_html__( 'No Animation', 'infiwebs' ),
							'swing'          => esc_html__( 'Swing', 'infiwebs' ),
							'pulse'          => esc_html__( 'Pulse', 'infiwebs' ),
							'flash'          => esc_html__( 'Flash', 'infiwebs' ),
							'fadeIn'         => esc_html__( 'Fade In', 'infiwebs' ),
							'fadeInUp'       => esc_html__( 'Fade In Up', 'infiwebs' ),
							'fadeInDown'     => esc_html__( 'Fade In Down', 'infiwebs' ),
							'fadeInLeft'     => esc_html__( 'Fade In Left', 'infiwebs' ),
							'fadeInRight'    => esc_html__( 'Fade In Right', 'infiwebs' ),
							'fadeInUpBig'    => esc_html__( 'Fade In Up Long', 'infiwebs' ),
							'fadeInDownBig'  => esc_html__( 'Fade In Down Long', 'infiwebs' ),
							'fadeInLeftBig'  => esc_html__( 'Fade In Left Long', 'infiwebs' ),
							'fadeInRightBig' => esc_html__( 'Fade In Right Long', 'infiwebs' ),
							'slideInDown'    => esc_html__( 'Slide In Down', 'infiwebs' ),
							'slideInUp'      => esc_html__( 'Slide In Up', 'infiwebs' ),
							'slideInLeft'    => esc_html__( 'Slide In Left', 'infiwebs' ),
							'bounceIn'       => esc_html__( 'Bounce In', 'infiwebs' ),
							'bounceInUp'     => esc_html__( 'Bounce In Up', 'infiwebs' ),
							'bounceInDown'   => esc_html__( 'Bounce In Down', 'infiwebs' ),
							'bounceInLeft'   => esc_html__( 'Bounce In Left', 'infiwebs' ),
							'bounceInRight'  => esc_html__( 'Bounce In Right', 'infiwebs' ),
							'rotateIn'       => esc_html__( 'Rotate In', 'infiwebs' ),
							'lightSpeedIn'   => esc_html__( 'Light Speed In', 'infiwebs' ),
							'rollIn'         => esc_html__( 'Roll In', 'infiwebs' ),
						),
						'type'        => 'select',
						'option_name' => $option_name,
					),
					'tab_type'                         => array(
						'label'       => esc_html__( 'Tab Type', 'infiwebs' ),
						'description' => esc_html__( 'Select the type of tab to be displayed.', 'infiwebs' ),
						'id'          => 'tab_type',
						'default'     => 'horizontal',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'horizontal' => esc_html__( 'Horizontal', 'infiwebs' ),
							'vertical'   => esc_html__( 'Vertical', 'infiwebs' ),
						),
						'option_name' => $option_name,
					),
					'justified_tabs'                   => array(
						'label'       => esc_html__( 'Justified Tabs', 'infiwebs' ),
						'description' => esc_html__( 'Choose to get tabs stretched over full element width.', 'infiwebs' ),
						'id'          => 'justified_tabs',
						'default'     => 'no',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'yes' => esc_html__( 'Yes', 'infiwebs' ),
							'no'  => esc_html__( 'No', 'infiwebs' ),
						),
						'option_name' => $option_name,
					),
					'mobile_tab'                       => array(
						'label'       => esc_html__( 'Tabs on mobile', 'infiwebs' ),
						'description' => esc_html__( 'Select how tabs should behave on mobile devices.', 'infiwebs' ),
						'id'          => 'mobile_tab',
						'default'     => 'accordion',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'select'    => esc_html__( 'Select Box', 'infiwebs' ),
							'accordion' => esc_html__( 'Accordion', 'infiwebs' ),
						),
						'option_name' => $option_name,
					),
					'tab_title_font'                   => array(
						'label'       => esc_html__( 'Tab Title Font Size', 'infiwebs' ),
						'description' => esc_html__( 'Select the font size for tab title and icon.', 'infiwebs' ),
						'id'          => 'tab_title_font',
						'default'     => '16',
						'type'        => 'slider',
						'choices'     => array(
							'min'  => '10',
							'max'  => '72',
							'step' => '1',
						),
						'option_name' => $option_name,
						'class'       => 'test',
					),
					'color_tab_txt'                    => array(
						'label'       => esc_html__( 'Inactive Tab Title Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of inactive tab title.', 'infiwebs' ),
						'id'          => 'color_tab_txt',
						'default'     => '#2a90da',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_tab_bg'                     => array(
						'label'       => esc_html__( 'Inactive Tab Background / Border Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of inactive tab title background or border.', 'infiwebs' ),
						'id'          => 'color_tab_bg',
						'default'     => '#eff4ff',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_act_txt'                    => array(
						'label'       => esc_html__( 'Active Tab Title Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of active tab title.', 'infiwebs' ),
						'id'          => 'color_act_txt',
						'default'     => '#ffffff',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_act_bg'                     => array(
						'label'       => esc_html__( 'Active Tab Background / Border Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of active tab title background or border.', 'infiwebs' ),
						'id'          => 'color_act_bg',
						'default'     => '#2a90da',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_content_bg'                 => array(
						'label'       => esc_html__( 'Tab Content Background Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of tab content background.', 'infiwebs' ),
						'id'          => 'color_content_bg',
						'default'     => 'rgb(254, 254, 254)',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_hover_txt'                  => array(
						'label'       => esc_html__( 'Tab Hover Text Color', 'infiwebs' ),
						'description' => esc_html__( 'The font color of the active Tab in this set.', 'infiwebs' ),
						'id'          => 'color_hover_txt',
						'default'     => '#ffffff',
						'type'        => 'color-alpha',
						'option_name' => $option_name,
					),
					'color_hover_bg'                   => array(
						'label'       => esc_html__( 'Tab Hover Background Color', 'infiwebs' ),
						'description' => esc_html__( 'The background color of the active Tab in this set.', 'infiwebs' ),
						'id'          => 'color_hover_bg',
						'type'        => 'color-alpha',
						'default'     => '#2a90da',
						'option_name' => $option_name,
					),
				),
			);

			return $sections;
		}

		/**
		 * Add woocommerce tab icon settings to Theme options or element options.
		 *
		 * @since 1.0
		 * @param array $sections Options panel sections array.
		 * @return array $sections Options panel sections array with elegant tabs options.
		 */
		public static function elegant_woo_tab_icons( $sections ) {
			$option_name = 'fusion_builder_options';

			if ( class_exists( 'WooCommerce' ) ) {

				$sections['shortcode_styling']['fields']['elegant_tabs']['fields']['elegant_tabs_icons'] = array(
					'label'       => '',
					'description' => '<div class="avada-avadaredux-important-notice">' . __( '<strong>IMPORTANT NOTE:</strong> The icons selected for each tab here will be used as default for WooCommerce tabs. You can change the icon for each tab from Individual product edit screen.', 'infiwebs' ) . '</div>',
					'id'          => 'elegant_tabs_icon_note_info',
					'type'        => 'custom',
					'option_name' => $option_name,
				);

				$tabs      = array(
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
				$tabs      = apply_filters( 'woocommerce_product_tabs', $tabs, true );
				$icon_tabs = array();

				foreach ( $tabs as $key => $tab ) :
					$sections['shortcode_styling']['fields']['elegant_tabs']['fields'][ 'tab-key-' . $key ] = array(
						'label'       => $tab['title'],
						'description' => __( 'Choose icon for - ', 'infiwebs' ) . $tab['title'],
						'id'          => 'tab-key-' . $key,
						'type'        => 'text',
						'class'       => 'infi-icon-picker',
						'option_name' => $option_name,
					);
				endforeach;

			}

			return $sections;
		}

		/**
		 * Processes that must run when the plugin is activated.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 */
		public static function activation() {
			if ( ! class_exists( 'FusionBuilder' ) ) {
				$message  = '<style>#error-page > p{display:-webkit-flex;display:flex;}#error-page img {height: 120px;margin-right:25px;}.fb-heading{font-size: 1.17em; font-weight: bold; display: block; margin-bottom: 15px;}.fb-link{display: inline-block;margin-top:15px;}.fb-link:focus{outline:none;box-shadow:none;}</style>';
				$message .= '<span><span class="fb-heading">Elegant Tabs for Fusion Builder could not be activated</span>';
				$message .= '<span>Elegant Tabs for Fusion Builder can only be activated if Fusion Builder 1.0 or higher is activated. Click the link below to install/activate Fusion Builder, then you can activate this plugin.</span>';
				$message .= '<a class="fb-link" href="' . admin_url( 'admin.php?page=avada-plugins' ) . '">' . esc_attr__( 'Go to the Avada plugin installation page', 'Avada' ) . '</a></span>';
				wp_die( $message ); // @codingStandardsIgnoreLine
			}
		}

		/**
		 * Get theme option depends on Fusion Builder version.
		 *
		 * @param string $option Option name to retrive settings.
		 * @param string $default Default option value.
		 * @return string|array|bool
		 */
		public function get_option( $option, $default = '' ) {
			global $fusion_settings;
			if ( defined( 'FUSION_BUILDER_VERSION' ) && FUSION_BUILDER_VERSION >= '1.1' ) {
				return ( '' !== $fusion_settings->get( $option ) ) ? $fusion_settings->get( $option ) : $default;
			} else {
				return FusionBuilder::get_theme_option( $option );
			}
		}
	}
}

/**
 * Get instance of ElegantTabsFB class.
 */
function elegant_tabs() {
	return ElegantTabsFB::get_instance();
}

/**
 * Instantiate ElegantTabsFB class.
 */
function elegant_tabs_activate() {
	ElegantTabsFB::get_instance();

	// Register shortcodes for elegant tabs.
	add_shortcode( 'fusion_et_tabs', array( 'ElegantTabsFB', 'render_parent_tab' ) );
	add_shortcode( 'fusion_et_tab', array( 'ElegantTabsFB', 'render_child_tab' ) );

	if ( class_exists( 'WooCommerce' ) ) {

		// If WooCommerce is active enable tabs for woocommerce products.
		require_once ELEGANT_TABS_PLUGIN_DIR . '/elegant-tabs-for-woo.php';

	}
}
add_action( 'wp_loaded', 'elegant_tabs_activate', 10 );
add_action( 'fusion_builder_shortcodes_init', 'elegant_tabs_init_options', 99 );
add_action( 'after_setup_theme', 'elegant_tabs_add_theme_options' );

/**
 * Add options to Avada Options if version is less than 5.1.
 *
 * @access public
 * @since 2.2
 */
function elegant_tabs_add_theme_options() {
	if ( class_exists( 'Avada' ) ) {
		$avada_version = Avada::$version;
		if ( version_compare( $avada_version, '5.1', '<' ) ) {
			// Add options to Avada.
			add_filter( 'avada_options_sections', array( 'ElegantTabsFB', 'add_tabs_options' ), 55 );
			add_filter( 'avada_options_sections', array( 'ElegantTabsFB', 'elegant_woo_tab_icons' ), 55 );
		}
	}
}

/**
 * Include options from options folder.
 *
 * @access public
 * @since 2.2
 * @return void
 */
function elegant_tabs_init_options() {
	global $pagenow;
	if ( is_admin() && 'themes.php' == $pagenow ) {
		require_once 'options/element-options.php';
	}
}

/**
 * Integrate elegant tabs with FB mapper.
 *
 * @since 1.0
 */
function integrate_with_fusion_builder() {
	global $fusion_settings;

	$tab_styles        = array(
		'Bar Style'          => 'bars',
		'Icon Box Style'     => 'iconbox',
		'Underline Style'    => 'underline',
		'Top Line Style'     => 'topline',
		'Falling Icon Style' => 'iconfall',
		'Line Style'         => 'line',
		'Line Box Style'     => 'linebox',
		'Flip Style'         => 'flip',
		'Trapezoid Style'    => 'tzoid',
		'Fillup Style'       => 'fillup',
	);
	$tab_types         = array(
		__( 'Hotizontal Tabs', 'infiwebs' ) => 'horizontal',
		__( 'Vertical Tabs', 'infiwebs' )   => 'vertical',
	);
	$mobile_options    = array(
		__( 'Select Box', 'infiwebs' ) => 'select',
		__( 'Accordion', 'infiwebs' )  => 'accordion',
	);
	$yes_no_options    = array(
		__( 'Yes', 'infiwebs' ) => 'yes',
		__( 'No', 'infiwebs' )  => 'no',
	);
	$tab_alignments    = array(
		__( 'Left Aligned Tabs', 'infiwebs' )  => 'left',
		__( 'Right Aligned Tabs', 'infiwebs' ) => 'right',
		__( 'Centered Tabs', 'infiwebs' )      => 'center',
	);
	$animation_options = array(
		__( 'No Animation', 'infiwebs' )       => '',
		__( 'Swing', 'infiwebs' )              => 'swing',
		__( 'Pulse', 'infiwebs' )              => 'pulse',
		__( 'Flash', 'infiwebs' )              => 'flash',
		__( 'Fade In', 'infiwebs' )            => 'fadeIn',
		__( 'Fade In Up', 'infiwebs' )         => 'fadeInUp',
		__( 'Fade In Down', 'infiwebs' )       => 'fadeInDown',
		__( 'Fade In Left', 'infiwebs' )       => 'fadeInLeft',
		__( 'Fade In Right', 'infiwebs' )      => 'fadeInRight',
		__( 'Fade In Up Long', 'infiwebs' )    => 'fadeInUpBig',
		__( 'Fade In Down Long', 'infiwebs' )  => 'fadeInDownBig',
		__( 'Fade In Left Long', 'infiwebs' )  => 'fadeInLeftBig',
		__( 'Fade In Right Long', 'infiwebs' ) => 'fadeInRightBig',
		__( 'Slide In Down', 'infiwebs' )      => 'slideInDown',
		__( 'Slide In Up', 'infiwebs' )        => 'slideInUp',
		__( 'Slide In Left', 'infiwebs' )      => 'slideInLeft',
		__( 'Bounce In', 'infiwebs' )          => 'bounceIn',
		__( 'Bounce In Up', 'infiwebs' )       => 'bounceInUp',
		__( 'Bounce In Down', 'infiwebs' )     => 'bounceInDown',
		__( 'Bounce In Left', 'infiwebs' )     => 'bounceInLeft',
		__( 'Bounce In Right', 'infiwebs' )    => 'bounceInRight',
		__( 'Rotate In', 'infiwebs' )          => 'rotateIn',
		__( 'Light Speed In', 'infiwebs' )     => 'lightSpeedIn',
		__( 'Roll In', 'infiwebs' )            => 'rollIn',
	);
	$icon_options      = array(
		__( 'Font Icon', 'infiwebs' )  => 'icon',
		__( 'Image Icon', 'infiwebs' ) => 'img_icon',
	);

	$tab_style        = elegant_tabs()->get_option( 'tab_style', 'bars' );
	$tab_animation    = elegant_tabs()->get_option( 'tab_animation', 'none' );
	$tab_type         = elegant_tabs()->get_option( 'tab_type', 'horizontal' );
	$mobile_tab       = elegant_tabs()->get_option( 'mobile_tab', 'accordion' );
	$justified_tabs   = elegant_tabs()->get_option( 'justified_tabs', 'no' );
	$color_tab_txt    = elegant_tabs()->get_option( 'color_tab_txt', '#2a90da' );
	$color_tab_bg     = elegant_tabs()->get_option( 'color_tab_bg', '#eff4ff' );
	$color_act_txt    = elegant_tabs()->get_option( 'color_act_txt', '#ffffff' );
	$color_act_bg     = elegant_tabs()->get_option( 'color_act_bg', '#2a90da' );
	$color_content_bg = elegant_tabs()->get_option( 'color_content_bg', 'rgb(254, 254, 254)' );
	$color_hover_txt  = elegant_tabs()->get_option( 'color_hover_txt', '#ffffff' );
	$color_hover_bg   = elegant_tabs()->get_option( 'color_hover_bg', '#2a90da' );

	if ( defined( 'FUSION_BUILDER_VERSION' ) && FUSION_BUILDER_VERSION >= '1.1' ) {
		$tab_styles        = array_flip( $tab_styles );
		$tab_types         = array_flip( $tab_types );
		$mobile_options    = array_flip( $mobile_options );
		$yes_no_options    = array_flip( $yes_no_options );
		$tab_alignments    = array_flip( $tab_alignments );
		$animation_options = array_flip( $animation_options );
		$icon_options      = array_flip( $icon_options );
	}

	$parent_args = array(
		'name'          => esc_attr__( 'Elegant Tabs', 'infiwebs' ),
		'shortcode'     => 'fusion_et_tabs',
		'multi'         => 'multi_element_parent',
		'element_child' => 'fusion_et_tab',
		'child_ui'      => true,
		'icon'          => 'fusiona-folder',
		'preview'       => ELEGANT_TABS_PLUGIN_DIR . 'js/previews/elegant-tabs-preview.php',
		'preview_id'    => 'fusion-builder-block-module-elegant-tabs-preview-template',
		// 'front-end'     => ELEGANT_TABS_PLUGIN_DIR . 'front-end/elegant-tabs.php',
		'params'        => array(
			array(
				'type'        => 'tinymce',
				'heading'     => esc_attr__( 'Content', 'infiwebs' ),
				'description' => esc_attr__( 'Enter some content for this contentbox.', 'infiwebs' ),
				'param_name'  => 'element_content',
				'value'       => '[fusion_et_tab title="Tab Title 1" icon_type="icon" icon="fa-haykal fas"]Your Content Goes Here[/fusion_et_tab][fusion_et_tab title="Tab Title 2" icon_type="icon" icon="fa-star-of-life fas"]Your Content Goes Here[/fusion_et_tab]',
			),
			array(
				'type'        => 'select',
				'heading'     => __( 'Tab Style', 'infiwebs' ),
				'param_name'  => 'tab_style',
				'value'       => $tab_styles,
				'default'     => $tab_style,
				'description' => __( 'Choose the tabs layout you would like to use.', 'infiwebs' ),
			),
			array(
				'type'        => 'select',
				'class'       => '',
				'heading'     => __( 'Tab Type', 'infiwebs' ),
				'param_name'  => 'tab_type',
				'value'       => $tab_types,
				'description' => __( 'How would you like to display these tabs?', 'infiwebs' ),
				'default'     => $tab_type,
				'dependency'  => array(
					array(
						'element'  => 'tab_style',
						'value'    => 'line',
						'operator' => '!=',
					),
					array(
						'element'  => 'tab_style',
						'value'    => 'tzoid',
						'operator' => '!=',
					),
					array(
						'element'  => 'tab_style',
						'value'    => 'fillup',
						'operator' => '!=',
					),
				),
			),
			array(
				'type'        => 'radio_button_set',
				'heading'     => __( 'Tabs to Dropdown on mobile', 'infiwebs' ),
				'description' => __( 'Select how tabs should behave on mobile devices.', 'infiwebs' ),
				'param_name'  => 'tab_to_mobile',
				'default'     => $mobile_tab,
				'value'       => $mobile_options,
			),
			array(
				'type'        => 'radio_button_set',
				'heading'     => __( 'Justified Tabs', 'infiwebs' ),
				'description' => __( 'Spread the tabs with equeal width of the container. Does not work with vertial tabs.', 'infiwebs' ),
				'param_name'  => 'justified_tabs',
				'default'     => $justified_tabs,
				'value'       => $yes_no_options,
			),
			array(
				'type'        => 'select',
				'class'       => '',
				'heading'     => __( 'Tab Alignment', 'infiwebs' ),
				'param_name'  => 'tab_align',
				'value'       => $tab_alignments,
				'description' => __( 'Align your tabs.', 'infiwebs' ),
			),
			array(
				'heading'     => __( 'Icon Font Size', 'infiwebs' ),
				'description' => __( 'Set the icon font size for all tabs. In pixels (px).', 'infiwebs' ),
				'type'        => 'range',
				'param_name'  => 'icon_font_size',
				'min'         => '10',
				'max'         => '100',
				'step'        => '1',
				'value'       => '16',
			),
			array(
				'type'        => 'select',
				'class'       => '',
				'heading'     => __( 'Tab Content Animation', 'infiwebs' ),
				'param_name'  => 'tab_animation',
				'default'     => $tab_animation,
				'value'       => $animation_options,
				'description' => __( 'Animate your tab content when it appears!', 'infiwebs' ),
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Text Color', 'infiwebs' ),
				'param_name'  => 'color_tab_txt',
				'value'       => $color_tab_txt,
				'description' => __( 'The font color of the inactive Tab in this set.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Background Color', 'infiwebs' ),
				'param_name'  => 'color_tab_bg',
				'value'       => $color_tab_bg,
				'description' => __( 'The background color of the inactive Tab in this set.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Active Tab Text Color', 'infiwebs' ),
				'param_name'  => 'color_act_txt',
				'value'       => $color_act_txt,
				'description' => __( 'The font color of the active Tab in this set.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Active Tab Background Color', 'infiwebs' ),
				'param_name'  => 'color_act_bg',
				'value'       => $color_act_bg,
				'description' => __( 'The background color of the active Tab in this set.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Content Background Color', 'infiwebs' ),
				'param_name'  => 'color_content_bg',
				'value'       => $color_content_bg,
				'description' => __( 'The background color of the Tab Content Area.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'radio_button_set',
				'heading'     => __( 'Use different colors on hover', 'infiwebs' ),
				'description' => __( 'Check if you want to use different colors for hover state.', 'infiwebs' ),
				'param_name'  => 'custom_hovers',
				'default'     => 'no',
				'value'       => $yes_no_options,
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Hover Text Color', 'infiwebs' ),
				'param_name'  => 'color_hover_txt',
				'value'       => $color_hover_txt,
				'description' => __( 'The font color of the active Tab in this set.', 'infiwebs' ),
				'dependency'  => array(
					array(
						'element'  => 'custom_hovers',
						'value'    => 'yes',
						'operator' => '==',
					),
				),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Hover Background Color', 'infiwebs' ),
				'param_name'  => 'color_hover_bg',
				'value'       => $color_hover_bg,
				'description' => __( 'The background color of the active Tab in this set.', 'infiwebs' ),
				'dependency'  => array(
					array(
						'element'  => 'custom_hovers',
						'value'    => 'yes',
						'operator' => '==',
					),
				),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Active Tab Index', 'infiwebs' ),
				'param_name'  => 'active_tab_index',
				'value'       => '',
				'description' => __( 'Controls the initial active tab index. Tab index starts from 0, so 0 = first tab. Set index to -1 to hide all tabs initially.', 'infiwebs' ),
			),
			array(
				'type'        => 'radio_button_set',
				'heading'     => __( 'Auto Switch Tabs', 'infiwebs' ),
				'param_name'  => 'auto_switch',
				'default'     => 'no',
				'value'       => array(
					'yes' => esc_attr__( 'Yes', 'infiwebs' ),
					'no'  => esc_attr__( 'No', 'infiwebs' ),
				),
				'description' => __( 'Check if you want to auto switch tabs with interval.', 'infiwebs' ),
			),
			array(
				'type'        => 'range',
				'heading'     => __( 'Enter Interval for auto switch tabs', 'infiwebs' ),
				'param_name'  => 'switch_interval',
				'min'         => '1',
				'max'         => '10',
				'step'        => '1',
				'value'       => '5',
				'description' => __( 'Enter the interval in seconds you want the tabs to auto switch. eg. 5', 'infiwebs' ),
				'dependency'  => array(
					array(
						'element'  => 'auto_switch',
						'value'    => 'yes',
						'operator' => '==',
					),
				),
			),
			array(
				'type'        => 'radio_button_set',
				'heading'     => __( 'Long tab title wrap', 'infiwebs' ),
				'param_name'  => 'title_wrap',
				'default'     => 'truncate',
				'value'       => array(
					'truncate' => esc_attr__( 'Truncate', 'infiwebs' ),
					'wrap'     => esc_attr__( 'Wrap', 'infiwebs' ),
				),
				'description' => __( 'Do you want to truncate the tab title or wrap them to go on next line if the title is too long to fit?.', 'infiwebs' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Tab Title Font Size', 'infiwebs' ),
				'param_name'  => 'title_font_size',
				'value'       => '',
				'description' => __( 'Provide the font size for the tab title in pixels. Leave blank to use default from element options. eg. 16.', 'infiwebs' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'CSS class name', 'infiwebs' ),
				'param_name'  => 'el_class',
				'description' => __( 'Give this element an extra CSS class name if you wish to refer to it in a CSS file. (optional)', 'infiwebs' ),
			),
		),
	);

	// Map single tab with FB.
	$child_args = array(
		'name'              => esc_attr__( 'Tab', 'infiwebs' ),
		'shortcode'         => 'fusion_et_tab',
		'hide_from_builder' => true,
		'allow_generator'   => true,
		'tag_name'          => 'li',
		'on_change'         => 'elegantTabsShortcodeFilter',
		'params'            => array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Title', 'infiwebs' ),
				'param_name'  => 'title',
				'value'       => __( 'Tab Title', 'infiwebs' ),
				'placeholder' => true,
			),
			array(
				'heading'     => __( 'Icon Type', 'infiwebs' ),
				'description' => __( 'Would you like to use font icons or custom image icon?', 'infiwebs' ),
				'value'       => $icon_options,
				'default'     => 'icon',
				'type'        => 'select',
				'param_name'  => 'icon_type',
			),
			array(
				'heading'     => __( 'Icon', 'infiwebs' ),
				'description' => __( 'Select the icon you would like to use for this tab.', 'infiwebs' ),
				'value'       => '',
				'type'        => 'iconpicker',
				'param_name'  => 'icon',
				'dependency'  => array(
					array(
						'element'  => 'icon_type',
						'value'    => 'icon',
						'operator' => '==',
					),
				),
			),
			array(
				'heading'     => __( 'Custom Image Icon', 'infiwebs' ),
				'description' => __( 'Upload the custom image icon you would like to use for this tab.', 'infiwebs' ),
				'value'       => '',
				'type'        => 'upload',
				'param_name'  => 'icon_img',
				'dependency'  => array(
					array(
						'element'  => 'icon_type',
						'value'    => 'img_icon',
						'operator' => '==',
					),
				),
			),
			array(
				'heading'     => __( 'Custom Image Icon on Hover', 'infiwebs' ),
				'description' => __( 'Upload the custom image icon you would like to use for this tab to display on hover state.', 'infiwebs' ),
				'value'       => '',
				'type'        => 'upload',
				'param_name'  => 'icon_img_hover',
				'dependency'  => array(
					array(
						'element'  => 'icon_type',
						'value'    => 'img_icon',
						'operator' => '==',
					),
				),
			),
			array(
				'heading'     => __( 'Image Icon Width', 'infiwebs' ),
				'description' => __( 'Set the custom image icon width. Default is - 32px.', 'infiwebs' ),
				'value'       => '',
				'type'        => 'textfield',
				'param_name'  => 'icon_img_width',
				'dependency'  => array(
					array(
						'element'  => 'icon_type',
						'value'    => 'img_icon',
						'operator' => '==',
					),
				),
			),
			array(
				'heading'     => __( 'Image Icon Height', 'infiwebs' ),
				'description' => __( 'Set the custom image icon height. Default is - 32px.', 'infiwebs' ),
				'value'       => '',
				'type'        => 'textfield',
				'param_name'  => 'icon_img_height',
				'dependency'  => array(
					array(
						'element'  => 'icon_type',
						'value'    => 'img_icon',
						'operator' => '==',
					),
				),
			),
			array(
				'type'             => 'info',
				'heading'          => __( 'Custom Colors', 'infiwebs' ),
				'description'      => __( '<p>Setting custom colors for individual tab will override the colors from parent setting. So, the active and hover tab colors will not work together with individual tab colors.</p>', 'infiwebs' ),
				'param_name'       => 'info',
				'remove_from_atts' => true,
				'group'            => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Text Color', 'infiwebs' ),
				'param_name'  => 'color_tab_txt',
				'value'       => '',
				'description' => __( 'The text color of the tab title and icon.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'colorpickeralpha',
				'heading'     => __( 'Tab Background Color', 'infiwebs' ),
				'param_name'  => 'color_tab_bg',
				'value'       => '',
				'description' => __( 'The background or highlight border color of the tab.', 'infiwebs' ),
				'group'       => 'Colors',
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Tab ID', 'infiwebs' ),
				'description' => __( 'Set the tab id that you can use to link the tab from any page or link.', 'infiwebs' ),
				'param_name'  => 'tab_id',
				'value'       => '',
			),
			array(
				'type'        => 'tinymce',
				'heading'     => esc_attr__( 'Tab Content', 'infiwebs' ),
				'description' => esc_attr__( 'Add content for the tab.', 'infiwebs' ),
				'param_name'  => 'element_content',
				'value'       => 'Your Content Goes Here',
				'placeholder' => true,
			),
		),
	);

	if ( function_exists( 'fusion_builder_frontend_data' ) ) {
		fusion_builder_map(
			fusion_builder_frontend_data(
				'ElegantTabsFB',
				$parent_args,
				'parent'
			)
		);

		fusion_builder_map(
			fusion_builder_frontend_data(
				'ElegantTabsFB',
				$child_args,
				'child'
			)
		);
	} else {
		fusion_builder_map(
			$parent_args
		);

		fusion_builder_map(
			$child_args
		);
	}
}

add_action( 'fusion_builder_before_init', 'integrate_with_fusion_builder', 99 );
