<?php
/*
Plugin Name: Moderdonizer
Description: Descripción
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: moderdonizer
Domain Path: /languages
*/


function fn_moderdonizer_filter( $content ) {
	return fn_modernonize( $content );
}
add_filter( 'the_content', 'fn_moderdonizer_filter' );
add_filter( 'the_title', 'fn_moderdonizer_filter' );


/**
 * Esta función reemplaza el contenido Godo con palabras de la República Dictatorial de Moderdonia.
 * Estas son las reglas que se aplican:
 *
 * 1) Reemplazar "ción" por "ció" cuando después venga un espacio, punto, coma, interrogación o exclamación.
 * 2) Reemplazar "sión" por "sió" cuando después venga un espacio, punto, coma, interrogación o exclamación.
 * 2) Reemplazar la letra "m" por doble "mm" cuando la consonante se encuentre entre vocales.
 *
 * @author                      Mauricio Gelves
 * @params  $content    string  El contenido del post
 * @returns             string  El contenido del post con las nuevas palabras moderdonizadas.
 */
function fn_modernonize( $content ) {

	// Regla 1: "ción" por "ció" (ver comentarios en función)
	$content = preg_replace('/ción(?=[ .!,?])/', 'ció', $content );

	// Regla 2: "sión" por "sió" (ver comentarios en función)
	$content = preg_replace('/sión(?=[ .!,?])/', 'sió', $content );

	// Regla 3: "m" por "mm" (ver comentarios en función)
	$content = preg_replace('/m(?=[aeiouáéíóú])/', 'mm', $content );

	return $content;

}