var FusionPageBuilder = FusionPageBuilder || {};

(function() {

	jQuery(document).ready(function() {

		// Elegant Tabs - Parent View.
		FusionPageBuilder.fusion_et_tabs = FusionPageBuilder.ParentElementView.extend( {

			/**
			 * Runs during render() call.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			onRender: function() {
				var $this = this;

				jQuery( window ).on( 'load', function() {
					$this._refreshJs();
				} );
			},

			/**
			 * Runs during onRender() call in child.
			 *
			 * @since 2.6.0
			 * @param {String} childCid - The model CID.
			 * @return {void}
			 */
			onRenderChild: function( childCid ) {
				var that = this,
					cid = this.model.get( 'cid' );

				setTimeout( function() {
					var children = window.FusionPageBuilderViewManager.getChildViews( cid ),
						params = that.model.get( 'params' ),
						index = 1;

					_.every( children, function( child ) {
						var childValues = child.model.get( 'params' ),
							tabContent = '',
							activeClass = '',
							accordion_active_class = '',
							tab_text_color = '';

						childValues.tab_animation     = params.tab_animation;
						childValues.cid               = child.model.get( 'cid' );

						if ( childCid === childValues.cid ) {
							that.$el.find(  '#section-' + childValues.cid ).siblings().removeClass( 'content-current' );
							activeClass = 'content-current';
							accordion_active_class = 'infi-active-tab';
						} else {
							if ( 1 == index ) {
								activeClass = 'content-current';
								accordion_active_class = 'infi-active-tab';
							}
						}

						index++;

						childValues.active_class           = activeClass;
						childValues.accordion_active_class = accordion_active_class;

						tab_text_color = ( '' !== childValues.color_tab_txt ) ? childValues.color_tab_txt : params.color_tab_txt;

						childValues.tab_icon = '';
						childValues.has_icon = 'no-icon';
						childValues.tab_to_mobile = params.tab_to_mobile;
						childValues.color_tab_txt = params.color_tab_txt;

						if ( 'icon' === childValues.icon_type && '' !== childValues.icon ) {
							icon_size = ( '' !== params.icon_font_size ) ? 'font-size:' + _.fusionGetValueWithUnit( params.icon_font_size ) + '; line-height: 1.5em;' : '';
							childValues.tab_icon  = '<i class="iw-icons ' + _.fusionFontAwesome( childValues.icon ) + '" style="color:' + tab_text_color + '; ' + icon_size + '"></i>';
							childValues.has_icon  = 'has-icon';
						} else if ( 'icon' !== childValues.icon_type && 'undefined' !== typeof childValues.icon_img ) {
							if ( '' !== childValues.icon_img_hover ) {
								image_icon_attr += ' data-hover-src="' + childValues.icon_img_hover + '"';
								image_icon_attr += ' data-original-src=" ' + childValues.icon_img + '" ';
							}

							img_css  = 'width: ' + childValues.icon_img_width + ';';
							img_css += 'height: ' + childValues.icon_img_height;
							childValues.tab_icon = '<img class="elegant-tabs-image-icon" src="' + childValues.icon_img + '"' + image_icon_attr + ' style="' + img_css + '" />';
							childValues.has_icon = 'has-icon';
						} else {
							childValues.has_icon = 'no-icon';
						}

						tabContent = that.getTabContent( childValues );

						if ( childCid === childValues.cid ) {
							that.$el.find(  '#section-' + childValues.cid ).replaceWith( tabContent );
							return false;
						}

						if ( ! that.$el.find( '#section-' + childValues.cid ).length ) {
							that.$el.find( '.et-content-wrap' ).append( tabContent );
						}

						return true;
					} );
				}, 100 );
			},

			/**
			 * Compiles and returns the tab content.
			 *
			 * @since 2.6.0
			 * @param {Object} data - The values.
			 * @return {String} Content after compiling the template file.
			 */
			getTabContent: function( data ) {
				var tabContentTemplate = FusionPageBuilder.template( jQuery( '#tmpl-elegant-tab-content-template' ).html() ),
					attributes        = {};

				if ( 'object' !== typeof data ) {
					return '';
				}

				attributes = data;

				return tabContentTemplate( attributes );
			},

			/**
			 * Runs after view DOM is patched.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			afterPatch: function() {

				// TODO: save DOM and apply instead of generating
				this.generateChildElements();

				this._refreshJs();
			},

			/**
			 * Triggers custom event for filters element on settings change.
			 *
			 * @since 2.6.0
			 * @return {void}
			 */
			refreshJs: function() {
				jQuery( '#fb-preview' )[ 0 ].contentWindow.jQuery( 'body' ).trigger( 'fusion-element-render-fusion_et_tabs', this.model.attributes.cid );
			},

			/**
			 * Modify template attributes.
			 *
			 * @since 2.6.0
			 * @param {Object} atts - The attributes.
			 * @return {Object} atts - The attributes.
			 */
			filterTemplateAtts: function( atts ) {
				var attributes = {};

				// Unique ID for this particular element instance, can be useful.
				attributes.cid = this.model.get( 'cid' );

				// Create attribute objects
				attributes.wrapperAttr = this.buildWrapperAttr( atts.params );
				attributes.navAttr     = this.buildNavAttr( atts.params );
				attributes.styles      = this.buildStyles( atts.params );

				// Any extras that need passed on.
				attributes.params = atts.params;

				return attributes;
			},

			/**
			 * Builds the attributes array.
			 *
			 * @access public
			 * @since 2.6.0
			 * @param {Object} values - The values.
			 * @return {array} Attributes array for wrapper.
			 */
			buildWrapperAttr: function( values ) {
				var attr = _.fusionVisibilityAtts( values.hide_on_mobile, {
						class: 'et-tabs et-tabs-' + this.model.get( 'cid' ),
						style: ''
					} );

				attr['class'] += ( 'yes' === values.justified_tabs && 'horizontal' === values.tab_type ) ? ' justified-tabs' : '';
				attr['class'] += ( values.tab_type ) ? ' et-' + values.tab_type : ' et-horizontal';
				attr['class'] += ( 'select' === values.tab_to_mobile ) ? ' et-mobile-enabled ' : ' et-mobile-disabled';
				attr['class'] += ( values.tab_style ) ? ' et-tabs-style-' + values.tab_style : ' et-tabs-style-bars';
				attr['class'] += ( values.tab_align ) ? ' et-align-' + values.tab_align : ' et-align-left';

				attr['data-tab_style'] = values.tab_style;
				attr['data-active-bg'] = values.color_act_bg;
				attr['data-active-text'] = values.color_act_txt;
				attr['data-active-tab-index'] = values.active_tab_index;
				attr['data-auto-switch-tab'] = values.auto_switch;
				attr['data-switch-interval'] = values.switch_interval;

				if ( 'yes' === values.custom_hovers ) {
					attr['data-hover-bg'] = values.color_hover_bg;
					attr['data-hover-text'] = values.color_hover_txt;
				}

				if ( values.el_class ) {
					attr['class'] += ' ' + values.el_class;
				}

				if ( values.id ) {
					attr['id'] = values.id;
				}

				return attr;
			},

			/**
			 * Builds the nav attributes.
			 *
			 * @access public
			 * @since 2.6.0
			 * @param {Object} values - The values.
			 * @return {String} Custom styling.
			 */
			buildNavAttr: function( values ) {
				var attr = {
					class: 'elegant-tabs-list-container fusion-child-element',
					style: ''
				};

				if ( values.title_wrap ) {
					attr['class'] += ' tab-title-' + values.title_wrap;
				}

				attr['style'] += 'color:' + values.color_tab_txt;

				return attr;
			},

			/**
			 * Builds the custom style.
			 *
			 * @access public
			 * @since 2.6.0
			 * @param {Object} values - The values.
			 * @return {String} Custom styling.
			 */
			buildStyles: function( values ) {
				var main_class = '.elegant-tabs-container .et-tabs.et-tabs-' + this.model.get( 'cid' ),
					liClass    = main_class + ' ul li',
					style      = '',
					css = '',
					cl = main_class,
			        st = values.tab_style,
			        bg = values.color_act_bg,
			        color = values.color_act_txt,
			        bg_hover = values.color_hover_bg,
			        color_hover = values.color_hover_txt;

				style += main_class + ' .elegant-tabs-list-container li, ' + main_class + ' .infi-tab-accordion-item {';

				if ( 'line' !== values.tab_style && '' !== values.color_tab_bg ) {
					style += 'background:' + values.color_tab_bg + ';';
				}

				if ( '' !== values.color_tab_txt ) {
					style += 'color:' + values.color_tab_txt + ';';
				}

				style += '}';

		        css += cl + ' .infi-tab-accordion.infi-active-tab .infi_accordion_item{background:' + bg + ' !important; color:' + color + ' !important;}\n';
		        css += cl + ' .infi-tab-accordion.infi-active-tab .infi_accordion_item .infi-accordion-item-heading{color:' + color + ' !important;}\n';
		        css += cl + ' .infi-tab-accordion.infi-active-tab .infi_accordion_item .infi-accordion-item-heading .iw-icons{color:' + color + ' !important;}\n';
		        switch (st) {
		            case 'bars':
		                css += cl + ' li.tab-current a{background:' + bg + '; color:' + color + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' li:not(.tab-current) a.et-anchor-tag:hover{background:' + bg_hover + '; color:' + color_hover + ';}\n';
		                css += cl + ' nav ul li:not(.tab-current) a.et-anchor-tag:hover, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'iconbox':
		            case 'iconbox-iconlist':
		                css += cl + ' li.tab-current a{background:' + bg + '; color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li.tab-current::after{color:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current{color:' + bg + ' !important;}\n';
		                css += cl + ' li:not(.tab-current) a.et-anchor-tag:hover{background:' + bg_hover + '; color:' + color_hover + ';}\n';
		                css += cl + ' nav ul li:not(.tab-current) a.et-anchor-tag:hover, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'underline':
		                css += cl + ' nav ul li a.et-anchor-tag::after{background:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current) a.et-anchor-tag:hover:after{background:' + bg_hover + '; transform: translate3d(0,0,0);}\n';
		                css += cl + ' nav ul li:not(.tab-current) a.et-anchor-tag:hover, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'topline':
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag{box-shadow:inset 0px 3px 0px ' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current {border-top-color: ' + color + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag{box-shadow:inset 0px 3px 0px ' + bg_hover + ';}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover {border-top-color: ' + color_hover + ';}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'iconfall':
		            case 'circle':
		            case 'square':
		                css += cl + ' nav ul li::before{background:' + bg + '; border-color:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current::after { border-color:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover::before{background:' + bg_hover + '; border-color:' + bg_hover + '; transform: translate3d(0,0,0);}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover::after { border-color:' + bg_hover + ';}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'line':
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag{box-shadow:inset 0px -2px ' + bg + ' !important;}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag{box-shadow:inset 0px -2px ' + bg_hover + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'linebox':
		                css += cl + ' nav ul li a.et-anchor-tag::after{background:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag::after{background:' + bg_hover + '; transform: translate3d(0,0,0);}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'flip':
		                css += cl + ' nav ul li a.et-anchor-tag::after, ' + cl + ' nav ul li.tab-current a.et-anchor-tag{background:' + bg + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag::after, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag{background:' + bg_hover + '; transform: translate3d(0,0,0);}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'tzoid':
		                var style = jQuery(cl + ' nav ul li').attr('style');
		                css += cl + ' nav ul li a.et-anchor-tag::after{' + style + ';}\n';
		                css += cl + ' li.tab-current a.et-anchor-tag::after{background:' + bg + '; color:' + color + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a.et-anchor-tag > i{color:' + color + ' !important;}\n';
		                css += cl + ' li:not(.tab-current):hover a.et-anchor-tag::after{background:' + bg_hover + '; color:' + color_hover + '; transform: perspective(5px) rotateX(0.7deg) translateZ(-1px);}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		            case 'fillup':
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag::after{background:' + bg + '; border-color: ' + bg + ';}\n';
		                css += cl + ' nav ul li a.et-anchor-tag::after{background:' + bg_hover + '; border-color: ' + bg_hover + ';}\n';
		                css += cl + ' nav ul li.tab-current a.et-anchor-tag, ' + cl + ' nav ul li.tab-current a > i{color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li a.et-anchor-tag {border-color:' + color + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag::after{background:' + bg_hover + '; translate3d(0,0,0)}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag::after{background:' + bg_hover + '; border-color: ' + bg_hover + '; transform: translate3d(0,0,0)}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag {border-color:' + color_hover + ' !important;}\n';
		                css += cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag, ' + cl + ' nav ul li:not(.tab-current):hover a.et-anchor-tag > i{color:' + color_hover + ' !important;}\n';
		                break;
		        }

				style += css;

				return style;
			}
		} );
	} );

	_.extend( FusionPageBuilder.Callback.prototype, {
		// Tabs filter.
		elegantTabsShortcodeFilter: function( attributes, view ) {

			var parentView = window.FusionPageBuilderViewManager.getView( view.model.get( 'parent' ) ),
				cid = view.model.get( 'cid' );

			parentView.onRenderChild( cid );

			return attributes;

		}
	} );
}( jQuery ) );
