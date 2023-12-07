#!/bin/bash
if ! [ -d ../src ]; then
  cp -R ../vendor/mwf/wp-scripts-config/src ../
fi
composer update
composer dump-autoload