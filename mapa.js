$(document).ready(function () {
	var datos = JSON.parse(localStorage.getItem("datos"))
	console.log(datos)
	$("#local").text(datos.local_name)
	$("#fecha").text(datos.fecha)
	$("#visita").text(datos.visita_name)

	$("#puntaje").text(datos.marcador)

	$("#img_local").attr("src",`img/${datos.local_name.split(' ').join('_')}.png`);
	$("#img_visita").attr("src",`img/${datos.visita_name.split(' ').join('_')}.png`);

});

function mapLocation() {

	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var map;

	function initialize() {
		directionsDisplay = new google.maps.DirectionsRenderer({ suppressMarkers: true });

	    var coordenadas = JSON.parse(localStorage.getItem('coordenadas'));

		var local = coordenadas[0][0]
		local.Latitud = parseFloat(local.Latitud)
		local.Longitud = parseFloat(local.Longitud)

		var mapProp = {
			zoom: 5,
			center: { lat: local.Latitud, lng: local.Longitud }
		};
		// Agregando el mapa al tag de id googleMap
		map = new google.maps.Map(document.getElementById("map"), mapProp);


		directionsDisplay.setMap(map);
		calcRoute();
	}

	function addMarker(location, url, map) {
		var marker = new google.maps.Marker({
			position: location,
			icon: {
				url: url,
				scaledSize: new google.maps.Size(32, 32)
			},
			map: map
		});
	}

	function calcRoute() {

		var coordenadas = JSON.parse(localStorage.getItem('coordenadas'))

		var local = coordenadas[0][0]
		local.Latitud = parseFloat(local.Latitud)
		local.Longitud = parseFloat(local.Longitud)

		var visita = coordenadas[1][0]
		visita.Latitud = parseFloat(visita.Latitud)
		visita.Longitud = parseFloat(visita.Longitud)

		var start = new google.maps.LatLng(local.Latitud, local.Longitud);
		var end = new google.maps.LatLng(visita.Latitud, visita.Longitud);

		

	

		var bounds = new google.maps.LatLngBounds();
		bounds.extend(start);
		bounds.extend(end);
		map.fitBounds(bounds);
		var request = {
			origin: start,
			destination: end,
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function (response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
				var leg = response.routes[0].legs[0];
				var distance = google.maps.geometry.spherical.computeDistanceBetween(end, start);
				$("#distancia").text(`Distancia: ${(distance/1000).toFixed(1)}`)
				//$("#distancia").text(`Distancia: ${leg.distance.text}`) 
				$("#tiempo").text(`Tiempo: ${leg.duration.text}`)
				addMarker(leg.start_location, local.Ruta_Imagen, map);
				addMarker(leg.end_location, visita.Ruta_Imagen, map);
				// directionsDisplay.setMap(map);
			} else {
				alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
			}
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
}
mapLocation();