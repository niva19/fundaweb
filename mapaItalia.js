function algo() {

    var map;

    function initialize() {
        // Configuración del mapa
        var coordenadas = JSON.parse(localStorage.getItem("coordenadasAfterlife"))

        var mapProp = {
            zoom: 6,
            center: {lat: 42.8333000, lng: 12.8333000}
        };
        // Agregando el mapa al tag de id googleMap
        map = new google.maps.Map(document.getElementById("italy_map"), mapProp);
        

        // google.maps.event.addListener(map, 'click', function(event) {
        //     addMarker(event.latLng, map);
        // });
        
        // if (coordenadas != null) {
            for (var i = 0; i < coordenadas.length; i++) {
                var local = coordenadas[i]
                local.Latitud = parseFloat(local.Latitud)
                local.Longitud = parseFloat(local.Longitud)

                var myLatlng = new google.maps.LatLng(local.Latitud, local.Longitud);
                var path = local.Ruta_Imagen;
                var nomb = local.Nombre;

                var marker = new google.maps.Marker({
                    position: myLatlng, 
                    map: map,
                    //label: nomb,
                    icon: {
                        url: path,
                        scaledSize: new google.maps.Size(32, 32)
                    }, 
                
                });   
            // }
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
}

algo();
