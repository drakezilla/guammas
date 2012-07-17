//Declaraciones iniciales: creado un constructor interno al prototype que permite ""Generar Clases"" (Generar: javascript no es orientado a objetos)
//Esto genera la estructura basica de clases dentro del motor javascript

(function(){
    var initializing = false, fnTest = /xyz/.test(function(){
        xyz;
    }) ? /\b_super\b/ : /.*/;

    // The base Class implementation (does nothing)
    this.Class = function(){};
 
    // Create a new Class that inherits from this class
    Class.extend = function(prop) {
        var _super = this.prototype;
   
        // Instantiate a base class (but only create the instance,
        // don't run the init constructor)
        initializing = true;
        var prototype = new this();
        initializing = false;
   
        // Copy the properties over onto the new prototype
        for (var name in prop) {
            // Check if we're overwriting an existing function
            prototype[name] = typeof prop[name] == "function" &&
            typeof _super[name] == "function" && fnTest.test(prop[name]) ?
            (function(name, fn){
                return function() {
                    var tmp = this._super;
           
                    // Add a new ._super() method that is the same method
                    // but on the super-class
                    this._super = _super[name];
           
                    // The method only need to be bound temporarily, so we
                    // remove it when we're done executing
                    var ret = fn.apply(this, arguments);       
                    this._super = tmp;
           
                    return ret;
                };
            })(name, prop[name]) :
            prop[name];
        }
   
        // The dummy class constructor
        function Class() {
            // All construction is actually done in the init method
            if ( !initializing && this.init )
                this.init.apply(this, arguments);
        }
   
        // Populate our constructed prototype object
        Class.prototype = prototype;
   
        // Enforce the constructor to be what we expect
        Class.prototype.constructor = Class;

        // And make this class extendable
        Class.extend = arguments.callee;
   
        return Class;
    };
})();


// Ahora viene mi clase real



var GoogleMapClass = Class.extend({
    
    /*
     * Metodo Constructor. Hace las veces del __construct de cualquier otro lenguaje
     * Configura los parametros basicos del mapa; como los estilos y opciones
     *
     */
    
    init: function(){
        this.estilos = [
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
        this.opciones= {
            zoom: 12,
            disableDefaultUI: true,
            center: new google.maps.LatLng(10.24462, -67.59374199999999),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: this.estilos
        }
        this.markerSucursal = new Array();
        this.infoWindow = new Array();
    },
    
    /*
     * Incializacion de los objetos para darle funcionalidad al mapa
     * Se inicia el objeto mapa y el geocoder (si es solicitado)
     * @param divElemento elemento del DOM donde se va a dibujar el mapa
     * @param geocoder booleano define si es necesario llamar al objeto geocoder
     * @usage variable.inicio(document.getElementById('mielemento'),true)
     */
    
    inicio: function(divElemento,geocoder){
        this.objMapa = new google.maps.Map(divElemento,this.opciones);
        if(geocoder){
            this.objGeocoder = new google.maps.Geocoder();
        }

    },
    
    /*
     * Metodo para precargar ubicaciones
     * Se utiliza para cargar ubicaciones al mismo tiempo que se carga el mapa.
     * @param jsonArray arreglo json con las coordenadas de las ubicaciones
     * @param verIW booleano muestra o no los infowindows
     *
     */
    
    precargarUbicaciones: function(jsonArray,verIW){
        var contenidoDialog
        var objMapa = this.objMapa
        for(var k in jsonArray) {
            var localizacion= new google.maps.LatLng(jsonArray[k].coordenada_x,jsonArray[k].coordenada_y);
            eval('var marker'+k+'= new google.maps.Marker({position: localizacion,map: objMapa})');
            if(verIW){
                if(jsonArray[k].principal==1){
                    contenidoDialog = "<div><p><strong>Esta es tu sede principal</strong></p></div>"+
                    "<div>Direccion: "+jsonArray[k].detalle_direccion+"</div>"+
                    "<div>Telefono de contacto: "+jsonArray[k].telefono+"</div>"+
                    "<div style='text-align: right'>"+
                    "<img style='cursor: pointer' src='/images/stylistica-icons/24x24/edit.png' onclick='editarUbicacion("+jsonArray[k].id+")' />"+
                    "<img style='cursor: pointer' src='/images/stylistica-icons/24x24/delete.png' onclick='eliminarUbicacion("+jsonArray[k].id+")' />"+
                    "</div>"
                }else{
                    contenidoDialog = 
                    "<div><p>Esta es una de tus sedes</p></div>"+
                    "<div>Direccion: "+jsonArray[k].detalle_direccion+"</div>"+
                    "<div>Telefono de contacto: "+jsonArray[k].telefono+"</div>"+
                    "<div style='text-align: right'>"+
                    "<img style='cursor: pointer' src='/images/stylistica-icons/24x24/edit.png' onclick='editarUbicacion("+jsonArray[k].id+")' />"+
                    "<img style='cursor: pointer' src='/images/stylistica-icons/24x24/delete.png' onclick='confirmarDeleteUbicacion("+jsonArray[k].id+")' />"+
                    "</div>"
                }
                eval('var infowindow'+k+' = new google.maps.InfoWindow({content: contenidoDialog })');
                eval('google.maps.event.addListener(marker'+k+', "click", function() {infowindow'+k+'.open(objMapa,marker'+k+')})')
            }
            
            
        }
    },
    
    /*
     * Metodo para iniciar la actividad del geocoder
     * Se utiliza para ubicar una ciudad en el mapa segun su nombre
     * @param geocoderString string Cadena de caracteres para buscar una ciudad en el mapa
     *
     */
    
    callGeocoder: function(geocoderString){
        var objMapa = this.objMapa
        this.objGeocoder.geocode({
            'address': geocoderString
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                objMapa.setCenter(results[0].geometry.location);
            }else{
                return false;
            }
        })
    },
    
    /*
     * Metodo para iniciar actividad del mapa
     * Se utiliza para cargar e iniciar la actividad dentro del mapa (el evento click dentro del mapa muestra un chinche nuevo)
     *
     */
    
    mapActividad: function(){
        var objMapa = this.objMapa
        var markersArray = new Array()
        google.maps.event.addListener(objMapa, 'click', function(event){
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
            var marker = new google.maps.Marker({
                position: event.latLng, 
                animation: google.maps.Animation.DROP,
                map: objMapa
            });
            markersArray.push(marker);
        });
    
    },
    
    /*
     * Metodo para destruir la actividad del mapa
     * Se utiliza para eliminar la actividad del mapa principal
     *
     */
    
    destruirActividad: function(){
        var objMapa = this.objMapa
        google.maps.event.clearListeners(objMapa, 'click');
    }
    
});

var mapaNuevaUbicacion = GoogleMapClass.extend({
    mapActividad: function(){
        
        var objMapa = this.objMapa
        var markersArray = new Array()
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
        });
        this.markersArray=markersArray;
    },
    
    cerrarIW: function(){
        var marker = this.markersArray;
        marker[0].infowindow.close();
    }
})