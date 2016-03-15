define(function (require) {

	var elgg = require('elgg');

	return function (callback) {
		navigator.geolocation.getCurrentPosition(function (position) {
			if (typeof elgg.session.geopositioning === 'undefined') {
				elgg.session.geopositioning = {};
			}

			elgg.session.geopositioning.latitude = position.coords.latitude;
			elgg.session.geopositioning.longitude = position.coords.longitude;

			elgg.action('maps/geopositioning/update', {
				data: elgg.session.geopositioning
			});

			if (typeof callback === 'function') {
				callback.call(null, position);
			}
		});
	};
});