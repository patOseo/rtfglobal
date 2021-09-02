<?php

function register_my_menu() {
register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_my_menu' );