function initialize() {
    // Configuración del mapa
    var coordenadas = JSON.parse(localStorage.getItem("coordenadasAfterlife"))

    var mapProp = {
        zoom: 6,
        center: {lat: 42.8333000, lng: 12.8333000}
    };
    // Agregando el mapa al tag de id googleMap
     var map = new google.maps.Map(document.getElementById("italy_map"), mapProp);
      

    // google.maps.event.addListener(map, 'click', function(event) {
    //     addMarker(event.latLng, map);
    // });
    
    for (var i = 0; i < coordenadas.length; i++) {
        var local = coordenadas[i]
		local.Latitud = parseFloat(local.Latitud)
        local.Longitud = parseFloat(local.Longitud)

        var myLatlng = new google.maps.LatLng(local.Latitud, local.Longitud);
        var title = local.Nombre;

        var marker = new google.maps.Marker({
            position: myLatlng, 
            map: map,
            title: "uuu"
        });   
    }

    function addMarker(location, label, map) {
        var marker = new google.maps.Marker({
            position: location,
            label: label,
            map: map
        });
    }
}

google.maps.event.addDomListener(window, 'load', initialize);
