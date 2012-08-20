<script>
    var imgEdit = '<?php echo image_tag('stylistica-icons/24x24/edit.png') ?>';
    var imgDele = '<?php echo image_tag('stylistica-icons/24x24/delete.png') ?>';    
    var mapaNuevaUbicacion = GoogleMapClass.extend({
        precargarUbicaciones: function(jsonArray,verIW){
            var imgEdit = '<?php echo image_tag('stylistica-icons/24x24/edit.png') ?>';
            var imgDele = '<?php echo image_tag('stylistica-icons/24x24/delete.png') ?>';
            var contenidoDialog
            var objMapa = this.objMapa
            for(var k in jsonArray) {
                imgEdit= imgEdit.substr(0,4) + ' onclick="editarUbicacion('+jsonArray[k].id+')" ' + imgEdit.substr(4)
                imgDele= imgDele.substr(0,4) + ' onclick="confirmarDeleteUbicacion('+jsonArray[k].id+')" ' + imgDele.substr(4)
                var localizacion= new google.maps.LatLng(jsonArray[k].coordenada_x,jsonArray[k].coordenada_y);
                eval('var marker'+k+'= new google.maps.Marker({position: localizacion,map: objMapa})');
                if(verIW){
                    if(jsonArray[k].principal==1){
                        contenidoDialog = '<div><p><strong>Esta es tu sede principal</strong></p></div>'+
                            '<div>Direccion: '+jsonArray[k].detalle_direccion+'</div>'+
                            '<div>Telefono de contacto: '+jsonArray[k].telefono+'</div>'+
                            '<div style="text-align: right">'+
                            imgEdit+
                            imgDele+
                            "</div>"
                    }else{
                        contenidoDialog = '<div><p>Esta es una de tus sedes</p></div>'+
                            '<div>Direccion: '+jsonArray[k].detalle_direccion+'</div>'+
                            '<div>Telefono de contacto: '+jsonArray[k].telefono+'</div>'+
                            '<div style="text-align: right">'+
                            imgEdit+
                            imgDele+
                            "</div>";
                    }
                    eval('var infowindow'+k+' = new google.maps.InfoWindow({content: contenidoDialog })');
                    eval('this.infoWindowArray.push(infowindow'+k+');')
                    eval('this.markersArray.push(marker'+k+');')
                    eval('google.maps.event.addListener(marker'+k+', "click", function() {infowindow'+k+'.open(objMapa,marker'+k+')})')
                }
            
            
            }
        },
    
        mapActividad: function(){
        
            var objMapa = this.objMapa
            var markersArray = new Array()
            var infowindowArray = new Array()
            this.actividad = google.maps.event.addListener(objMapa, 'click', function(event){
            
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
                var marker = new google.maps.Marker({
                    position: event.latLng, 
                    animation: google.maps.Animation.DROP,
                    map: objMapa
                });
            
                var formNuevaUbicacion =
                    '<div>'+
                    '<input type="hidden" id="ubicacion_coordenada_x" value="'+marker.position.lat()+'" /><input type="hidden" id="ubicacion_coordenada_y" value="'+marker.position.lng()+'" />'+
                    '<table>'+
                    '<tr>'+
                    '<td>RIF</td>'+
                    '<td><input id="ubicacion_rif" onfocus="$(\'#ubicacion_rif\').mask(\'r-99999999-9\');" /></td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Nombre</td>'+
                    '<td><input id="ubicacion_nombre" /></td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Teléfono</td>'+
                    '<td><input id="ubicacion_telefono_ppal" onfocus="$(\'#ubicacion_telefono_ppal\').mask(\'9999-9999999\');" /></td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td colspan="2" id="cell_btn_guardar"><button id="ubicacion_btn_guardar" type="button" onclick="guardarUbicacion()">Guardar</button></td>'+
                    '</tr>'+
                    '</table>'+
                    '</div>';    
            
                marker.infowindow = new google.maps.InfoWindow({
                    content: formNuevaUbicacion
                })
            
                marker.infowindow.open(objMapa,marker)
                google.maps.event.addListener(marker, "click", function() {
                    marker.infowindow.open(objMapa,marker)
                })
                markersArray.push(marker);
                infowindowArray.push(marker.infowindow);
            });
        
            this.markersFormArray=markersArray;
            this.infoWindowArray=infowindowArray;
        },
    
        cerrarIW: function(){
            var marker = this.markersFormArray;
            marker[0].infowindow.close();
        },
    
        reinciarMapa: function(){
            for (i in this.markersArray) {
                this.markersArray[i].setMap(null);
            }
        
            for (i in this.markersFormArray) {
                this.markersFormArray[i].setMap(null);
            }
        
            this.markersArray.length = 0;
        
            for (i in this.infoWindowArray) {
                this.infoWindowArray[i].close();
            }
            this.infoWindowArray.length = 0;
        }
    
    })
</script>