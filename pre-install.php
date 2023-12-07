<?php

if ( ! isset( $argv ) || ! isset( $argv[1] ) ) {
    return;
}

$namespace_arg = $argv[1];

if ( empty( $namespace_arg ) ) {
    return;
}

function install_composer_namespace( $namespace ) {

    $composer = json_decode( file_get_contents( 'composer.json' ), true );

    $composer['autoload']['psr-4'] = [
        $namespace . '\\' => 'inc/'
    ];
    

    $composer['extra']['wpify-scoper']['prefix'] = "{$namespace}\\Deps";
    

    file_put_contents( 'composer.json', json_encode( $composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );

    echo "adding {$namespace} to composer.json\n";
}
install_composer_namespace( $namespace_arg );

function replace_functions_namespace( $namespace ) {
    $functions = file_get_contents( 'functions.php' );

    $functions = str_replace( "Mwf\\Theme", $namespace , $functions );

    file_put_contents( 'functions.php', $functions );

    echo "replacing {$namespace} in functions.php\n";
}
replace_functions_namespace( $namespace_arg );

// $namespace = str_replace( '\\', '\\\\', $namespace );

// //read the entire string
// $str=file_get_contents('composer.json');

// //replace something in the file string - this is a VERY simple example
// $str=str_replace( "Mwf\\\\Theme\\\\", $namespace . '\\\\', $str );

// //write the entire string
// file_put_contents('composer.json', $str);

// echo "adding {$namespace} to composer.json\n";