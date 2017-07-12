<?php 
/*
Plugin Name: Hide Default Roles 
Description: Hide default wordpress roles for non admins in users admin area.     
Version: 1.0
Author: Ayman Al Zarrad 
License: GPL2 or later
*/

/*  Copyright 2013  Ayman Al Zarrad

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Hide Defaulet Roles From non Admins

if (!current_user_can('administrator')) {

	function hide_default_user_roles( $editable_roles ) {

		global $pagenow;

    		if ( 'user-new.php' OR 'user-edit.php' OR 'users.php' == $pagenow ) {

   			unset( $editable_roles['administrator'] );

			unset( $editable_roles['editor'] );

			unset( $editable_roles['author'] );

			unset( $editable_roles['contributor'] );

			unset( $editable_roles['subscriber'] );

		}

		return $editable_roles;
	}
	add_filter( 'editable_roles', 'hide_default_user_roles' );
}

?>