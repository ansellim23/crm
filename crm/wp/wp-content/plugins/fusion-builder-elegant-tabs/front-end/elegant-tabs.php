<?php
/**
 * Underscore.js template
 *
 * @package elegan-elements-fusion-builder
 * @since 2.6
 */

?>
<script type="text/html" id="tmpl-fusion_et_tabs-shortcode">
<section class="elegant-tabs-container elegant-tabs-cid{{{ cid }}}">
	<style type="text/css">
		.et-tabs {
			overflow: visible !important;
		}
		{{{ styles }}}
	</style>
	<div {{{ _.fusionGetAttributes( wrapperAttr ) }}}>
		<nav>
			<ul {{{ _.fusionGetAttributes( navAttr ) }}}>
			</ul>
		</nav>
		<div class="et-content-wrap et-content-wrap-{{{ cid }}}" style="background:{{{ params.color_content_bg }}};">
		</div>
	</div>
</section>
</script>

<script type="text/html" id="tmpl-fusion_et_tab-shortcode">
<a class="et-anchor-tag" style="{{{ anchor_style }}}" href="javascript:void(0)" data-href="#section-{{{ cid }}}">
	{{{ tab_icon }}}
	<span class="{{{ has_icon }}}">{{{ title }}}</span>
</a>
</script>

<script type="text/html" id="tmpl-elegant-tab-content-template">
<#
if ( 'accordion' === tab_to_mobile ) {
	#>
	<div class="infi-responsive-tabs">
		<div class="infi-tab-accordion {{{ accordion_active_class }}}">
				<div class="section-{{{ cid }}}_tab infi_accordion_item infi-tab-accordion-item">
					<div class="infi-accordion-item-heading" data-href="#section-{{{ cid }}}" style="color:{{{ color_tab_txt }}};">
						{{{ tab_icon }}}
						<span class="{{{ has_icon }}}">{{{ title }}}</span>
					</div>
				</div>
			</div>
	</div>
	<#
}
#>
<section id="section-{{{ cid }}}" class="tab {{{ active_class }}}" data-animation="{{{ tab_animation }}}">
	<div class="infi-content-wrapper">
		{{{ FusionPageBuilderApp.renderContent( element_content, cid, false ) }}}
	</div>
</section>
</script>
<style type="text/css">
.fusion_et_tab li.fusion-builder-option.info {
	height: auto !important;
}
.fusion_et_tab li.fusion-builder-option.info p {
	text-transform: none;
}
</style>
