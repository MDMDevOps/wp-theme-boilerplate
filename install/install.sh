#!/bin/bash
# if ! [ -d ./src ]; then
#   # cp -R ./vendor/mwf/wp-scripts-config/src ./
# fi
# echo Define a namespace for your project. The namespace will be used to prefix all classes, and must be seperated with DOUBLE backslashes. For example, if you want to use the namespace Mwf\\Lib, enter Mwf\\\\Lib.
# read -p 'Namespace: ' namespace
# read -p "Verify Namespace '$namespace' [y,n] " -n 1 -r
function get_namespace {
	echo Define a namespace for your project. The namespace will be used to prefix all classes.
  	read -r -p 'Namespace: ' namespace
  	read -p "Verify Namespace '$namespace' [y,n] " -n 1 -r
  	echo    # (optional) move to a new line
  	if [[ ! $REPLY =~ ^[Yy]$ ]]
  		then
			get_namespace
  		else
			PHP ./install/pre-install.php $namespace
  	fi
}
# get_namespace

function get_theme_options {

echo Define a namespace for your project. The namespace will be used to prefix all classes.
read -r -p 'NAMESPACE : ' namespace
read -r -p 'THEME SLUG : ' theme_slug
read -r -p 'THEME NAME : ' theme_name
read -r -p 'THEME PARENT : ' theme_parent
read -r -p 'THEME URL : ' theme_url

cat <<END >style.css
/*
Theme Name:     $theme_name
Theme URI:      $theme_url
Template:       $theme_parent
Author:         Mid-West Family Madison
Author URI:     https://www.midwestfamilymadison.com
Description:    Custom Child Theme
Version:        1.0.0
License:        GNU General Public License v3.0 (or later)
License URI:    https://www.gnu.org/licenses/gpl-3.0.html
*/
END

PHP ./install/pre-install.php $namespace $theme_slug

}
get_theme_options
