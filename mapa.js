function initialize() {
      // Configuración del mapa
        
	var coordenadas = JSON.parse(localStorage.getItem('coordenadas'))

	var local = coordenadas[0][0]
	local.Latitud = parseFloat(local.Latitud)
	local.Longitud = parseFloat(local.Longitud)

	var visita = coordenadas[1][0]
	visita.Latitud = parseFloat(visita.Latitud)
	visita.Longitud = parseFloat(visita.Longitud)

	var mapProp = {
	zoom: 5,
	center: {lat: local.Latitud, lng: local.Longitud}
	};
	// Agregando el mapa al tag de id googleMap
	var map = new google.maps.Map(document.getElementById("map"), mapProp);
		
	// Coordenada de la ruta (desde Misiones hasta Tierra del Fuego)

	google.maps.event.addListener(map, 'click', function(event) {
		addMarker(event.latLng, map);
		});

	var m1 = {lat: local.Latitud, lng: local.Longitud};        //Latitud de un lugar        
	addMarker(m1, "local", map);

	var m2 = {lat: visita.Latitud, lng: visita.Longitud};        //Latitud de un lugar        
	addMarker(m2, "visita", map);

	var flightPlanCoordinates = [m1,m2];
	
	var flightPath = new google.maps.Polyline({
		path: flightPlanCoordinates,
		geodesic: true,
		strokeColor: '#FF0000',
		strokeOpacity: 1.0,
		strokeWeight: 2
	});
	
	flightPath.setMap(map);
}
	
function addMarker(location, label, map) {
	var marker = new google.maps.Marker({
	position: location,
	label: label,
	map: map
	});
}

google.maps.event.addDomListener(window, 'load', initialize);