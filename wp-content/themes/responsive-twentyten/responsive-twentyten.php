<?php

/*  Copyright 2010  TODD HALFPENNY  (email : todd@gingerbreaddesign.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
Plugin Name: Responsive TwentyTen
Plugin URI: http://gingerbreaddesign.co.uk/wordpress/responsive-twentyten/
Description: Makes your TwentyTen themed site have a responsive and fluid layout. Making it ideal for for viewing across a whole range of devices and screen sizes (i.e iPhones, Android, iPads)
Author: Todd Halfpenny
Version: 0.0.3
Author URI: http://gingerbreaddesign.co.uk/todd
*/


function rtt_add_css_and_js() {
  echo '<link rel="stylesheet" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/responsive-twentyten/css/style.css" media="screen and (min-device-width: 481px)" type="text/css" />
    <link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="' . get_bloginfo('wpurl') .'/wp-content/plugins/responsive-twentyten/css/phone_style.css" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, 
 maximum-scale=1.0">';
}

add_action('wp_head', 'rtt_add_css_and_js');

?>
