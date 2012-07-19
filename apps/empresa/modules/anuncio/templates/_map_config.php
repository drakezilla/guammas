<script>
    var mapaNuevoEvento =  GoogleMapClass.extend({
        mapActividad: function(){
            var objMapa = this.objMapa
            var markersArray = new Array()
            var marker;
            google.maps.event.addListener(objMapa, 'click', function(event){
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
                marker = new google.maps.Marker({
                    position: event.latLng, 
                    animation: google.maps.Animation.DROP,
                    map: objMapa
                });
                markersArray.push(marker);
                document.getElementById('anuncio_evento_coordenada_x').value = marker.position.lat();
                document.getElementById('anuncio_evento_coordenada_y').value = marker.position.lng();
            });
        }
    })
</script>