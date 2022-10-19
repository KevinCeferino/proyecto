<?php
/*
Plugin Name: GAMetaboxes CMB2
Plugin URI:
Description: Agrega MetaBoxes al sitio Gourmet Artist
Version: 1.0
Author: Juan Pablo De la torre Valdez
Author URI:
License: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if(file_exists(dirname(__FILE__) . '/CMB2/init.php')){
    require_once dirname(__FILE__) . '/CMB2/init.php';
}


add_action('cmb2_admin_init', 'campos_eventos');
function campos_eventos(){
    $prefix = 'ga_campos_eventos_';

    $metabox_eventos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Campos Eventos', 'cmb2' ),
		'object_types'  => array( 'eventos', ), // Post type
	) );

	$metabox_eventos->add_field( array(
	  'name'       => __( 'Ciudad', 'cmb2' ),
	  'desc'       => __( 'Ciudad en la que es el evento', 'cmb2' ),
	  'id'         => $prefix . 'ciudad',
	  'type'       => 'text',
	) );

	$metabox_eventos->add_field( array(
		'name' => __( 'Fecha de Evento', 'cmb2' ),
		'desc' => __( 'Fecha en la que será el evento', 'cmb2' ),
		'id'   => $prefix . 'fecha',
		'type' => 'text_datetime_timestamp',
	) );

	$metabox_eventos->add_field( array(
	  'name' => __( 'Lugares Disponibles', 'cmb2' ),
	  'desc' => __( 'Campos lugares disponibles', 'cmb2' ),
	  'id'   => $prefix . 'lugares',
	  'type' => 'text',
	) );

	$metabox_eventos->add_field( array(
		'name'       => __( 'Temas del Curso', 'cmb2' ),
		'desc'       => __( 'temas que se verán en el curso (opcional)', 'cmb2' ),
		'id'         => $prefix . 'temas',
		'type'       => 'text',
	  'repeatable'      => true,
	) );

}