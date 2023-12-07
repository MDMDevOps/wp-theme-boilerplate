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
    PHP ./pre-install.php $namespace
  fi
}
get_namespace
