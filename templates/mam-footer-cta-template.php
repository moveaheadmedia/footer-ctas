<?php
/**
 * Footer CTAs
 *
 * @package   footer-ctas
 * @author    Move Ahead Media <ali@moveaheadmedia.co.uk>
 * @copyright 2022 Footer CTAs
 * @license   MIT
 * @link      https://moveaheadmedia.com
 */
?>
<div class="mam-footer-ctas">
	<a href="javascript:;" class="mam-footer-ctas-toggle"><?php echo ( footer_ctas()->get_toggle_icon() ); ?></a>
	<div class="mam-footer-ctas-content">
		<?php
		$count = 0;
		foreach ( footer_ctas()->get_items() as $cta ) {
			$count++;
			?>
			<?php if ( $cta['popup'] == 'Yes' ) { ?>
				<a href="javascript:;" class="mam-footer-ctas-item-link mam-footer-ctas-item-link-<?php echo esc_attr( $count ); ?>"
				   data-fancybox data-src="#mam-footer-ctas-item-content-<?php echo esc_attr( $count ); ?>"
				   data-touch="false">
					<?php echo ( $cta['icon'] ); ?>
					<span class="mam-footer-ctas-item-title mam-footer-ctas-item-title-<?php echo esc_attr( $count ); ?>">
						<?php echo ( $cta['text'] ); ?>
					</span>
				</a>
				<div style="display: none;">
					<div id="mam-footer-ctas-item-content-<?php echo esc_attr( $count ); ?>" class="mam-footer-ctas-item-content">
						<?php echo ( $cta['popup_content'] ); ?>
					</div>
				</div>
			<?php } else { ?>
				<a href="<?php echo esc_attr( $cta['link'] ); ?>" class="mam-footer-ctas-item-link mam-footer-ctas-item-link-<?php echo esc_attr( $count ); ?>">
					<?php echo ( $cta['icon'] ); ?>
					<span class="mam-footer-ctas-item-title mam-footer-ctas-item-title-<?php echo esc_attr( $count ); ?>">
						<?php echo ( $cta['text'] ); ?>
					</span>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
</div>
