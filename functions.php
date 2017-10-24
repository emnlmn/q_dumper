<?php

require __DIR__ . '/vendor/autoload.php';

function _q( ...$args ) {
	$backtrace = debug_backtrace();
	$exitPoint = sprintf('exitpoint: %s@%s line %s', $backtrace[1]['class'], $backtrace[1]['function'], $backtrace[0]['line']);

	foreach ( $args as $arg ) {
		if ( is_object( $arg ) and method_exists( $arg, 'toArray' ) ) {
			dump( $arg->toArray() );
			continue;

		} elseif ( is_object( $arg ) ) {
			dump( (array) $arg );
			continue;

		}

		dump( $arg );
	}

	dump($exitPoint);

	exit();
}