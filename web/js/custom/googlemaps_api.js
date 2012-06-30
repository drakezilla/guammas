var markersArray = [];
var markersOverlayArray = [];
var geocoder = new google.maps.Geocoder();
function initializeNoInteraccion(elemento) {
    var myStyles =[
    {
        featureType: "all",
        elementType: "labels",
        stylers: [
        {
            visibility: "off"
        }
        ]
    }
    ];
    var myOptions = {
        zoom: 12,
        disableDefaultUI: true,
        center: new google.maps.LatLng(10.24462, -67.59374199999999),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles
    //mapTypeId: 'roadmap'
    }
    var map = new google.maps.Map(document.getElementById(elemento),
        myOptions);
}

function initializeInteraccion(geocoder,elemento) {
    var myStyles =[
    {
        featureType: "all",
        elementType: "labels",
        stylers: [
        {
            visibility: "off"
        }
        ]
    }
    ];
    
    if(!geocoder){
        var myOptions = {
            zoom: 12,
            
            center: new google.maps.LatLng(10.24462, -67.59374199999999),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        //mapTypeId: 'roadmap'
        }

    }else{
        var myOptions = {
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        //mapTypeId: 'roadmap'
        }
    }
    var map = new google.maps.Map(document.getElementById(elemento),
        myOptions);
    llamarGeocoder(map);
    agregarChinche(map);
    
        
}
    
function llamarGeocoder(map){
    geocoder.geocode( {
        'address': fullGeostring
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
        } else {
            geocoder.geocode( {
                'address': estadoGeostring
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    $("#alerta_geocoder").html("<p>Disculpa, no entontramos <strong>"+ciudadGeostring+"</strong> en el mapa, pero te ubicamos en <strong>"+estadoGeostring+"</strong> para que te sea mas fácil ubicarte</p> estamos trabajando para ubicar todas las locaciones posibles, pero gracias por darte cuenta! <a href='#' onclick='ocultarAlertaGeocoder()'>Ocultar este mensaje</a>");
                    $("#alerta_geocoder").show("fast");
                    setTimeout(function(){
                        $("#alerta_geocoder").hide("fast");
                    },10000)
                } else {
                    $("#action_map").dialog({
                        width: 490,
                        height: 256
                    })
                    $("#action_map").html(mapError+"<p>el problema es <strong>"+customGoogleMapErrorHandler(status)+"</strong></p>");
                }
            })
        }
    });
}
    
function customGoogleMapErrorHandler(status){
    var msg
    switch(status){
        case 'ZERO_RESULTS':
            msg="No consigue resultados de ubicación";
            break;
    }
    return msg;
}
    
function extraerLatLngDeGeocoder(results){
    var latlngArray={
        latitud  : results[0].geometry.location.lat(),
        longitud : results[0].geometry.location.lng()
    }
    return latlngArray;
}
    
function agregarChinche(map){
        
    google.maps.event.addListener(map, 'click', function(event){
        borrarChinches();
        var marker = new google.maps.Marker({
            position: event.latLng, 
            animation: google.maps.Animation.DROP,
            map: map
        });
        markersArray.push(marker);
        asignarLatLng($("#ubicacion_coordenada_x"),$("#ubicacion_coordenada_y"),event)
    });
        
}
    
function asignarLatLng(campoLat,CampoLng, event){
    campoLat.val(event.latLng.lat())
    CampoLng.val(event.latLng.lng())
}
    
    
function borrarChinches(){
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }
}