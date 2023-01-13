var FusionPageBuilder = FusionPageBuilder || {};

(function() {

	jQuery(document).ready(function() {

		// // Elegant Tabs - Child View.
		FusionPageBuilder.fusion_et_tab = FusionPageBuilder.ChildElementView.extend( {

			/**
			 * Runs during render() call.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			onRender: function() {
				var self = this,
					parentView = window.FusionPageBuilderViewManager.getView( this.model.get( 'parent' ) );

				if ( 'undefined' !== typeof this.model.attributes.selectors ) {
					this.model.attributes.selectors[ 'class' ] += ' ' + this.className;
					this.setElementAttributes( this.$el, this.model.attributes.selectors );
				}

				// Re-render the parent view if the child was cloned
				if ( 'undefined' !== typeof self.model.attributes.cloned && true === self.model.attributes.cloned ) {
					delete self.model.attributes.cloned;
					parentView.reRender();
				}
			},

			/**
			 * Runs on child element init.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			onInit: function() {
				var parentView = window.FusionPageBuilderViewManager.getView( this.model.get( 'parent' ) );

				parentView.onRenderChild();
			},

			/**
			 * Runs before element is removed.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			beforeRemove: function() {
				var cid = this.model.get( 'cid' ),
					parentView = window.FusionPageBuilderViewManager.getView( this.model.get( 'parent' ) ),
					contentItem = parentView.$el.find( '#section-' + cid );

				parentView.onRenderChild();
				contentItem.remove();
			},

			/**
			 * Runs after view DOM is patched.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			beforePatch: function() {
				var parentView = window.FusionPageBuilderViewManager.getView( this.model.get( 'parent' ) );
				parentView._refreshJs();
			},

			/**
			 * Runs after view DOM is patched.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			afterPatch: function() {
				var parentView = window.FusionPageBuilderViewManager.getView( this.model.get( 'parent' ) ),
					parentCid = this.model.get( 'parent' );

				if ( 'undefined' !== typeof this.model.attributes.selectors ) {
					this.model.attributes.selectors[ 'class' ] += ' ' + this.className;
					this.setElementAttributes( this.$el, this.model.attributes.selectors );
				}

				// Force re-render for child option changes.
				setTimeout( function() {
					jQuery( '#fb-preview' )[ 0 ].contentWindow.jQuery( 'body' ).trigger( 'fusion-element-render-fusion_et_tabs', parentCid );
				}, 100 );

				// Using non debounced version for smoothness.
				this.refreshJs();

				parentView._refreshJs();
			},

			/**
			 * Modify template attributes.
			 *
			 * @since 2.6.0
			 * @param {Object} atts - The attributes.
			 * @return {Object} atts - The attributes.
			 */
			filterTemplateAtts: function( atts ) {
				var attributes = {},
					parent      = this.model.get( 'parent' ),
					parentModel = FusionPageBuilderElements.find( function( model ) {
						return model.get( 'cid' ) == parent;
					} ),
					icon_size = '',
					image_icon_attr = '',
					img_css = '',
					tab_text_color = '';

				this.parentValues      = jQuery.extend( true, {}, fusionAllElements.fusion_et_tabs.defaults, _.fusionCleanParameters( parentModel.get( 'params' ) ) );
				attributes.parentModel = parentModel;

				// Unique ID for this particular element instance, can be useful.
				attributes.cid = this.model.get( 'cid' );

				// Set parent model.
				attributes.parent = parent;

				// Any extras that need passed on.
				attributes.content  = atts.params.element_content;
				attributes.title    = atts.params.title;
				attributes.tab_icon = '';
				attributes.has_icon = 'no-icon';

				tab_text_color = ( '' !== atts.params.color_tab_txt ) ? atts.params.color_tab_txt : this.parentValues.color_tab_txt;

				if ( 'icon' === atts.params.icon_type && '' !== atts.params.icon ) {
					icon_size = ( '' !== this.parentValues.icon_font_size ) ? 'font-size:' + _.fusionGetValueWithUnit( this.parentValues.icon_font_size ) + '; line-height: 1.5em;' : '';
					attributes.tab_icon  = '<i class="iw-icons ' + _.fusionFontAwesome( atts.params.icon ) + '" style="color:' + tab_text_color + '; ' + icon_size + '"></i>';
					attributes.has_icon  = 'has-icon';
				} else if ( 'icon' !== atts.params.icon_type && 'undefined' !== typeof atts.params.icon_img ) {
					if ( '' !== atts.params.icon_img_hover ) {
						image_icon_attr += ' data-hover-src="' + atts.params.icon_img_hover + '"';
						image_icon_attr += ' data-original-src=" ' + atts.params.icon_img + '" ';
					}

					img_css  = 'width: ' + atts.params.icon_img_width + ';';
					img_css += 'height: ' + atts.params.icon_img_height;
					attributes.tab_icon = '<img class="elegant-tabs-image-icon" src="' + atts.params.icon_img + '"' + image_icon_attr + ' style="' + img_css + '" />';
					attributes.has_icon = 'has-icon';
				} else {
					attributes.has_icon = 'no-icon';
				}

				attributes.anchor_style = '';

				if ( '' !== tab_text_color ) {
					attributes.anchor_style += 'color:' + tab_text_color + ';';
				}

				if ( '' !== atts.params.color_tab_bg ) {
					attributes.anchor_style += 'background:' + atts.params.color_tab_bg + ';';
				}

				if ( '' !== this.parentValues.title_font_size ) {
					attributes.anchor_style += 'font-size:' + _.fusionGetValueWithUnit( this.parentValues.title_font_size ) + ';';
				}

				return attributes;
			}
		} );
	} );
}( jQuery ) );
