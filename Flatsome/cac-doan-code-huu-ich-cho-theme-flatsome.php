<?php

//Đoạn mã PHP: Xóa bỏ số lượng sản phẩm
add_action( 'init', 'woovn_remove_woocommerce_result_count' );
function woovn_remove_woocommerce_result_count() {
	remove_action( 'flatsome_category_title_alt', 'woocommerce_result_count', 20 );
}

// Đoạn mã PHP: Xóa bỏ kiểu sắp xếp sản phẩm
add_action( 'init', 'woovn_remove_woocommerce_catalog_ordering');
function woovn_remove_woocommerce_catalog_ordering() {
	remove_action('flatsome_category_title_alt', 'woocommerce_catalog_ordering', 30);
}

// Đoạn mã PHP: Di chuyển mô tả ngắn lên trên giá bán
add_action( 'init', 'woovn_flatsome_woocommerce_shop_loop_excerpt' );
function woovn_flatsome_woocommerce_shop_loop_excerpt() {
	remove_action( 'flatsome_product_box_after', 'flatsome_woocommerce_shop_loop_excerpt', 20 );
	add_action( 'woocommerce_shop_loop_item_title','flatsome_woocommerce_shop_loop_excerpt', 15 );
}

// Đoạn mã PHP: Di chuyển nút đóng vào trong lightbox
add_filter( 'flatsome_lightbox_close_btn_inside', '__return_true' );

// Đoạn mã PHP: Thay đổi icon nút đóng của lightbox
add_filter( 'flatsome_lightbox_close_button', function ( $html ) {
	$html = '<button title="%title%" type="button" class="mfp-close">';
	/* f.ex. We're replacing the SVG icon into another one. */
	$html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 475.2 475.2" width="28" height="28"><path d="M405.6 69.6C360.7 24.7 301.1 0 237.6 0s-123.1 24.7-168 69.6S0 174.1 0 237.6s24.7 123.1 69.6 168 104.5 69.6 168 69.6 123.1-24.7 168-69.6 69.6-104.5 69.6-168-24.7-123.1-69.6-168zm-19.1 316.9c-39.8 39.8-92.7 61.7-148.9 61.7s-109.1-21.9-148.9-61.7c-82.1-82.1-82.1-215.7 0-297.8C128.5 48.9 181.4 27 237.6 27s109.1 21.9 148.9 61.7c82.1 82.1 82.1 215.7 0 297.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/><path d="M342.3 132.9c-5.3-5.3-13.8-5.3-19.1 0l-85.6 85.6-85.6-85.6c-5.3-5.3-13.8-5.3-19.1 0-5.3 5.3-5.3 13.8 0 19.1l85.6 85.6-85.6 85.6c-5.3 5.3-5.3 13.8 0 19.1 2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4l85.6-85.6 85.6 85.6c2.6 2.6 6.1 4 9.5 4 3.5 0 6.9-1.3 9.5-4 5.3-5.3 5.3-13.8 0-19.1l-85.4-85.6 85.6-85.6c5.3-5.3 5.3-13.8 0-19.1z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/></svg>';
	$html .= '</button>';
	return $html;
} );
