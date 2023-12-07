<?php

if ( ! isset( $argv ) || ! isset( $argv[1] ) ) {
    return;
}

$namespace = $argv[1];

if ( empty( $namespace ) ) {
    return;
}

$namespace = str_replace( '\\', '\\\\', $namespace );

//read the entire string
$str=file_get_contents('composer.json');

//replace something in the file string - this is a VERY simple example
$str=str_replace( "Mwf\\\\Theme\\\\", $namespace . '\\\\', $str );

//write the entire string
file_put_contents('composer.json', $str);

echo "adding {$namespace} to composer.json\n";