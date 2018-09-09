<?php

class IEX_Rest_Client {

	private static $base_url = 'https://api.iextrading.com/1.0';

	private $http;

	public static function create()
	{
		return new self( _wp_http_get_object(), self::$base_url );
	}

	public function __construct(WP_Http $http, $base_url)
	{
		$this->http = $http;
		$this->base_url = $base_url;
	}

	public function get( $endpoint ){

		$url = self::$base_url . $endpoint;

		$response = $this->http->get( $url );

		$response_array = json_decode($response['body'], true);

		return $response;

	}
}