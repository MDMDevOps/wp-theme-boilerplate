#!/bin/bash
if ! [ -d ./src ]; then
  cp -R ./vendor/mwf/wp-scripts-config/src ./
fi
echo Define a namespace for your project...
read -p 'Namespace:' namespace
echo Adding namespace $namespace


# find ./inc -name '*.php' -exec sed -i '' -e 's#Mwf\\Lib#Mwf\\Li\\Appb#g' {} \;
