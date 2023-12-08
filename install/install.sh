#!/bin/bash

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

cat <<END >$theme_name.code-workspace
{
	"folders": [
		{
			"path": "."
		}
	],
	"settings": {
		"intelephense.environment.includePaths" : [],
		"phpcs.enable": true,
		"phpcs.standard": "./tests/phpcs.xml",
		"phpcs.executablePath": "./vendor/bin/phpcs",
		"phpcs.showWarnings": true,
		"phpcs.showSources": true,
		"phpcs.composerJsonPath": "./composer.json",
		"phpcs.errorSeverity": 6,
		"php.suggest.basic": true,
		"git.ignoreLimitWarning": true,
        "editor.rulers": [
            80,
            120
        ]
	}
}
END

PHP ./install/pre-install.php $namespace $theme_slug
