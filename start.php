<?php

/**
 * User Geopositioning
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'maps_geoposition_init');

/**
 * Initialize
 * @return void
 */
function maps_geoposition_init() {

	elgg_register_action('maps/geopositioning/update', __DIR__ . '/actions/geopositioning/update.php', 'public');

	elgg_extend_view('initialize_elgg.js', 'maps/session/geopositioning.js');
}

/**
 * Get latest known location
 * @return array
 */
function maps_geoposition_get() {
	$geoposition = _elgg_services()->session->get('geopositioning');
	if (!empty($geoposition)) {
		return $geoposition;
	}
	return array(
		'location' => '',
		'latitude' => 0,
		'longitude' => 0,
	);
}

/**
 * Set latest known location
 *
 * @param string $location  Location string
 * @param float  $latitude  Latitude
 * @param float  $longitude Longitude
 * @return void
 */
function maps_geoposition_set($location = '', $latitude = 0, $longitude = 0) {
	_elgg_services()->session->set('geopositioning', array(
		'location' => $location,
		'latitude' => (float) $latitude,
		'longitude' => (float) $longitude,
	));
}
