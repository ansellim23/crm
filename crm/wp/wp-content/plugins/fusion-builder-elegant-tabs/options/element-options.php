<?php
if ( class_exists( 'Fusion_Element' ) ) {

  /**
   * Sample options class.
   *
   * @package Fusion-Builder-Elegant-Tabs
   * @since 2.2
   */
  class ElegantTabsElementOptions extends Fusion_Element {

    /**
     * Constructor.
     *
     * @access public
     * @since 1.1
     */
    public function __construct() {
      parent::__construct();
    }

    /**
     * Adds settings to element options panel.
     *
     * @access public
     * @since 1.1
     * @return array $sections Sample settings.
     */
    public function add_options() {
      global $fusion_builder_elements;
			$fusion_builder_elements['fusion_et_tabs'] = 'Elegant Tabs';

			$sections['elegant_tabs'] = array(
				'label'       => esc_html__( 'Elegant Tabs', 'infiwebs' ),
				'description' => '',
				'id'          => 'elegant_tabs',
				'default'     => '',
				'type'        => 'sub-section',
				'fields'      => array(
					'elegant_tabs_important_note_info' => array(
						'label'       => '',
						'description' => '<div class="fusion-redux-important-notice">' . __( '<strong>IMPORTANT NOTE:</strong> The styling options for the elegant tabs are used for only new tabs. Existing tabs need to change the settings from where they are added.', 'infiwebs' ) . '</div>',
						'id'          => 'elegant_tabs_important_note_info',
						'type'        => 'custom',
					),
					'tab_style' => array(
						'label'       => esc_html__( 'Tab Style', 'infiwebs' ),
						'description' => esc_html__( 'Select which tab style would you like to set as default.', 'infiwebs' ),
						'id'          => 'tab_style',
						'default'	  	=> 'bars',
						'choices'     => array(
							'bars'				=> esc_html__( 'Bar Style' ),
							'iconbox'			=> esc_html__( 'Icon Box Style' ),
							'underline' 	=> esc_html__( 'Underline Style' ),
							'topline' 		=> esc_html__( 'Top Line Style' ),
							'iconfall' 		=> esc_html__( 'Falling Icon Style' ),
							'line'				=> esc_html__( 'Line Style' ),
							'linebox'			=> esc_html__( 'Line Box Style' ),
							'flip'				=> esc_html__( 'Flip Style' ),
							'tzoid'	 			=> esc_html__( 'Trapezoid Style' ),
							'fillup'			=> esc_html__( 'Fillup Style' ),
						),
						'type'        => 'select',
					),
					'tab_animation' => array(
						'label'       => esc_html__( 'Tab Content Animation', 'infiwebs' ),
						'description' => esc_html__( 'Animation is applied to tab content on switching tabs.', 'infiwebs' ),
						'id'          => 'tab_animation',
						'default'	  	=> 'fadeIn',
						'choices'       => array(
							'none'						=> esc_html__( 'No Animation', 'infiwebs' ),
							'swing' 					=> esc_html__( 'Swing', 'infiwebs' ),
							'pulse' 					=> esc_html__( 'Pulse', 'infiwebs' ),
							'flash' 					=> esc_html__( 'Flash', 'infiwebs' ),
							'fadeIn' 					=> esc_html__( 'Fade In', 'infiwebs' ),
							'fadeInUp' 				=> esc_html__( 'Fade In Up', 'infiwebs' ),
							'fadeInDown' 			=> esc_html__( 'Fade In Down', 'infiwebs' ),
							'fadeInLeft' 			=> esc_html__( 'Fade In Left', 'infiwebs' ),
							'fadeInRight' 		=> esc_html__( 'Fade In Right', 'infiwebs' ),
							'fadeInUpBig' 		=> esc_html__( 'Fade In Up Long', 'infiwebs' ),
							'fadeInDownBig' 	=> esc_html__( 'Fade In Down Long', 'infiwebs' ),
							'fadeInLeftBig' 	=> esc_html__( 'Fade In Left Long', 'infiwebs' ),
							'fadeInRightBig' 	=> esc_html__( 'Fade In Right Long', 'infiwebs' ),
							'slideInDown' 		=> esc_html__( 'Slide In Down', 'infiwebs' ),
							'slideInUp' 			=> esc_html__( 'Slide In Up', 'infiwebs' ),
							'slideInLeft' 		=> esc_html__( 'Slide In Left', 'infiwebs' ),
							'bounceIn' 				=> esc_html__( 'Bounce In', 'infiwebs' ),
							'bounceInUp' 			=> esc_html__( 'Bounce In Up', 'infiwebs' ),
							'bounceInDown' 		=> esc_html__( 'Bounce In Down', 'infiwebs' ),
							'bounceInLeft' 		=> esc_html__( 'Bounce In Left', 'infiwebs' ),
							'bounceInRight' 	=> esc_html__( 'Bounce In Right', 'infiwebs' ),
							'rotateIn' 				=> esc_html__( 'Rotate In', 'infiwebs' ),
							'lightSpeedIn' 		=> esc_html__( 'Light Speed In', 'infiwebs' ),
							'rollIn' 					=> esc_html__( 'Roll In', 'infiwebs' ),
						),
						'type'        => 'select',
					),
					'tab_type' => array(
						'label'       => esc_html__( 'Tab Type', 'infiwebs' ),
						'description' => esc_html__( 'Select the type of tab to be displayed.', 'infiwebs' ),
						'id'          => 'tab_type',
						'default'     => 'horizontal',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'horizontal'  => esc_html__( 'Horizontal', 'infiwebs' ),
							'vertical'    => esc_html__( 'Vertical', 'infiwebs' ),
						),
					),
					'justified_tabs' => array(
						'label'       => esc_html__( 'Justified Tabs', 'infiwebs' ),
						'description' => esc_html__( 'Choose to get tabs stretched over full element width.', 'infiwebs' ),
						'id'          => 'justified_tabs',
						'default'     => 'no',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'yes'  => esc_html__( 'Yes', 'infiwebs' ),
							'no'   => esc_html__( 'No', 'infiwebs' ),
						),
					),
					'mobile_tab' => array(
						'label'       => esc_html__( 'Tabs on mobile', 'infiwebs' ),
						'description' => esc_html__( 'Select how tabs should behave on mobile devices.', 'infiwebs' ),
						'id'          => 'mobile_tab',
						'default'     => 'no',
						'type'        => 'radio-buttonset',
						'choices'     => array(
							'select'    => esc_html__( 'Select Box', 'infiwebs' ),
							'accordion' => esc_html__( 'Accordion', 'infiwebs' ),
						),
					),
					'tab_title_font' => array(
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
						'class' => 'test',
					),
					'color_tab_txt' => array(
						'label'       => esc_html__( 'Inactive Tab Title Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of inactive tab title.', 'infiwebs' ),
						'id'          => 'color_tab_txt',
						'default'     => '#2a90da',
						'type'        => 'color-alpha',
					),
					'color_tab_bg' => array(
						'label'       => esc_html__( 'Inactive Tab Background / Border Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of inactive tab title background or border.', 'infiwebs' ),
						'id'          => 'color_tab_bg',
						'default'     => '#eff4ff',
						'type'        => 'color-alpha',
					),
					'color_act_txt' => array(
						'label'       => esc_html__( 'Active Tab Title Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of active tab title.', 'infiwebs' ),
						'id'          => 'color_act_txt',
						'default'     => '#ffffff',
						'type'        => 'color-alpha',
					),
					'color_act_bg' => array(
						'label'       => esc_html__( 'Active Tab Background / Border Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of active tab title background or border.', 'infiwebs' ),
						'id'          => 'color_act_bg',
						'default'     => '#2a90da',
						'type'        => 'color-alpha',
					),
					'color_content_bg' => array(
						'label'       => esc_html__( 'Tab Content Background Color', 'infiwebs' ),
						'description' => esc_html__( 'Controls the color of tab content background.', 'infiwebs' ),
						'id'          => 'color_content_bg',
						'default'     => 'rgb(254, 254, 254)',
						'type'        => 'color-alpha',
					),
					'color_hover_txt' => array(
						'label'         => esc_html__( 'Tab Hover Text Color', 'infiwebs' ),
						'description'   => esc_html__( 'The font color of the active Tab in this set.', 'infiwebs' ),
						'id'            => 'color_hover_txt',
						'default'       => '#ffffff',
						'type'          => 'color-alpha',
					),
					'color_hover_bg' => array(
						'label'         => esc_html__( 'Tab Hover Background Color', 'infiwebs' ),
						'description'   => esc_html__( 'The background color of the active Tab in this set.', 'infiwebs' ),
						'id'            => 'color_hover_bg',
						'type'          => 'color-alpha',
						'default'       => '#2a90da',
					),
				),
			);

      if ( class_exists( 'WooCommerce' ) ) {

				$sections['elegant_tabs']['fields']['elegant_tabs_icons'] = array(
					'label'       => '',
					'description' => '<div class="fusion-redux-important-notice">' . __( '<strong>IMPORTANT NOTE:</strong> The icons selected for each tab here will be used as default for WooCommerce tabs. You can change the icon for each tab from Individual product edit screen.', 'infiwebs' ) . '</div>',
					'id'          => 'elegant_tabs_icon_note_info',
					'type'        => 'custom',
				);

				$tabs = array(
					'description' => array( 'title' => 'Description', 'priority' => 0 ),
					'reviews' => array( 'title' => 'Reviews', 'priority' => 1 ),
					'additional_information' => array( 'title' => 'Additional Information', 'priority' => 2 ),
				);
				$tabs = apply_filters( 'woocommerce_product_tabs', $tabs, true );
				$icon_tabs = array();

				foreach ( $tabs as $key => $tab ) :
					$sections['elegant_tabs']['fields'][ 'tab-key-' . $key ] = array(
						'label'       => $tab['title'],
						'description' => __( 'Choose icon for - ', 'infiwebs' ) . $tab['title'],
						'id'          => 'tab-key-' . $key,
						'type'        => 'text',
						'class'       => 'infi-icon-picker',
					);
				endforeach;

			}

			return $sections;
    }
  }
  new ElegantTabsElementOptions;
}
