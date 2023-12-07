#!/bin/bash

composer update
composer dump-autoload

if ! [ -d ../src ]; then
  cp -R ./vendor/mwf/wp-scripts-config/src ./
  cd ./src && npm install
fi

rm -fr ./install
