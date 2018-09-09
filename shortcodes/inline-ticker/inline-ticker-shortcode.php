<?php

// [inline-ticker ticker="TICKER"] content [/inline-ticker]
function inline_ticker_func( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'ticker' => '',
	), $atts );

	if ( $content ) {
		return "stock {$content} = {$a['ticker']}";
	}

	return "stock = {$a['ticker']}";
}
add_shortcode( 'inline-ticker', 'inline_ticker_func' );