<?php

// [inline-ticker ticker="$SYMBOL"] content [/inline-ticker]
// [inline-ticker ticker="$SYMBOL"]
function inline_ticker_func( $atts, $content = null ) {

	$a = shortcode_atts(
		array(
			'ticker' => '',
		),
		$atts
	);

	$http     = IEX_Rest_Client::create();
	$response = $http->get( '/stock/' . $a['ticker'] . '/quote' );

	if ( is_array( $response ) ) {
		$body         = $response['body']; // use the content
		$body_decoded = json_decode( $body );
	}

	$company_name   = $body_decoded->companyName;
	$symbol         = $body_decoded->symbol;
	$market_cap     = number_shorten( $body_decoded->marketCap );
	$latest_price   = $body_decoded->latestPrice;
	$change         = $body_decoded->change;
	$change_percent = round( $body_decoded->changePercent * 100, 2 );
	$latest_time    = $body_decoded->latestTime;

	if ( $change_percent > 0 ) {
		$change_style = 'positive';
	} else {
		$change_style = 'negative';
	}

	$tip_content  = '<strong>' . $company_name . ' (' . $symbol . ')</strong>';
	$tip_content .= '<br/>';
	$tip_content .= 'Market Cap: ' . $market_cap;
	$tip_content .= '<br/>';
	$tip_content .= $latest_price . ' <span class="change-percent-' . $change_style . '"> ' . $change . ' ' . $change_percent . '% </span>';
	$tip_content .= '<span class="latest-time">' . $latest_time . '</span>';

	if ( $content ) {
		return '<span class="stockpress-tip"> ' . $content . ' <span class="stockpress-tip-content">' . $tip_content . '</span></span>';
	}

	return '<span class="stockpress-tip"> ' . $a['ticker'] . ' <span class="stockpress-tip-content">' . $tip_content . '</span></span>';
}
add_shortcode( 'inline-ticker', 'inline_ticker_func' );

