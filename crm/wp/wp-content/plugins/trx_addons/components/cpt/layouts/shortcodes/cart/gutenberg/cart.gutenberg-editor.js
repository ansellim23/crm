(function(blocks, editor, i18n, element) {
	// Set up variables
	var el = element.createElement;
	// Register Block - Cart
	blocks.registerBlockType(
		'trx-addons/layouts-cart',
		trx_addons_apply_filters( 'trx_addons_gb_map', {
			title: i18n.__( 'Cart' ),
			description: i18n.__( 'Insert cart with items number and totals to the custom layout' ),
			icon: 'cart',
			category: 'trx-addons-layouts',
			attributes: trx_addons_apply_filters( 'trx_addons_gb_map_get_param', trx_addons_object_merge(
				{
					type: {
						type: 'string',
						default: 'default'
					},
					market: {
						type: 'title',
						default: 'woocommerce'
					},
					text: {
						type: 'string',
						default: ''
					}
				},
				trx_addons_gutenberg_get_param_hide(),
				trx_addons_gutenberg_get_param_id()
			), 'trx-addons/layouts-cart' ),
			edit: function(props) {
				return trx_addons_gutenberg_block_params(
					{
						'render': true,
						'general_params': el(
							'div', {}, trx_addons_gutenberg_add_params( trx_addons_apply_filters( 'trx_addons_gb_map_add_params', [
								// Layout
								{
									'name': 'type',
									'title': i18n.__( 'Layout' ),
									'descr': i18n.__( "Select layout's type" ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['sc_layouts']['sc_cart'] ),
								},
								// Market
								{
									'name': 'market',
									'title': i18n.__( 'Market' ),
									'descr': i18n.__( "Select e-commerce plugin to show cart" ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['sc_cart_market'] ),
								},
								// Cart text
								{
									'name': 'text',
									'title': i18n.__( 'Cart text' ),
									'descr': i18n.__( "Text before cart" ),
									'type': 'text',
								}
							], 'trx-addons/layouts-cart', props ), props )
						),
						'additional_params': el(
							'div', {},
							// Hide on devices params
							trx_addons_gutenberg_add_param_hide( props ),
							// ID, Class, CSS params
							trx_addons_gutenberg_add_param_id( props )
						)
					}, props
				);
			},
			save: function(props) {
				return el( '', null );
			}
		},
		'trx-addons/layouts-cart'
	) );
})( window.wp.blocks, window.wp.editor, window.wp.i18n, window.wp.element );
