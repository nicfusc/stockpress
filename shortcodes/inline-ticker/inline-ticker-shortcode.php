<?php

// [inline-ticker ticker="TICKER"] content [/inline-ticker]
function inline_ticker_func( $atts, $content = null ) {

	$a = shortcode_atts( array(
		'ticker' => '',
	), $atts );

	$http = IEX_Rest_Client::create();
	$response = $http->get( '/stock/' . $a['ticker'] . '/stats' );

	if ( is_array( $response ) ) {
		$body = $response['body']; // use the content
		$body_decoded = json_decode($body);
	}

	if ( $content ) {
		return  '<span class="stockpress-tip"> '. $content . ' <span class="stockpress-tip-content">'. $body_decoded->companyName .'</span></span>';
	}

	return  '<span class="stockpress-tip"> '.$a["ticker"].' <span class="stockpress-tip-content">'. $body_decoded->companyName . '</span></span>';
}
add_shortcode( 'inline-ticker', 'inline_ticker_func' );

