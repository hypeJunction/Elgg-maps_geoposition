<?php
$geoposition = maps_geoposition_get();
?>
<script>
	if (typeof elgg.session.geopositioning === 'undefined') {
		elgg.session.geopositioning = <?php echo json_encode($geoposition) ?>;
	}
</script>