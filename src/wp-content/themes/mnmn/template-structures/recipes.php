<?php
add_action( 'abc', '__abc', 1 );
add_action( 'abc', '__mmmm', 2 );

function __abc() {
	echo 'xxx';
}


function __mmm() {
	echo 'mmmm';
}