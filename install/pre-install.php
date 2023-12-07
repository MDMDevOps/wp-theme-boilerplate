<?php
/**
 * Ensure being called from bash
 */
if ( ! isset( $argv ) || ! isset( $argv[1] ) ) {
    return;
}
/**
 * Get the namespace argument
 */
$namespace_arg = $argv[1];
/**
 * If empty, bail...
 */
if ( empty( $namespace_arg ) ) {
    return;
}
/**
 * Replace namespace string in composer.json file
 *
 * @param string $namespace : the namespace to install.
 *
 * @return void
 */
function install_composer_namespace( string $namespace ): void
{
    $dir = dirname( __DIR__, 1 );
    $composer = json_decode( file_get_contents( $dir . '/composer.json' ), true );
    
    $composer['autoload']['psr-4'] = [
        $namespace . '\\' => 'inc/'
    ];
    $composer['extra']['wpify-scoper']['prefix'] = "{$namespace}\\Deps";
    $composer['extra']['wpify-scoper']['autorun'] = true;
    file_put_contents( $dir . '/composer.json', json_encode( $composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) );
    echo "adding {$namespace} to composer.json...\n";
}
install_composer_namespace( $namespace_arg );
/**
 * Replace namespace in functions.php file
 *
 * @param string $namespace : namespace to replace default with.
 *
 * @return void
 */
function replace_functions_namespace( string $namespace ): void
{
    $dir = dirname( __DIR__, 1 );
    $functions = file_get_contents( $dir . '/functions.php' );
    $functions = str_replace( "Mwf\\Theme", $namespace , $functions );
    file_put_contents( $dir . '/functions.php', $functions );
    echo "Updating {$namespace} functions.php...\n";
}
replace_functions_namespace( $namespace_arg );
/**
 * Update namespace in inc directory
 *
 * @param string $namespace : namespace to replace default with.
 * @param string $path : path to search for files.
 *
 * @return void
 */
function replace_inc_namespace( string $namespace, string $path = 'inc/*' ): void
{
    foreach ( glob( $path ) as $filename )
    {
        if ( is_dir( $filename ) ) {
            replace_inc_namespace( $namespace, $filename . '/*' );
        }
        if ( ! is_file( $filename ) ) {
            continue;
        }
        if ( ! str_contains( $filename, '.php' ) ) {
            continue;
        }
        $content = file_get_contents( $filename );
        $content = str_replace( "Mwf\\Theme", $namespace , $content );
        file_put_contents( $filename, $content );
    }
    echo "Updating {$namespace} Core Libraries...\n";
}
replace_inc_namespace( $namespace_arg, dirname( __DIR__, 1 ) . '/inc/*' );