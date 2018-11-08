<?php

namespace StockPress;

class Core {

	public function __construct() {

		$this->styles();
		$this->scripts();

	}

	private function styles() {
		wp_enqueue_style( 'stockpress', STOCKPRESS_URL . '/style.css', [], STOCKPRESS_VERSION );
	}



	private function scripts() {
		//wp_enqueue_script( 'stockpress-vendor-tippy', STOCKPRESS_URL . 'assets/js/vendor/vendor.js', 'jquery' , STOCKPRESS_VERSION);
	}

}

new Core();
